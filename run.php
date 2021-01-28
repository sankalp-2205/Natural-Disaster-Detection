<?php
    $command = escapeshellcmd('predict.py');
	$output = shell_exec($command);
	echo "<pre>$output</pre>";
?>