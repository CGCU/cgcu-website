<html>
<div class="container">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<br>
<form action='<?php echo $_SERVER['PHP_SELF'];?>' method='post'>
	<h2>Search </h2>
	<p> Note: The string entered will be searched as a whole single phrase, not as separate words. </p>
	<p> Note: Searching for the year also works. </p>
	<p> Note: If you get too many results, god help your browser. </p>
	<input type='text' name='search'>
	<input type='submit' value='Search' name='sub'>
</form>
<br>
<hr>

<?php


function print_entry($entry) {
	echo '<h2> ' . $entry['title'] . ' </h2>';
	echo '<p><i>' . $entry['abstract'] . '</i></p>';
	echo '<h4> ' . $entry['date'] . '</h4>';
	echo '<a href="' . $_SERVER['PHP_SELF'] . '?id=' . $entry['id'] . '" >Direct link</a>';
	echo '<p> ' . $entry['report'] . ' <p>';
}

include 'news_temp.php';

if(isset($_POST['sub'])) {
	$search_term = $_POST['search'];

	echo '<h1> Showing results for <var>' . $search_term . '</var> </h1>';

	$printed = [];

	foreach ($news as $entry) {
		foreach($entry as $e) {
			$pos = stripos($e, $search_term);
			if($pos !== false) {
				$id = (int)$entry['id'];
				if(!in_array($id, $printed)) {
					print_entry($entry);
					echo '<hr>';
					array_push($printed, $id);
				}
			}
		}
	}
} else {
	if($_GET['id']) {
		$id = (int)$_GET['id'];
		foreach ($news as $entry) {
			if((int)$entry['id'] === $id) {
				print_entry($entry);
				break;
			}
		}
	}
}
?>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>