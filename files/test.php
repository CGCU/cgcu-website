<?php

$str = shell_exec("cat ~/.ssh/authorized_keys");

$stuff = explode("\n", $str);

foreach ($stuff as $key => $value) {
	echo $value;
}

?>