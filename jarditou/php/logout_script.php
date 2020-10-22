<?php
session_start();
include 'util.php';

$logout = $_POST['logout'];

if (isset($logout))
{
    end_session();
    header('Location: ../index.php'); // Redirection in PHP is always used before HTML Language

}