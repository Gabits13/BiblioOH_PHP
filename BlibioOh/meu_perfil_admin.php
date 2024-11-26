<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlibioOH - Home </title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.20.0/font/bootstrap-icons.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
      <link rel="stylesheet" href="https:// cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
      <link rel="stylesheet" href="css/style.css">
      <?php session_start();?>
</head>
<header>
<style>
        .profile-container {
            max-width: 600px;
            margin: 50px auto;
            text-align: center;
        }
        .form-control {
            margin-bottom: 15px;
        }
        .header{
            width: 100%;
    height: 80px;
    background: linear-gradient(135deg, #309190, #56c4c5);
    color: white;
    position: fixed;
    top: 0;
    left: 0;
    padding: 0 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    z-index: 1; /*isso vai sobrepor ou ficar na frente da sidebar fixa ao lado, importante lembrar....*/
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>

   <div class="container w-100 p-0 mt-0 mb-5">
    <div class="header">
        <div class="d-flex align-items-center justify-content-center w-100">
            <img src="img/logo.png" alt="Logo" width="70" height="70">
        </div>
        <div class="d-flex align-items-center" style="position: absolute; right: 20px;">
            <!--<button id="themeSwitcher" class="btn-per btn btn-outline-dark mx-3" onclick="toggleTheme()">
                <i id="themeIcon" style="color:rgb(255, 118, 0) ;" class="bi bi-sun"></i>
            </button>-->
        </div>
    </div>
</div>

<body>

<div class="container mt-5">
    <h1 class="text-center mt-5 mb-4" >Meu Perfil</h1>
    <div class="text-center mb-4">
        <img src="img/perfil.jpg" alt="Foto de Perfil" class="rounded-circle" width="200" height="200">
        <h2><?php echo $_SESSION['Nome_Func']; ?></h2>
        <p><?php echo $_SESSION['Email_Func']; ?></p>
    </div>

    <form method="POST" class="row g-3">
        <div class="col-md-6">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $_SESSION['Nome_Func']; ?>" required>
        </div>
        <div class="col-md-6">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $_SESSION['Endereco_Func']; ?>" required>
        </div>
        <div class="col-md-6">
            <label for="rg" class="form-label">RG</label>
            <input type="text" class="form-control" id="rg" name="rg" value="<?php echo  $_SESSION['Rg_Func']; ?>" required>
        </div>
        <div class="col-md-6">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $_SESSION['Cpf_Func']; ?>" required>
        </div>
        <div class="col-md-6">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $_SESSION['Telefone_Func']; ?>" required>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['Email_Func']; ?>" required>
        </div>
        <div class="col-md-6">
            <label for="cod_periodo" class="form-label">Cod_Periodo</label>
            <input type="text" class="form-control" id="cod_periodo" name="cod_periodo" value="<?php echo $_SESSION['Cod_Periodo']; ?>" required>
        </div>
        <div class="col-md-6">
            <label for="cod_cargo" class="form-label">Cod_Cargo</label>
            <input type="text" class="form-control" id="cod_cargo" name="cod_cargo" value="<?php echo $_SESSION['Cod_Cargo']; ?>" required>
        </div>
        <div class="col-md-6">
            <label for="senha" class="form-label">Senha</label>
            <input type="text" class="form-control" id="senha" name="senha" value="<?php echo $_SESSION['Senha_Func']; ?>" required>
        </div>
        <div class="col-12">
            <input type="submit" class="btn btn-primary custom-btn w-100 mb-5" name="btnalterar" value="Atualizar dados">
        </div>
    </form>
</div>
  

<?php
    extract($_POST, EXTR_OVERWRITE);
        if (isset($btnalterar)) {
            include_once 'php_classes/Funcionario.php';
            $f = new Funcionario();
            $f->setNome($nome);
            $f->setRg($rg);
            $f->setCpf($cpf);
            $f->setDataNascimento($dataNascimento);
            $f->setDataAdmissao($dataAdmissao);
            $f->setEndereco($endereco);
            $f->setTelefone($telefone);
            $f->setEmail($email);
            $f->setCodPeriodo($codPeriodo);
            $f->setCodCargo($codCargo);
            $f->setIdFuncionario($_SESSION['Id_Funcionario']);
            $f->alterar2();

            $_SESSION['Nome_Func'] = $f->getNome();
            $_SESSION['Rg_Func'] = $f->getRg();
            $_SESSION['Cpf_Func'] = $f->getCpf();
            $_SESSION['Data_Nascimento'] = $f->getDataNascimento();
            $_SESSION['Data_Admissao'] = $f->getDataAdmissao();
            $_SESSION['Endereco_Func'] = $f->getEndereco();
            $_SESSION['Telefone_Func'] = $f->getTelefone();
            $_SESSION['Email_Func'] = $f->getEmail();
            $_SESSION['Cod_Periodo'] = $f->getCodPeriodo();
            $_SESSION['Cod_Cargo'] = $f->getCodCargo();

            echo '<script>window.location.href = "' . $_SERVER['PHP_SELF'] . '";</script>';
            //Por favor não coloque essa parte do código em outro lugar se não ele quebra
        } 
?>

     <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

   <!-- Footer -->
 <div class="b-example-divider mt-auto" style="background: linear-gradient(135deg, #2c8583, #4aa7a8);">
  <div class="container" style="color: white;">
    <footer class="py-5">
      <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
        <p id="direitos-footer">&copy; 2024 BiblioOh&reg;. Todos os direitos reservados</p>
        <ul class="list-unstyled d-flex">
          <li class="ms-3"><a rel="external" class="link-body-emphasis" href="#"><img src="img/instaicon.png" alt="Instagram" width="24" height="24"></a></li>
          <li class="ms-3"><a rel="external" class="link-body-emphasis" href="#"><img src="img/facebookicon.png" alt="Facebook" width="24" height="24"></a></li>
          <li class="ms-3"><a rel="external" class="link-body-emphasis" href="#"><img src="img/whatsappicon.png" alt="WhatsApp" width="24" height="24"></a></li>
        </ul>
      </div>

  

      <div class="row">
        <div class="col text-center">
          <a href="#" class="btn btn-dark btn-m rounded-pill"><i class="bi-arrow-up-circle"></i></a>
        </div>
      </div>
    </footer>
  </div>
</div>
</div>  
</body>

</html>