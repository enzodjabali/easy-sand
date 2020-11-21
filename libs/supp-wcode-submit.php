<?php
	$outputPWD = shell_exec('pwd');
	shell_exec('rm -r '.$outputPWD);
	header('Location:../../infos/suppression/');
?>