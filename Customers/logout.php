<?php
session_start();
unset($_SESSION["c_id"]);
unset($_SESSION["u_fname"]);
header("Location: https://radhemotors.000webhostapp.com/");
?>