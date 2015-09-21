<?php
session_start();

if(!isset($_SESSION["STATUS"])){
  header("Location:login.php?error=3");
}
?>