<?php
    require 'database.php';
    $id = 0;
     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        //post values
        $id = $_POST['id'];
         
        // deletar dados
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM Usuario  WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: index.php");
         
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PEP</title>
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container-fluid"  align="center">
        <img alt="Logo PEP" src="img/logo.png">
        <div>
            <h3>Deletar um Cliente</h3>                     
            <form class="form-horizontal" action="delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id;?>"/>
                <p class="alert alert-error">Você tem certeza que deseja deletar o usuário?</p>
                <div class="form-actions">
                    <button type="submit" class="btn btn-danger">Sim</button>
                    <a class="btn" href="index.php">Não</a>
                </div>
            </form>
        </div>             
    </div> <!-- /container -->
  </body>
</html>