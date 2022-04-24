<?php require_once( $_SERVER['DOCUMENT_ROOT'] . "/" . "db_connect.php" ); ?>
<?php require_once( $_SERVER['DOCUMENT_ROOT'] . "/" . "state_list.php" ); ?>
<?php
$user = $_POST['user_ID'];
$response = array();
foreach ($state_label as $id => $label) {
	$response[$id] = $_POST[$id];
};


/*
THIS IS NOW DONE ON THE HOMEPAGE
function generateRandomString($length = 15) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
$user = generateRandomString();
echo $user;
*/

/*
THIS IS USEFUL FOR DEBUGGING
error_reporting(E_ALL);
ini_set('display_errors','On');
*/


$sql = "INSERT INTO state_dataset (user, ";
foreach ($state_label as $id => $label) {
	if ($label == "D.C.") {
		$label = "DC";
	};
	$label = str_replace(" ", "_", $label);
	$sql = $sql . $label . ", ";
};
$sql = substr($sql, 0, -2);
$sql = $sql . ") VALUES (";
$sql = $sql . "'" . $user . "', ";
foreach ($state_label as $id => $label) {
	$sql = $sql . "'" . mysqli_real_escape_string($conn, $response[$id]) . "', ";
};
$sql = substr($sql, 0, -2);
$sql = $sql . ');';
#echo $sql;


if ($conn->query($sql) === TRUE) {
    #echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>