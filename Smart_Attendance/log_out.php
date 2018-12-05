<?php

session_destroy();
session_start();
$session['log-status'] = false;

header("Location: index.php");

?>