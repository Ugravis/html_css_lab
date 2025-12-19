<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);

  $db_host = "localhost";
  $db_user = "root";
  $db_pass = "";
  $db_name = "312_integration_chat";

  $connexion = new mysqli(
    $db_host, 
    $db_user, 
    $db_pass, 
    $db_name
  );

  $username = $_GET['username'];
  $message = $_GET['message'];

  if ($username && $message) {
    $sql_req = "INSERT INTO chat (username, message) VALUES ('$username', '$message')";

    if ($connexion->query($sql_req)) {
      echo "Success: message from {$username}.";
    } else {
      echo "Error: {$connexion->error}";
    }
  } else {
    echo "Error: no queries found.";
  }

  $connexion->close();