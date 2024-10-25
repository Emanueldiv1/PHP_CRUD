<?php
require 'db.php';  // Conexão com o banco de dados

// Recebe o ID via GET para buscar o personagem a ser editado
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM personagem WHERE id = ?");
$stmt->execute([$id]);
$personagem = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$personagem) {
  die("Personagem não encontrado.");
}

// Verifica se o formulário foi enviado via POST para atualizar os dados
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $_POST['nome'];
  $poder = $_POST['poder'];
  $jogo = $_POST['jogo'];

  // Atualiza os dados do personagem no banco de dados
  $stmt = $pdo->prepare("UPDATE personagem SET nome = ?, poder = ?, jogo = ? WHERE id = ?");
  $stmt->execute([$nome, $poder, $jogo, $id]);

  // Redireciona para a página principal após a atualização
  header('Location: index.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Editar Personagem</title>
  <link rel="stylesheet" href="css/edit.css">  
</head>

<body>
  <h1>Editar Personagem</h1>
  
  <!-- Formulário para editar os dados do personagem -->
  <form method="POST" action="">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" value="<?= $personagem['nome'] ?>" required><br>
    
    <label for="poder">Poder:</label>
    <input type="text" name="poder" id="poder" value="<?= $personagem['poder'] ?>" required><br>
    
    <label for="jogo">Jogo:</label>
    <input type="text" name="jogo" id="jogo" value="<?= $personagem['jogo'] ?>" required><br>
    
    <button type="submit">Atualizar</button>
  </form>

  <a href="index.php">Voltar</a>
</body>

</html>
