<?php
session_start();
if ( !isset($_SESSION['userid']) || $_SESSION['userid'] <=0)
    exit('Access not allowed, please log in');
            {
           
}