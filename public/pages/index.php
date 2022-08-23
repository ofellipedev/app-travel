<?php

require ("../vendor/autoload.php");

$pdo = db_connect();

$sql = $pdo->query('SELECT * FROM users');
$users = $sql->fetchAll(PDO::FETCH_ASSOC);
$count = $sql->rowCount();

?>

<a href="create_user.php">CADASTRAR USUÁRIO</a>

<h3>Total de Usuários cadastrados: <?= $count ?> </h3>

<table border="1" width="800px"></i>>
  <tr>
    <td>ID</td>
    <td>NOME</td>
    <td>EMAIL</td>
    <td>NASCIMENTO</td>
  </tr>
  <?php foreach($users as $user): ?>
  <tr>
    <td><?= $user['id_user'] ?></td>
    <td><?= $user['name'] ?></td>
    <td><?= $user['email'] ?></td>
    <td><?= $user['birth_date'] ?></td>
  </tr>
  <?php endforeach; ?>
</table>
