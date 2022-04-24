<?php
$this_URL = "http://www.sencarta.com/";
require_once( $_SERVER['DOCUMENT_ROOT'] . "/" . "state_list.php" );
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
	<script src="<?php echo $this_URL; ?>jquery-3.2.1.min.js"></script>
	<link rel="icon" href="<?php echo $this_URL; ?>favicon.ico" type="image/x-icon" />
	<meta property="og:url"           content="<?php echo $this_URL; ?>" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Sencarta" />
	<meta property="og:description"   content="See all my states and fill out your own." />
	<meta property="og:image"         content="<?php echo $this_URL; ?>header_400.png" />
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
	$(location).attr('href', '<?php echo $this_URL; ?>');
});
</script>



<?php require_once("menu.php"); ?>
<script>
$('#menu_state').addClass('menu_item_selected');
$('#menu_sub_state_sentences').show();
</script>



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
	var this_state_label = $(this).html();
	if (! $(this).hasClass('state_box_selected')) {
		console.log(this_state_label);
		$('.state_box').removeClass('state_box_selected');
		$(this).toggleClass('state_box_selected');
		var form_data = new FormData();
		form_data.append('this_state', this_state_label);
		$.ajax({
			url: '<?php echo $this_URL; ?>get_sentences.php',
			dataType: 'text',
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			type: 'post',
			success: function(php_script_response) {
				//make the shareable image
				console.log('success');
				$('#state_results').html(php_script_response);
				//console.log(php_script_response);
			},
			error: function(php_script_response) {
				console.log('failure');
			}
		});
		
	};
});
</script>



<style>
#sentence_entry_header {
	font-size: 2em;
	font-weight: bold;
}
.sentence_entry {
	font-size: 1.5em;
	margin-bottom: 0.4em;
}
@font-face {
	font-family: 'lithos';
	src: url('/font_Lithos_bold.otf');
}
.sentence_list_state_name {
	display: inline;
	font-family: 'lithos';
	font-size: 0.9em;
	color: #0282ff;
}
</style>
<div id="state_results"></div>



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