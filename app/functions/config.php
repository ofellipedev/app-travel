<?php

function db_connect() {
  $pdo = new PDO("mysql:dbname=db_travel;host=localhost:3306", "root", "root");
  return $pdo;
};

function allUsers() {
  $pdo = db_connect();
  $sql = $pdo->query("SELECT * FROM users");
  $list = $sql->fetchAll(PDO::FETCH_ASSOC);
  return $list;
}

function countUsers() {
  $pdo = db_connect();
  $sql = $pdo->query("SELECT * FROM users");
  $count = $sql->rowCount();
  return $count;
}