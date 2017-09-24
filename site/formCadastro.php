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
            <h3>Cadastro de Usuário</h3>
        </div>
    
        <form class="form" action="formCadastro.php" method="POST">

            <div class="control-group">
            <label class="control-label">Login</label>
            <div class="controls">
                <input name="login" type="text"  placeholder="login" id="login">
            </div>
            </div>

            <div class="control-group">
            <label class="control-label">E-mail</label>
            <div class="controls">
                <input name="email" type="text" placeholder="E-mail" id="email">
            </div>
            </div>

            <div class="control-group">
            <label class="control-label">Senha</label>
            <div class="controls">
                <input name="senha" type="text"  placeholder="Senha" id="senha">
            </div>
            </div>

            <div class="form-actions">
                <input type="submit" class="btn btn-success" value="Cadastrar"> <!--  id="cadastrar" name="cadastrar"> -->
                <a class="btn" href="index.php">Voltar</a>
            </div>
        </form>
        <?php
            require 'database.php';

            if ( !empty($_POST)) {
                // post values
                $login = $_POST['login'];
                $email = $_POST['email']; 
                $senha = $_POST['senha'];		
                
                // validação
                $valid = true;

                if ($login=='' or $email=='' or $senha=='') {
                    $valid = false;
                    print("Por favor, preencha os campos obrigatórios!");
                }	
                

                // inserindo dados
                if ($valid) {
                    $pdo = Database::connect();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $sql = "INSERT INTO Usuario (login, email, senha) values(?, ?, ?)";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($login,$email,$senha));
                    Database::disconnect();
                    //header("Location: index.php");
                    print("CADASTRO REALIZADO COM SUCESSO!!!");
                }
            }
        ?>
    </div> <!-- /container -->
  </body>
</html>
