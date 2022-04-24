<style>
#menu {
	width: 100%;
	background-color: #00478C;
	color: white;
	font-weight: bold;
}
.menu_item {
	display: block;
	width: 100%;
	text-align: center;
	cursor: pointer;
	padding-top: .5em;
	padding-bottom: .5em;
}
.menu_item:not(.menu_item_selected):hover {
	background-color: #333;
	color: white;
	border-radius: 1em;
}
.menu_item_selected {
	border: solid 1px #3B9DFC;
	border-radius: 1em;
	background-color: #005EB9;
	cursor: auto;
}
@media only screen and (min-width: 600px) {
	.menu_item {
		width: 30%;
		display: inline-block;
	}
}
</style>
<div id="menu">
	<div id="menu_enter" class="menu_item">Make Your Stories</div>
	<div id="menu_see" class="menu_item">See Other People's Stories</div>
	<div id="menu_state" class="menu_item">State Sentences</div>
</div>
<script>
$('.menu_item').on('click touch', function() {
	var this_id = $(this).attr('id');
	if (this_id == "menu_enter") {
		$(location).attr('href', '<?php echo "http://" . $_SERVER['HTTP_HOST'] . '/'; ?>');
	} else if (this_id == "menu_see") {
		$(location).attr('href', '<?php echo "http://" . $_SERVER['HTTP_HOST'] . '/MyStory/'; ?>');
	} else if (this_id == "menu_state") {
		$(location).attr('href', '<?php echo "http://" . $_SERVER['HTTP_HOST'] . '/StateSentences/'; ?>');
	};
});
</script>



<style>
#menu_sub {
	width: 100%;
	background-color: #005EB9;
	color: white;
}
.menu_sub_content {
	display: none;
}
.menu_sub_content a {
	color: white;
}
.menu_sub_content a:hover {
	color: white;
	font-style: italic;
}
</style>
<div id="menu_sub">
	<div id="menu_sub_state_sentences" class="menu_sub_content">Select a state to see all stories from that state.</div>
	<div id="menu_sub_mystory" class="menu_sub_content">
		<a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . '/MyStory/'; ?>">Click here to see another random story.</a>
	</div>
</div>