<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Polaris</title>
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="../style_02.css" rel="stylesheet">
  </head>

  <body id="body-b">
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a href="index.html"><img src="../img/logo2.png" alt="Logotipo" height="48 "></a>
        <a class="navbar-brand pl-2" href="../start.html">POLARIS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item">
              <a class="nav-link" href="../start.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../tech.html">New Technologies</a>
            </li><li class="nav-item">
              <a class="nav-link" href="../homes.html">Smart Homes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../about.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../contact.html">Contact<span class="sr-only">(current)</span></a>
            </li>
          </ul>
          <p><a style="color: #ffffff" href="../indexpt.html"><img src="../img/brazil1.png" height="30">   PT </a></p>
        </div>
      </nav>
    </header>

    <main role="main">

      <div class="container marketing">
        <div class="row justify-content-center" style="margin-top: 100px;">
          <div class="col-lg-12">
            <h2>Polaris Message Database</h2>
            <br>
            <?php
              //connection info
              $serverName = "localhost";
              $dbUser = "root";
              $dbPassword = "";
              $dbName = "projeto";
              $charset = "utf8";

              //make the query
              $conn = "mysql:host=$serverName;dbname=$dbName;charset=$charset";

              $count = 1;

              $opt = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
              ];

              //check Connection
              $access = new PDO($conn, $dbUser, $dbPassword, $opt);

              //Select Messages Form Database
              $sql = "SELECT * FROM polarismensagem";

              $query = $access->prepare($sql);
              $query->execute();

              //print informations as a table
              if ($query->rowCount() > 0) {
                echo '<table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col" style="width: 45em;"> Name </th>
                          <th scope="col"> Phone </th>
                          <th scope="col"> Email </th>
                        </tr>
                      </thead>
                      <tbody>';
                // output data of each row
                while($row = $query->fetch()) {
                    //echo "<br> Nome: ". $row["nome"]. " - Email: ". $row["email"];
                    echo '<tr>
                            <td><a href="#hideMessage'.$count.'"data-toggle="collapse">'. $row["nome"]. '</a></td>
                    <td>'.$row["telefone"].'</td><td><a href="mailto:'.$row["email"].'">'.$row['email'].'</a></td></tr>';
                    echo'<tr class="collapse multi-collapse" id="hideMessage'.$count++.'"><td><div class="card card-body">'.$row['mensagem'].'</div><td></tr>';
                }
                echo '</tbody>
                      </table>';
              } else {
                echo "0 results";
              }
             ?>
          </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
