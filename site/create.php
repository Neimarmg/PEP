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
                        <h3>Cadastro de Usuario</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($codUsuarioErro)?'Erro':'';?>">
                        <label class="control-label">Usu�rio</label>
                        <div class="controls">
                            <input nome="codUsuario" type="text"  placeholder="nome" value="<?php echo !empty($codUsuario)?$codUsuario:'';?>">
                            <?php if (!empty($codUsuarioErro)): ?>
                                <span class="help-inline"><?php echo $nomeErro;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($codPessoaErro)?'Erro':'';?>">
                        <label class="control-label">Id pessoa</label>
                        <div class="controls">
                            <input nome="codPessoa" type="text" placeholder="E-mail válido" value="<?php echo !empty($codPessoa)?$codPessoa:'';?>">
                            <?php if (!empty($codPessoaErro)): ?>
                                <span class="help-inline"><?php echo $emailErro;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($senhaErro)?'Erro':'';?>">
                        <label class="control-label">Senha</label>
                        <div class="controls">
                            <input nome="senha" type="text"  placeholder="8 Digitos" value="<?php echo !empty($senha)?$senha:'';?>">
                            <?php if (!empty($senhaErro)): ?>
                                <span class="help-inline"><?php echo $senhaErro;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  
					  <div >
                        <label class="control-label">Status</label>
                        <div class="controls">
                            <input nome="status" type="text"  placeholder="8 Digitos" value="<?php echo !empty($status)?$status:'';?>">
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Cadastrar</button>
                          <a class="btn" href="index.php">Voltar</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
<?php
     
    require 'database.php';
 
   
    if ( !empty($_POST)) {
        // validação
        $codUsuarioErro = null;
        $codPessoaErro = null;
        $senhaErro = null;
         
        // post values
        $codUsuario = $_POST['codUsuario'];
        $codPessoa = $_POST['codPessoa'];
        $senha = $_POST['senha'];
		$status = $_POST['status'];
		
         
        // validação
        $valid = true;
        if (empty($codUsuario)) {
            $nomeErro = 'Usuario';
            $valid = false;
        }
        
		if (empty($codPessoa)) {
            $nomeErro = 'Id pessoa';
            $valid = false;
        }       
        
	
        /*if (empty($email)) {
            $emailErro = 'Endereço de E-mail incorreto';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailErro = 'Endereço de E-mail incorretos';
            $valid = false;
        }*/
         
        if (empty($senha)) {
            $senhaErro = 'Senha muito fraca';
            $valid = false;
        }		
		
         
        // inserindo dados
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO Pessoa (codUsuario, codPessoa, senha, status) values(?, ?, ?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($codUsuario,$codPessoa,$senha,$status));
            Database::disconnect();
            header("Location: index.php");
        }
    }
?>
		