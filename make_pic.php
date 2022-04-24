<?php require_once( $_SERVER['DOCUMENT_ROOT'] . "/" . "db_connect.php" ); ?>
<?php require_once( $_SERVER['DOCUMENT_ROOT'] . "/" . "state_list.php" ); ?>
<?php
$user = mysqli_real_escape_string($conn, $_GET["user"]);

$sql = "SELECT * FROM state_dataset WHERE user='" . $user . "';";
$result = $conn->query($sql);
$story = array();
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		foreach ($state_label as $id => $label) {
			$this_label = $label;
			if ($this_label == "D.C.") {
				$this_label = "DC";
			};
			$this_label = str_replace(" ", "_", $this_label);
			$row[$this_label] = trim($row[$this_label]);
			if ($row[$this_label] != "") {
				$story[$label] = $row[$this_label];
			};
		};
	};
} else {
	$story["DC"] = "I did nothing.";
};
$conn->close();



header("Content-Type: image/jpeg");



//$font_name = 'Capriola-Regular.ttf';
$font_name = 'font_ComicSans.ttf';
$font_name2 = 'font_Lithos_bold.otf';

//Set the image width and height
$width = 600;
$height = 315;
$font_size = 20;
$margin = 30;
$lower_y_max = 240;
$y_between = $font_size * 1.5;

//$image = ImageCreate($width, $height);
$image = imagecreatefromjpeg($_SERVER['DOCUMENT_ROOT'] . "/" . "pic_background3.jpg");
$black = ImageColorAllocate($image, 0, 0, 0);
$blue = ImageColorAllocate($image, 1, 131, 255);

//Create the message
$msg_final_array = array();
$msg_final_height_array = array();
$msg_x_array = array();

//break each of the sentences so they fit onto separate lines
foreach ($story as $state => $sentence) {
	$msg = "In " . $state . ", " . $sentence;
	$msg_array = explode(' ', $msg);
	$msg_line = '';
	$line_saved = False;
	foreach($msg_array as $word){
		$copy_coor = imagettfbbox($font_size, 0, $font_name, $msg_line . ' ' . $word);
		if( $copy_coor[2] > ($width - ($margin * 2)) ) {
			$copy_coor = imagettfbbox($font_size, 0, $font_name, $msg_line);
			$msg_height = $copy_coor[3] - $copy_coor[7] + 2;
			$msg_width = $copy_coor[2] - $copy_coor[6];
			array_push($msg_final_array, $msg_line);
			array_push($msg_final_height_array, $msg_height);
			array_push($msg_x_array, ($width - $msg_width) / 2);
			$msg_line = $word;
			$line_saved = False;
		} else {
			$msg_line = $msg_line . ' ' . $word;
		};
	};
	if ($line_saved == False) {	//capture the last line of a sentence if it fits but wasn't saved
		$copy_coor = imagettfbbox($font_size, 0, $font_name, $msg_line);
		$msg_height = $copy_coor[3] - $copy_coor[7];
		$msg_width = $copy_coor[2] - $copy_coor[6];
		array_push($msg_final_array, $msg_line);
		array_push($msg_final_height_array, $msg_height);
		array_push($msg_x_array, ($width - $msg_width) / 2);
	}
	array_push($msg_final_array, '');
	array_push($msg_final_height_array, $y_between);
	array_push($msg_x_array, $width / 2);
};

//figure out how many sentences to include
$num_to_show = -1;
$y_available = $lower_y_max - $margin - $font_size - $margin;
$total_y = 0;
for ($i = 0; $i <= count($msg_final_height_array); $i++) {
	if (($total_y + $msg_final_height_array[$i]) <= $y_available) {	//does the next line fit?
		//$msg_final_array[$i] = $i . " - " . $msg_final_array[$i];	//***** DEV *****
		$num_to_show = $num_to_show + 1;
		$total_y = $total_y + $msg_final_height_array[$i];
	} else {
		//it's possible to have added one line out of a sentence, but omitted the second line
		//we don't want half a sentence to show up, so we should delete the preceding line even though there's space to include it
		if ($msg_final_array[$i] != '') {
			$total_y = $total_y - $msg_final_height_array[$num_to_show];
			array_splice($msg_final_array, count($msg_final_array));
			$num_to_show = $num_to_show - 1;
			
		};
		break;
	};
};

//remove the last line if it's a blank
if ($msg_final_array[$num_to_show] == '') {
	$num_to_show = $num_to_show - 1;
	$total_y = $total_y - $y_between;
};

//add the textboxes
$a = $margin + $font_size;
$b = ($lower_y_max - $margin - $margin - $font_size) / 2;
$c = $total_y / 2;
$y = $font_size + ($margin + $font_size) + (($lower_y_max - $margin - $margin - $font_size) / 2) - ($total_y / 2);
for ($i = 0; $i <= $num_to_show; $i++) {
	imagettftext($image, $font_size, 0, $msg_x_array[$i], $y, $black, $font_name, $msg_final_array[$i]);
	$y = $y + $msg_final_height_array[$i];
};



imagettftext($image, $font_size, 0, $margin + 40, $height - ($font_size * 2.5), $black, $font_name2, "       SEE WHAT ELSE I'VE DONE, \n  AND SHARE YOUR OWN STORY!");


imagejpeg($image, "user_img/" . $user . ".jpg");
ImageJpeg($image);
ImageDestroy($image);

exit();
?>