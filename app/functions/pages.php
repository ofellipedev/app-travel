<?php

function load() {
  $page = filter_input(INPUT_GET, 'page');

  $page = (!$page) ? 'pages/home.php' : "pages/{$page}.php";

  if(!file_exists($page)) {
    throw new \Exception("Opa, aconteceu algo de errado aqui");
  }

  return $page;
}