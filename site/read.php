<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM Usuario where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
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
    <div class="container-fluid" align="center">
        <img alt="Logo PEP" src="img/logo.png">
        <div>
            <div>
                <h3>Visualiza</h3>
            </div>
                
            <div class="form-horizontal" align="center">
                <div class="control-group">
                    <label class="control-label" >Login:</label>
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['login'];?>
                        </label>
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label">Email:</label>
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['email'];?>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label ">Senha:</label>
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['senha'];?>
                        </label>
                    </div>
                </div>

                <div class="form-actions">
                    <a class="btn" href="index.php">Voltar</a>
                </div>
                        
            </div>
        </div>
                 
    </div> <!-- /container -->
  </body>
</html>
