<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PEP</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container-fluid"  align="center">
        <img alt="Logo PEP" src="img/logo.png">
        <h3>CADASTRO DE USUARIO - PEP</h3>
        <div>
            <p>
                <a href="formCadastro.php" class="btn btn-success">Cadastrar novo usuário</a>
            </p>
            <table class="table table-striped table-bordered table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Login Cliente</th>
                        <th>Email Cliente</th>
                        <th>Senha Cliente</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'database.php';
                    $pdo = Database::connect();
                    $sql = 'SELECT * FROM Usuario ORDER BY id DESC'; // select table
                    foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['login'] . '</td>';
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