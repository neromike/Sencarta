<?php
$this_URL = "http://www.sencarta.com/";
function generateRandomString($length = 7) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
$user = generateRandomString();

require_once( $_SERVER['DOCUMENT_ROOT'] . "/" . "state_list.php" );

if (isset($_GET['old_ID'])) {
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/" . "db_connect.php" );
	$old_user = mysqli_real_escape_string($conn, $_GET['old_ID']);
	$sql = "SELECT * FROM state_dataset WHERE user='" . $old_user . "';";
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
} else {
	$old_ID = "";
};
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112829175-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	gtag('config', 'UA-112829175-1');
	</script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Sencarta</title>
	<script src="<?php echo "http://" . $_SERVER['HTTP_HOST'] . '/'; ?>jquery-3.2.1.min.js"></script>
	<link rel="icon" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . '/'; ?>favicon.ico" type="image/x-icon" />
	<meta property="og:url"           content="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/"; ?>" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Sencarta" />
	<meta property="og:description"   content="See all my states and fill out your own." />
	<meta property="og:image"         content="<?php echo "http://" . $_SERVER['HTTP_HOST'] . '/'; ?>header_400.png" />
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
<body>

<script>
var state_num = 0;
</script>


<div class="admob_ad"> </div>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Sencarta -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-4754925849039958"
     data-ad-slot="6020435915"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>




<style>
#email_modal_container {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	display: none;
	z-index: 1;
}
#email_modal_background {
	position: absolute;
	top: 0px;
	left: 0px;
	width: 100%;
	height: 100%;
	background-color: black;
	opacity: 0.7;
}
#email_modal {
	position: absolute;
	background-color: white;
	height: 50%;
	width: 80%;
	left: 10%;
	top: 25%;
	z-index: 2;
	border-radius: 1em;
}
#email_modal_x {
	position: absolute;
	right: 0px;
	top: 0px;
	padding: 0.5em;
	cursor: pointer;
}
#email_modal_text {
	position: absolute;
	top: 20%;
	left: 5%;
	width: 90%;
}
#share_URL_box {
	margin-bottom: 1em;
	margin-left: auto;
	margin-right: auto;
	width: 100%;
}
#shareable_URL {
	display: block;
	text-align: center;
	margin-left: auto;
	margin-right: auto;
	padding-top: 1em;
	padding-bottom: 1em;
	width: 100%;
	resize: none;
}
@media only screen and (min-width: 600px) {
	#email_modal_text {
		top: 35%;
	}
	#shareable_URL {
		width: 400px;
		height: 1em;
	}
}
</style>
<div id="email_modal_container">
	<div id="email_modal_background" class="email_modal_closer"></div>
	<div id="email_modal">
		<div id="email_modal_x" class="email_modal_closer">x</div>
		<div id="email_modal_text">
			Want to share this page? Copy-and-paste this link into an email or text to share with your friends!
			<br /><br />
			<a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/MyStory/" . $user; ?>"><?php echo "http://" . $_SERVER['SERVER_NAME'] . "/MyStory/" . $user; ?></a>
			<!--<textarea id="shareable_URL" onclick="this.focus();this.select()" readonly="readonly"><?php echo "http://" . $_SERVER['SERVER_NAME'] . "/MyStory/" . $user; ?></textarea>-->
		</div>
	</div>
</div>
<script>
$('.email_modal_closer').on('click touch', function() {
	//console.log($(this).attr('id'));
	$('#email_modal_container').hide();
});
$('#shareable_URL').on('click touch', function() {
	$(this).focus();
	$(this).select();
	document.execCommand("copy");
});
</script>



