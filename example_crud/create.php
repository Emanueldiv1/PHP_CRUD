<?php
require 'db.php';  // Conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $_POST['nome'];
  $poder = $_POST['poder'];
  $jogo = $_POST['jogo'];

  // Preparação da consulta SQL para inserir o personagem
  $stmt = $pdo->prepare("INSERT INTO personagem (nome, poder, jogo) VALUES (?, ?, ?)");
  $stmt->execute([$nome, $poder, $jogo]);

  // Redireciona para a página principal após a inserção
  header('Location: index.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Adicionar Personagem</title>
  <link rel="stylesheet" href="css/creat.css">  
</head>

<body>
  <h1>Adicionar Personagem</h1>
  <form method="POST" action="">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required><br>
    
    <label for="poder">Poder:</label>
    <input type="text" name="poder" id="poder" required><br>
    
    <label for="jogo">Jogo:</label>
    <input type="text" name="jogo" id="jogo" required><br>
    
    <button type="submit">Adicionar</button>
  </form>
  <a href="index.php">Voltar</a>
</body>

</html>
