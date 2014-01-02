<?php
  session_start();
  unset($_SESSION["id"]); 
  unset($_SESSION["nombre"]);
  unset($_SESSION["tipo"]);
  session_destroy();
  header("Location: ../index.html");
  exit;
?>