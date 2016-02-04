<?php
session_start();

define('BASE_URL', 'http://acl.demo.raj');

if(!isset($_SESSION["userid"]) || empty($_SESSION["userid"]))
{
	header("Location: " . BASE_URL . "/admin.php");
    exit;
}

//Files needed and are included
include("connection.php");
include("acl.php");
include("header.php");
