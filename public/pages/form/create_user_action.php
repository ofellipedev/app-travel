<?php 

require("../../../vendor/autoload.php");

$pdo = db_connect();

$name_user = filter_input(INPUT_POST, 'name_user');
strip_tags($name_user);
$email_user = filter_input(INPUT_POST, 'email_user', FILTER_SANITIZE_EMAIL);
$birth_date_user = filter_input(INPUT_POST, 'birth_date_user', FILTER_SANITIZE_NUMBER_INT);

if($name_user && $email_user && $birth_date_user) {
  
  $sql = $pdo->prepare("SELECT * FROM users WHERE email_user = :email_user");
  $sql->bindValue(':email_user', $email_user);
  $sql->execute();

  if($sql->rowCount() === 0) {
    $sql = $pdo->prepare("INSERT INTO users (name_user, email_user, birth_date_user) VALUES (:name_user, :email_user, :birth_date_user)");
    $sql->bindValue(':name_user', $name_user);
    $sql->bindValue(':email_user', $email_user);
    $sql->bindValue(':birth_date_user', $birth_date_user);
    $sql->execute();
  
    header("Location: ../allUsers.php");
    exit;
  }

}

header("Location: ../create_user.php");
exit;