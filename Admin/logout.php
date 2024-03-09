<?php
session_start();
unset($_SESSION["a_id"]);
header("Location: http://localhost/radhemotors/index.html");
?>