<style>
#footer_modal_container {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	display: none;
	z-index: 1;
}
#footer_modal_background {
	position: absolute;
	top: 0px;
	left: 0px;
	width: 100%;
	height: 100%;
	background-color: black;
	opacity: 0.7;
}
#footer_modal {
	position: absolute;
	background-color: white;
	height: 50%;
	width: 80%;
	left: 10%;
	top: 25%;
	z-index: 2;
	border-radius: 1em;
}
#footer_modal_x {
	position: absolute;
	right: 0px;
	top: 0px;
	padding: 0.5em;
	cursor: pointer;
}
#footer_modal_text {
	position: absolute;
	top: 5%;
	left: 5%;
	width: 90%;
	height: 90%;
	overflow: auto;
}
</style>
<div id="footer_modal_container">
	<div id="footer_modal_background" class="footer_modal_closer"></div>
	<div id="footer_modal">
		<div id="footer_modal_x" class="footer_modal_closer">x</div>
		<div id="footer_modal_text">
			<div id="footer_modal_about_text">
				<strong>About Sencarta</strong>
				<br /><br />
				Sencarta is a site for sharing your experiences in each of the states of the USA that you have visited. It is owned and operated by Penny Industries. The current design was buitl from scratch using Notepad++.
				<br /><br />
				Feel free to write to us at <a href="mailto:penny.industry@gmail.com">penny.industry@gmail.com</a> with any questions or comments. We would love to hear from you!
			</div>
			<div id="footer_modal_privacy_text">
				<strong>Privacy Policy</strong>
				</br /><br />
				We are committed to operating in a manner that that respects and protects your privacy.
				<br /><br />
				We do not directly collect any personally identifiable information about you other than the sentences you write. We store these sentences because we need to in order to show them to your friends when they click on the image. We do not store any information related to your sentences, such as an IP address, other than a randomly generated ID number. We reserve the right to use the sentences in a completely anonymous fashion for future projects, such as state-based word clouds!
				<br /><br />
				However, we do make use of Google Analytics to help us make decisions based on web traffic. This uses your IP address but anonymizes it before we can see it.
				<br /><br />
				The ads on our page are run by Google. If you accept cookies in your browser, Google may make use of these cookies for advertising purposes. We do not store or look at your cookies directly.
				<br /><br />
				Sencarta is only fun if you share it with your friends. So while we help you do this through various social media channels (including Facebook, Twitter and Pinterest), we do not directly share any information with these parties. That interaction is between you and the social media website.
				<br /><br />
				That is all we collect from visitors.
			</div>
		</div>
	</div>
</div>
<script>
$('.footer_modal_closer').on('click touch', function() {
	$('#footer_modal_container').hide();
});
</script>



<style>
h1 {
	text-align: center;
}
hr {
	height: 5px;
	background-color: #0183ff;
}
#header_image {
	width: 100%;
	margin-left: auto;
	margin-right: auto;
	cursor: pointer;
}
@media only screen and (min-width: 600px) {
	#header_image {
		width: 800px;
	}
}
</style>
<img id="header_image" src="<?php echo $this_URL; ?>sencarta_logo.jpg" />
<script>
$('#header_image').on('click touch', function() {
	$(location).attr('href', '<?php echo "http://" . $_SERVER['HTTP_HOST'] . '/'; ?>');
});
</script>



<?php require_once("menu.php"); ?>
<script>
$('#menu_enter').addClass('menu_item_selected');
$('#menu_sub').hide();
</script>



<style>
#header_image_2 {
	display: block;
	width: 100%;
	margin-left: auto;
	margin-right: auto;
}
@media only screen and (min-width: 600px) {
	#header_image_2 {
		width: 800px;
	}
}
</style>
<img id="header_image_2" src="header_800_tight.jpg" />


<br />


<style>
.state_input_entry {
	display: none;
	font-size: 1.2em;
	background-color: #005EB9;
	border-radius: 4px;
	color: white;
	margin: 0.2em;
	padding: 0.2em;
}
.state_input {
	font-size: 1.2em;
}
.state_input_selected {
	display: inherit !important;
}
#submit_msg {
	display: none;
}
</style>
<?php
foreach ($state_label as $id => $label) {
	echo '<div id="state_input_' . $id . '" class="state_input_entry">';
		echo 'In ' . $id . ', ';
		echo '<input type="text" class="state_input" id="sentence_' . $id . '" maxlength="80" />';
		echo '<br />';
	echo '</div>';
};
?>


<style>
.share_feature {
	display: none;
}
.fb_iframe_widget {
	display: block !important;
}
#share_button img {
	cursor: pointer;
	height: 50px;
}
#pinterest_button {
	opacity: 1.0;
}
</style>
<div class="share_feature">
	<div id="share_button">
		<img id="facebook_button" src="share-button-facebook.png" />
		<img id="twitter_button" src="share-button-twitter.png" />
		<img id="pinterest_button" src="share-button-pinterest.png" />
		<img id="email_button" src="share-button-email.png" />
	</div>
	
