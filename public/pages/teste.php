<?php

require "../../vendor/autoload.php";

$id_user = filter_input(INPUT_GET, 'id_user', FILTER_SANITIZE_NUMBER_INT);

$user = searchUserID($id_user);
$cards = allCardUser($id_user);

foreach($user as $key) {
  echo $key['name_user']."<br>";
}

foreach($cards as $key) {
  echo $key['id_card'];
}