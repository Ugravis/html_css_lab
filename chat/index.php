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

  $messagesLimit = 100;

  $sql_req = "SELECT * FROM chat ORDER BY created_at LIMIT {$messagesLimit}";

  $result = $connexion->query($sql_req);

  if ($result) {
    $messages = $result->fetch_all(MYSQLI_ASSOC);

    echo "<h1>Chat</h1>";
  
    if (empty($messages)) {
      echo "Aucun message !";
    
    } else {
      foreach ($messages as $msg) {
        echo "<p><b>{$msg['username']}</b> : {$msg['message']}</p>";
      }
    }
  } else {
    echo "Error during display messages: {$connexion->error}";
  }

  $connexion->close();