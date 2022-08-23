<?php 

require("../../vendor/autoload.php");

$pdo = db_connect();

$name = filter_input(INPUT_POST, 'name');
strip_tags($name);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$birth_date = filter_input(INPUT_POST, 'birth_date', FILTER_SANITIZE_NUMBER_INT);

if($name && $email && $birth_date) {
  
  $sql = $pdo->prepare("SELECT * FROM users WHERE email = :email");
  $sql->bindValue(':email', $email);
  $sql->execute();

  if($sql->rowCount() === 0) {
    $sql = $pdo->prepare("INSERT INTO users (name, email, birth_date) VALUES (:name, :email, :birth_date)");
    $sql->bindValue(':name', $name);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':birth_date', $birth_date);
    $sql->execute();
  
    header("Location: ../../index.php");
    exit;
  }

}

header("Location: ../create_user.php");
exit;