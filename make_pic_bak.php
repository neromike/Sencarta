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
//Set the image width and height
$width = 600;
$height = 315;
$margin = 30;
$font_size = 20;
$font_name = 'Capriola-Regular.ttf';

#$image = ImageCreate($width, $height);
$image = imagecreatefromjpeg($_SERVER['DOCUMENT_ROOT'] . "/" . "pic_background.jpg");
$black = ImageColorAllocate($image, 0, 0, 0);
$blue = ImageColorAllocate($image, 1, 131, 255);
	
//Create the message
$x = $margin;
$y = ($margin / 2) + $font_size;
$num_to_show = 3;
$num_shown = 0;
foreach ($story as $state => $sentence) {
	$msg = "In " . $state . ", " . $sentence;
	
	$msg_array = explode(' ', $msg);
	$msg_new = '';
	foreach($msg_array as $word){
		$copy_coor = imagettfbbox($font_size, 0, $font_name, $msg_new . ' ' . $word);
		if($copy_coor[2] > $width - $margin * 2) {
			$msg_new .= "\n     " . $word;
		} else {
			$msg_new .= " " . $word;
		};
	};
	$msg_new = trim($msg_new);
	imagettftext($image, $font_size, 0, $x, $y, $black, $font_name, $msg_new);
	
	$y = $y + ($font_size * 4);
	
	$num_shown = $num_shown + 1;
	if ($num_shown == $num_to_show) {
		break;
	};
};


imagettftext($image, $font_size, 0, $x + 100, $height - ($font_size * 2.5), $blue, $font_name, "See what else I've done, \n   and make your own.");

//Throw in some lines to make it a little bit harder for any bots to break
#ImageRectangle($image,0,0,$width-1,$height-1,$grey);
#imageline($image, 0, $height/2, $width, $height/2, $grey);
#imageline($image, $width/2, 0, $width/2, $height, $grey);


//Output the newly created image in jpeg format
imagejpeg($image, "user_img/" . $user . ".jpg");
ImageJpeg($image);
ImageDestroy($image);

exit();
?>