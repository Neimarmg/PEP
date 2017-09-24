<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>CADASTRO PEP</h3>
            </div>
            <div class="row">
                <p>
                    <a href="create.php" class="btn btn-success">Cadastrar</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nome Cliente</th>
                      <th>Email Cliente</th>
                      <th>Senha Cliente</th>
					  <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM Pessoa ORDER BY id DESC'; // select table
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['nome'] . '</td>';
                            echo '<td>'. $row['email'] . '</td>';
                            echo '<td>'. $row['senha'] . '</td>';
							echo '<td width=250>';
                            echo '<a class="btn" href="read.php?id='.$row['id'].'">Visualiza</a>';
                            echo ' ';
                            echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Atualiza</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Deleta</a>';
                            echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div>
  </body>
</html>
