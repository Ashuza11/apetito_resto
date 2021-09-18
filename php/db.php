<?php

# Apetito reto data basse  procedural php
$serverName = "localhost";
$dBuserName = "root";
$dBpassword = "";
$dBname = "apetito_reto";

$conn = mysqli_connect($serverName, $dBuserName, $dBpassword, $dBname);

# Gerer les erros 
if (!$conn) {
    die("connection failed: " . mysqli_connect_error());
}