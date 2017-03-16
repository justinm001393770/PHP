<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']==false) {
    die("Error, must be logged in to view content");
}
