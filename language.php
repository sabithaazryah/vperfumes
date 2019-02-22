
<?php
session_start();
$_SESSION['lang'] = $_POST['lang'];
echo $_SESSION['lang'];