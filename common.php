<?php
$con = mysqli_connect("localhost", "root", "", "ece") or die($mysqli_error($con));
$con->set_charset('utf8mb4');
session_start();