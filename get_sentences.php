<?php require_once( $_SERVER['DOCUMENT_ROOT'] . "/" . "db_connect.php" ); ?>
<?php require_once( $_SERVER['DOCUMENT_ROOT'] . "/" . "state_list.php" ); ?>
<?php
$this_state = $_POST['this_state'];
$this_state_processed = str_replace(" ", "_", $this_state);
$this_state_processed = str_replace(".", "", $this_state_processed);

$sql = "SELECT " . $this_state_processed . " FROM state_dataset;";

$sentence_array = array();
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$this_entry = $row[$this_state_processed];
		if ($this_entry != "") {
			if (! in_array($this_entry, $sentence_array)) {
				array_push($sentence_array, $this_entry);
			};
		};
	}
} else {
	array_push($sentence_array, "Nobody has written anything about " . $this_state . " yet. You could be the first!");
};

echo "<div id='sentence_entry_header'>" . $this_state . "</div>";
foreach ($sentence_array as $sentence) {
	echo "<div class='sentence_entry'>";
	echo "In <div class='sentence_list_state_name'>" . $this_state . "</div>, ";
	echo $sentence;
	echo "</div>";
};

$conn->close();
?>