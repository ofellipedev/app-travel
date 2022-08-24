<?php

require "../../../vendor/autoload.php";

$id_user = filter_input(INPUT_GET, 'id_user', FILTER_SANITIZE_NUMBER_INT);

if(!$id_user) {
  header("../search.php");
  exit;
}

$pdo = db_connect();

$sql = $pdo->prepare("INSERT INTO cards (id_user) VALUES (:id_user)");
$sql->bindValue(':id_user', $id_user);
$sql->execute();

header("Location: ../profile.php?id_user={$id_user}");
exit;