<?php

	$BLAND	= $_GET["BLAND"];
	$BLAND  = htmlspecialchars($BLAND);

	require_once('./bland/model/bland_model.php');
	require_once('./bland/view/bland_view.html');

?>