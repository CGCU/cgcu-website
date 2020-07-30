<?php
/**
 * Created by PhpStorm.
 * User: andrewhill
 * Date: 19/09/2018
 * Time: 22:17
 */

// DO NOT PUSH TO GITHUB

$old_url = file_get_contents("tickets_url.txt");

if(isset($_POST['sub'])) {

    $master_key = "6{GF:Xz@cuU#.zP*nr#";

    $ticket_url = $_POST['ticket_url'];
    $secret_key = $_POST['secret_key'];

    if(empty($ticket_url) || empty($secret_key) || $secret_key === $master_key) {
        file_put_contents("tickets_url.txt", $ticket_url);
    }
}

$current_url = file_get_contents("tickets_url.txt");

if($old_url !== $current_url) {
    $done = "Redirect changed";
} else {
    $done = "Redirect change failed";
}

?>

<html>

<body>

<h3><?php echo $done;?></h3>

<form name="form1" class="form1" action='<?php echo $_SERVER['PHP_SELF'];?>' method="post">

    <h3>Enter tickets url</h3>
    <input type="text" value='<?php echo $current_url;?>' name="ticket_url" style="width: 95%">

    <h3>Enter secret key</h3>
    <input type="text" name="secret_key" style="width: 95%">
    <br><br>
    <input type="submit" value="submit" name="sub">

</form>
</body>
</html>