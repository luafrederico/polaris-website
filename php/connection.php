<?php
//connection info
$serverName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "projeto";
$charset = "utf8";

//make the query
$conn = "mysql:host=$serverName;dbname=$dbName;charset=$charset";

$opt = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false,
];

//check Connection
$access = new PDO($conn, $dbUser, $dbPassword, $opt);

$nome = $_POST['name'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$mensagem = $_POST['mensagem'];

$sql = "INSERT INTO polarismensagem VALUES (:nome, :email, :telefone, :mensagem)";

$query = $access->prepare($sql);

$query->execute(array(
  ':nome'=> $nome,
  ':email'=> $email,
  ':telefone'=> $telefone,
  ':mensagem'=>$mensagem,
));

header('Location: ../mensagemEnviada.html');
?>
