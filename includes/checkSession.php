<?php
if(($_SESSION["username"]=="") &&  $_SESSION["uid"]=="")
{
   header("location: login.php"); 
}