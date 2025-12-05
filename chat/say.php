<?php
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

  $pseudo = $_GET['pseudo'];
  $message = $_GET['message'];

  if ($pseudo && $message) {
    $sql_req = "INSET INTO chat (pseudo, message) VALUES ('$pseudo', '$message')";

    if ($connexion->query($sql_req)) {
      echo "Success: message from {$pseudo}.";
    } else {
      echo "Error: {$connexion->error}";
    }
  } else {
    echo "Error: no queries found.";
  }

  $connexion->close();