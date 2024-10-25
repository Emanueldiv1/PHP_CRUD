<?php
$host = 'localhost';  // Endereço do servidor
$dbname = 'crud_personagem';  // Nome do banco de dados
$username = 'postgres';  // Usuário do banco de dados
$password = 'root';  // Senha do banco de dados

try {
  // String de conexão para PostgreSQL
  $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Erro ao conectar com o banco de dados: " . $e->getMessage());
}
