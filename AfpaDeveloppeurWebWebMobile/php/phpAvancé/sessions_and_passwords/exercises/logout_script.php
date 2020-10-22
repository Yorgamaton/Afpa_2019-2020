<?php
include 'util.php';
session_start();

$logout = $_POST['logout'];

if (isset($logout))
{
    end_session();
    header('Location: exercises.php'); // Redirection in PHP is always used before HTML Language

}