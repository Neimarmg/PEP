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
    <div class="container-fluid" align="center">
        <img alt="Logo PEP" src="img/logo.png">
        <div class="col-md-12">
            <div>
                <h3>Atualizar Cadastro</h3>
            </div>

            <?php /* Leitura dos dados do Usuário  */
                require 'database.php';  

                $id = 0;
                if ( !empty($_GET['id'])) {
                    $id = $_REQUEST['id'];
                }
                
                if (!empty($_POST)) {
                    // post values
                    $id = $_POST['id'];
                    $login = $_POST['login'];
                    $email = $_POST['email']; 
                    $senha = $_POST['senha'];		

                    // validação
                    $valid = true;
                
                    if ($login=='' or $email=='' or $senha=='') {
                        $valid = false;
                        print("Por favor, preencha os campos obrigatórios!");
                    }	
                
                    // atualiza dados
                    if ($valid) {
                        $pdo = Database::connect();
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = "UPDATE Usuario  set login = ?, email = ?, senha =? WHERE id = ?";
                        $q = $pdo->prepare($sql);
                        $q->execute(array($login,$email,$senha,$id));
                        Database::disconnect();
                        print("ATUALIZAÇAO REALIZADA COM SUCESSO!!!");
                        //header("Location: index.php");
                    }
                } else {
                    $id=$_GET['id'];                
                    $pdo = Database::connect();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT * FROM Usuario where id = ?";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($id));
                    $data = $q->fetch(PDO::FETCH_ASSOC);
                    $login = $data['login'];
                    $email = $data['email'];
                    $senha = $data['senha'];
                    Database::disconnect();
                }
            ?> 

            <div>
                <form class="form" action="update.php" method="POST" >
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="control-group">
                    <label class="control-label">Login</label>
                    <div class="controls">
                        <input name="login" type="text"  value="<?php echo $login; ?>" id="login">
                    </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label">Email</label>
                    <div class="controls">
                        <input name="email" type="text" value="<?php echo $email; ?>" id="email">
                    </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label">Senha</label>
                    <div class="controls">
                        <input name="senha" type="text"  value="<?php echo $senha; ?>" id="senha">
                    </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" class="btn btn-success" value="Atualizar">
                        <a class="btn" href="index.php">Voltar</a>
                    </div>
                </form>
            </div>
        </div>             
    </div> <!-- /container -->
  </body>
</html>



