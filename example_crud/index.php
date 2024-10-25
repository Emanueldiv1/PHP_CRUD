<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM personagem");
$personagem = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Listar Usuários</title>
  <link rel="stylesheet" href="css/index.css">
</head>

<body>
  <h1>Personagens</h1>
  
  <table border="1">
    <tr>
      <th>ID</th>
      <th>NOME</th>
      <th>PODER</th>
      <th>JOGO</th>
    </tr>
    <?php foreach ($personagem as $personagem): ?>
      <tr>
        <td><?= $personagem['id'] ?></td>
        <td><?= $personagem['nome'] ?></td>
        <td><?= $personagem['poder'] ?></td>
        <td><?= $personagem['jogo'] ?></td>
        <td>
          <a href="edit.php?id=<?= $personagem['id'] ?>">Editar</a>
        </td>
        <td>
          <a href="delete.php?id=<?= $personagem['id'] ?>" class="delete-btn" onclick="return confirm('Tem certeza que deseja deletar este personagem?')">Deletar</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
  
  <a href="create.php" class="add-btn">Adicionar Novo Usuário</a>
</body>

</html>