</div>
<script>

var state_name_array=[];
<?php
foreach ($state_label as $id => $label) {
	echo "state_name_array['" . $id . "'] = '" . $label . "';";
};
?>

$('#facebook_button').on('click touch', function(event) {
	facebook_copy = "http://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent("http://www.sencarta.com/MyStory/<?php echo $user; ?>");
	var width  = 575;
	var height = 400;
	var left   = ($(window).width()  - width)  / 2;
	var top    = ($(window).height() - height) / 2;
	var opts   = 'status=1' + ',width=' + width + ',height=' + height + ',top=' + top + 'left=' + left;
	window.open(facebook_copy, "_system", opts);
	update_db();
});

$('#twitter_button').on('click touch', function(event) {
	var tweet_copy = "";
	$('.state_input').each(function(){
		if (tweet_copy == "") {
			if ($(this).val() != '') {
				tweet_copy = encodeURIComponent( "In " + state_name_array[$(this).attr('id').replace('sentence_','')] + ", " + $(this).val() + "  See what else I've done!" );
			};
		};
	});
	if (tweet_copy == "") {
		tweet_copy = encodeURIComponent("Want to see what I've done in US states?");
	};
	tweet_copy = tweet_copy + "&url=http%3A%2F%2Fwww.sencarta.com%2FMyStory%2F<?php echo $user; ?>";
	tweet_copy = tweet_copy + "&via=IamPennySmith";
	tweet_copy = tweet_copy + "&hashtags=Sencarta";
	var width  = 575;
	var height = 400;
	var left   = ($(window).width()  - width)  / 2;
	var top    = ($(window).height() - height) / 2;
	var opts   = 'status=1' + ',width=' + width + ',height=' + height + ',top=' + top + 'left=' + left;
	window.open("https://twitter.com/intent/tweet?text=" + tweet_copy, "_system", opts);
	update_db();
});

$('#pinterest_button').on('click touch', function(event) {
	var pinterest_copy = "https://www.pinterest.com/pin/create/button/";
	pinterest_copy = pinterest_copy + "?url=http%3A%2F%2Fwww.sencarta.com%2FMyStory%2F<?php echo $user; ?>";
	pinterest_copy = pinterest_copy + "&media=http%3A%2F%2Fwww.sencarta.com%2Fmake_pic.php%3Fuser%3D<?php echo $user; ?>";
	pinterest_copy = pinterest_copy + "&description=Check%20out%20where%20I%27ve%20been%21";
	var width  = 575;
	var height = 400;
	var left   = ($(window).width()  - width)  / 2;
	var top    = ($(window).height() - height) / 2;
	var opts   = 'status=1' + ',width=' + width + ',height=' + height + ',top=' + top + 'left=' + left;
	window.open(pinterest_copy, "_system", opts);
	
	update_db();
});

$('#email_button').on('click touch', function(event) {
	$('#email_modal_container').show();
	update_db(2);
});

var update_db = function(asocial) {
	if (asocial === undefined) {
		asocial = 0;
	}
	var form_data = new FormData();
    form_data.append('user_ID', '<?php echo $user; ?>');
	<?php
	foreach ($state_label as $id => $label) {
		echo "form_data.append('" . $id . "', $('#sentence_" . $id . "').val() );" . "\n";
	}
	?>
	$.ajax({
		url: 'add_sentences.php',
		dataType: 'text',
		cache: false,
		contentType: false,
		processData: false,
		data: form_data,
		type: 'post',
		success: function(php_script_response) {
			//make the shareable image
			$('#shareable_img').attr('src', "make_pic.php?user=<?php echo $user; ?>");
			
			if (asocial == 0) {
				//redirect the page to a new one to get a new user ID
				window.location = "http://www.sencarta.com/?old_ID=<?php echo $user; ?>";
			} else if (asocial == 1) {
				//redirect to mystory page
				window.location = "http://www.sencarta.com/MyStory/<?php echo $user; ?>";
			};
		},
		error: function(php_script_response) {
			$('#meta_upload_msg').html("Something is really wrong. Email Wayne.");
		}
	});
};
</script>
<img id="shareable_img" style="display:none;" src="" />


