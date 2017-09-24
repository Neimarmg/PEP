<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Atualizar Cadastro</h3>
                    </div>
             
                    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
                      <div class="control-group <?php echo !empty($nomeErro)?'Erro':'';?>">
                        <label class="control-label">Nome</label>
                        <div class="controls">
                            <input nome="nome" type="text"  placeholder="nome" value="<?php echo !empty($nome)?$nome:'';?>">
                            <?php if (!empty($nomeErro)): ?>
                                <span class="help-inline"><?php echo $nomeErro;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($emailErro)?'Erro':'';?>">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input nome="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailErro)): ?>
                                <span class="help-inline"><?php echo $emailErro;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($senhaErro)?'Erro':'';?>">
                        <label class="control-label">Senha</label>
                        <div class="controls">
                            <input nome="senha" type="text"  placeholder="senha Number" value="<?php echo !empty($senha)?$senha:'';?>">
                            <?php if (!empty($senhaErro)): ?>
                                <span class="help-inline"><?php echo $senhaErro;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Atualizar</button>
                          <a class="btn" href="index.php">Voltar</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
<?php
    require 'database.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    }
     
    if ( !empty($_POST)) {
        // validação
        $nomeErro = null;
        $emailErro = null;
        $senhaErro = null;
         
        // post values
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
         
        // validação
        $valid = true;
        if (empty($nome)) {
            $nomeErro = 'Nome Completo';
            $valid = false;
        }
         
        if (empty($email)) {
            $emailErro = 'Endereço de E-mail incorreto';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailErro = 'Endereço de E-mail incorreto';
            $valid = false;
        }
         
        if (empty($senha)) {
            $senhaErro = 'Senha muito Fraca';
            $valid = false;
        }
         
        // Atualiza dados
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE Pessoa  set nome = ?, email = ?, senha =? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($nome,$email,$senha,$id));
            Database::disconnect();
            header("Location: index.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM Pessoa where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $nome = $data['nome'];
        $email = $data['email'];
        $senha = $data['senha];
        Database::disconnect();
    }
?>