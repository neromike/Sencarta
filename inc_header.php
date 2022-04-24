<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Sencarta</title>
	<script src="<?php echo "http://" . $_SERVER['HTTP_HOST'] . '/'; ?>jquery-3.2.1.min.js"></script>
	<link rel="icon" href="favicon.ico" type="image/x-icon" />
	<meta property="og:url"           content="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/"; ?>" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Sencarta" />
	<meta property="og:description"   content="See all my states and fill out your own." />
	<meta property="og:image"         content="http://www.sencarta.com/header_400.png" />
</head>
<style>
* {
	padding: 0px;
	margin: 0px;
}
body {
	width: 100%;
	margin-left: auto;
	margin-right: auto;
}
div {
	margin-left: auto;
	margin-right: auto;
	text-align: center;
}
.admob_ad {
	width: 320px;
	height: 50px;
	background-color: black;
	margin-left: auto;
	margin-right: auto;
	display: none;
}
.adsbygoogle {
	/* border: solid 1px black; */
}
@media only screen and (min-width: 600px) {
	body {
		width: 800px;
	}
}
</style>
<?php require_once( $_SERVER['DOCUMENT_ROOT'] . "/" . "db_connect.php" ); ?>
<body>
<?php
$state_label=array();
$state_label["AL"] = "Alabama";
$state_label["AK"] = "Alaska";
$state_label["AZ"] = "Arizona";
$state_label["AR"] = "Arkansas";
$state_label["CA"] = "California";
$state_label["CO"] = "Colorado";
$state_label["CT"] = "Connecticut";
$state_label["DE"] = "Delaware";
$state_label["DC"] = "D.C.";
$state_label["FL"] = "Florida";
$state_label["GA"] = "Georgia";
$state_label["HI"] = "Hawaii";
$state_label["ID"] = "Idaho";
$state_label["IL"] = "Illinois";
$state_label["IN"] = "Indiana";
$state_label["IA"] = "Iowa";
$state_label["KS"] = "Kansas";
$state_label["KY"] = "Kentucky";
$state_label["LA"] = "Louisiana";
$state_label["ME"] = "Maine";
$state_label["MD"] = "Maryland";
$state_label["MA"] = "Massachusetts";
$state_label["MI"] = "Michigan";
$state_label["MN"] = "Minnesota";
$state_label["MS"] = "Mississippi";
$state_label["MO"] = "Missouri";
$state_label["MT"] = "Montana";
$state_label["NE"] = "Nebraska";
$state_label["NV"] = "Nevada";
$state_label["NH"] = "New Hampshire";
$state_label["NJ"] = "New Jersey";
$state_label["NM"] = "New Mexico";
$state_label["NY"] = "New York";
$state_label["NC"] = "North Carolina";
$state_label["ND"] = "North Dakota";
$state_label["OH"] = "Ohio";
$state_label["OK"] = "Oklahoma";
$state_label["OR"] = "Oregon";
$state_label["PA"] = "Pennsylvania";
$state_label["RI"] = "Rhode Island";
$state_label["SC"] = "South Carolina";
$state_label["SD"] = "South Dakota";
$state_label["TN"] = "Tennessee";
$state_label["TX"] = "Texas";
$state_label["UT"] = "Utah";
$state_label["VT"] = "Vermont";
$state_label["VA"] = "Virginia";
$state_label["WA"] = "Washington";
$state_label["WV"] = "West Virginia";
$state_label["WI"] = "Wisconsin";
$state_label["WY"] = "Wyoming"
?>