<style>
.state_box {
	display: inline-block;
	border: solid 1px #0183ff;
	border-radius: 4px;
	margin: 0.2em;
	padding: 0.2em;
	cursor: pointer;
}
.state_box:not(.state_box_selected):hover {
	background-color: #EEE;
}
.state_box_selected {
	background-color: #005EB9;
	color: white;
	/*display: block;*/
}
@media only screen and (min-width: 600px) {
	.state_box {
		padding: 0.4em;
	}
}
</style>
<div id="state_box_container">
	<?php
	foreach ($state_label as $id => $label) {
		echo '<div class="state_box" id="state_' . $id . '">';
		echo $label;
		echo '</div> ';
	};	
	?>
</div>
<script>
$('.state_box').on('click touch', function() {
	var this_id = $(this).attr('id');
	var this_state_label = $('#' + this_id).html();
	
	if ( this_state_label.substring(0, 3) != "In ") {
		$('#' + this_id).toggleClass('state_box_selected');
		//$('#' + this_id).html('In ' + this_state_label + ', ' + '<input type="text" class="state_input" id="sentence_' + this_id + '" />');
	};
	
	if ( $('#' + this_id).hasClass('state_box_selected') ) {
		state_num++;
	} else {
		state_num--;
	};
	if (state_num > 0) {
		$('.share_feature').show();
	} else {
		$('.share_feature').hide();
	};
	
	$('#state_input_' + this_id.replace('state_','')).toggleClass('state_input_selected');
});
</script>


<style>
.state_input_entry {
	display: none;
	font-size: 1.2em;
}
.state_input {
	font-size: 1.2em;
}
.state_input_selected {
	display: inherit !important;
}
#submit_msg {
	display: none;
}
@media only screen and (min-width: 600px) {
	.state_input {
		width: 60%;
	}
}
</style>
<?php
foreach ($state_label as $id => $label) {
	echo '<div id="state_input_' . $id . '" class="state_input_entry">';
		echo 'In ' . $label . ', ';
		echo '<input type="text" class="state_input" id="sentence_' . $id . '" />';
		echo '<br />';
	echo '</div>';
};
?>


<style>
#see_my_sentences {
	background-color: #005EB9;
	color: white;
	font-weight: bold;
	padding: 0.5em;
	width: 50%;
	border-radius: 4px;
	cursor: pointer;
	display: none !important;
}
</style>
<div id="see_my_sentences" class="share_feature">
See My Sentences
</div>
<script>
$('#see_my_sentences').on('click touch', function() {
	update_db(1);
});
</script>



<div class="admob_ad"></div>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Sencarta -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-4754925849039958"
     data-ad-slot="6020435915"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>



<?php
#need to prepopulate page with old information if an old_ID was passed
if ($old_user != "") {
	echo "<script>";
	foreach ($story as $state => $sentence) {
		$state_index = array_search($state, $state_label);
		echo "$('#state_" . $state_index . "').toggleClass('state_box_selected');";
		echo "state_num++;";
		echo "$('#state_input_" . $state_index . "').toggleClass('state_input_selected');";
		echo "$('#sentence_" . $state_index . "').val('" . str_replace("'", "\'", $sentence) . "');";
		echo "$('.share_feature').show();";
	};
	echo "</script>";
};
?>



<style>
#footer {
	width: 100%;
}
.footer_link {
	cursor: pointer;
	display: block;
	margin-left: 2em;
	margin-right: 2em;
	font-size: 0.8em;
}
@media only screen and (min-width: 600px) {
	.footer_link {
		display: inline;
	}
}
</style>

<div id="footer">
	<div id="footer_about" class="footer_link">About Sencarta</div>
	&nbsp;&nbsp;&copy;<?php echo date("Y"); ?> Penny Industries&nbsp;&nbsp;
	<div id="footer_privacy" class="footer_link">Privacy Policy</div>
</div>
<script>
$('.footer_link').on('click touch', function() {
	var this_id = $(this).attr('id');
	if (this_id == 'footer_about') {
		$('#footer_modal_privacy_text').hide();
		$('#footer_modal_about_text').show();
	} else {
		$('#footer_modal_about_text').hide();
		$('#footer_modal_privacy_text').show();
	};
	$('#footer_modal_container').show();
});
</script>



</body>
</html>