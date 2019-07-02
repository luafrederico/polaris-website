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

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM devs WHERE email LIKE :email AND password LIKE :password";

$query = $access->prepare($sql);

$query->execute(array(
  ':email'=> $email,
  ':password'=> $password,
));

if ($query->rowCount() > 0) {
  header('Location: admMessage.php');
} else{
  echo '<!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title></title>
      <script>
        function eMessage(){
          alert("Email or Password invalid!");
          window.location.replace("../admLogin.html");
        }
      </script>
    </head>
    <body>

    </body>
  </html>';
  echo "<script>
        eMessage();
      </script>";
}
?>
