<?php
  $erreurs = [];

  $prenom = isset($_POST['name']) ? trim($_POST['name']) : '';
  $email  = isset($_POST['email']) ? trim($_POST['email']) : '';

  if (empty($prenom)) {
    $erreurs['prenom'] = 'Veuillez indiquer votre prénom';

  } else if (!preg_match('/^[A-Za-zÀ-ÖØ-öø-ÿ]+$/u', $prenom)) {
    $erreurs['prenom'] = 'Votre prénom ne doit contenir que des lettres';
  
  } else if (strlen($prenom) < 3) {
    $erreurs['prenom'] = 'Votre prénom doit comporter au moins 3 caractères';  
  
  } else if (strlen($prenom) > 15) {
    $erreurs['prenom'] = 'Le prénom ne peut pas dépasser 15 caractères';
  }

  if (empty($email)) {
    $erreurs['email'] = 'Veuillez indiquer votre email';
  
  } else if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erreurs['email'] = 'Votre email est invalide. Exemple : john@doe.fr';
  }

  header('Content-Type: application/json');

  if (!empty($erreurs)) {
    echo json_encode($erreurs);
  } else {
    echo json_encode(true);
  }