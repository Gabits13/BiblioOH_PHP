<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlibioOH - Home </title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.20.0/font/bootstrap-icons.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
    </style>
    <div class="px-3 py-2 text-white" style="background-color: #309190;">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="menu_User.php" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
           <img width="80" height="80" class="d-inline-block align-text-center"src="img/logo.png" alt="Logo">
          </a>

          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
              <a href="#" class="nav-link text-white">
                <img class="bi d-block mx-auto mb-1" width="30" height="30" src="img/homeicon.png" alt="">
                Home
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white">
               <img class="bi d-block mx-auto mb-1" width="30" height="30" src="img/livrosicon.png" alt="">
                Livros
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white">
                <img class="bi d-block mx-auto mb-1" width="30" height="30" src="img/emprestimosicon.png" alt="">
                Meus Empréstimos
              </a>
            </li>
            <li>
              <a href="sobrenos.html" class="nav-link text-white">
                <img class="bi d-block mx-auto mb-1" width="30" height="30" src="img/sobrenosicon.png" alt="">
                Sobre Nós
              </a>
            </li>
          </ul>
          <div class="dropdown text-end">
            <a href="#" class=" mx-auto  link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="img/foto.jpg" alt="foto de  perfil" width="45" height="45" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small">
              <li><a class="dropdown-item" href="meu_perfil.php">Meu Perfil</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="LoginUser.php">Sair da Conta</a></li>
            </ul>
          </div>
        </div>
      </div>
        </div>
      </div>
    </div>
    <div class="px-3 py-2 border-bottom mb-3">
      <div class="container d-flex flex-wrap justify-content-center">

        <a class="me-auto" href="faleconosco.html">
          <button type="button" class="btn btn-outline-primary me-auto custom-btn">Fale Conosco</button>
       </a>

                 

         <div class="d-flex align-items-center">
        <button id="themeSwitcher2" class="btn-per btn btn-outline-dark custom-btn mx-1" onclick="toggleTheme2()">
          <i id="themeIcon2" class="bi bi-sun"></i>
        </button>
        <div class="dropdown">
          <button class="btn-per btn btn-outline-dark custom-btn dropdown-toggle " type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-translate"></i>
          </button>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
            <li><a class="dropdown-item" onclick="changeLanguage('pt')">Português</a></li>
            <li><a class="dropdown-item" onclick="changeLanguage('es')">Español</a></li>
            <li><a class="dropdown-item" onclick="changeLanguage('en')">English</a></li>
          </ul>
        </div>
    </div>
      </div>
    </div>
  </header>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Meu Perfil</h1>
    <div class="text-center mb-4">
        <img src="img/foto.jpg" alt="Foto de Perfil" class="rounded-circle" width="200" height="200">
        <h2><?php echo $_SESSION['Nome_User']; ?></h2>
        <p><?php echo $_SESSION['Email_User']; ?></p>
    </div>

    <form method="POST" class="row g-3">
        <div class="col-md-6">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $_SESSION['Nome_User'];; ?>" required>
        </div>
        <div class="col-md-6">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $_SESSION['Endereco_User']; ?>" required>
        </div>
        <div class="col-md-6">
            <label for="rg" class="form-label">RG</label>
            <input type="text" class="form-control" id="rg" name="rg" value="<?php echo  $_SESSION['Rg_User']; ?>" required>
        </div>
        <div class="col-md-6">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $_SESSION['Cpf_User']; ?>" required>
        </div>
        <div class="col-md-6">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $_SESSION['Telefone_User']; ?>" required>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['Email_User']; ?>" required>
        </div>
        <div class="col-md-6">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" value="<?php echo $_SESSION['Senha_User']; ?>" required>
        </div>
        <div class="col-12">
            <input type="submit" class="btn btn-primary w-100" name="btnalterar" value="Atualizar dados">
        </div>
    </form>
</div>

<?php
  extract($_POST, EXTR_OVERWRITE);
  if (isset($btnalterar)) {
  include_once 'php_classes/usuario.php';
  $u = new Usuario();
  $u->setNome($nome);
  $u->setEndereco($endereco);
  $u->setRg($rg);
  $u->setCpf($cpf);
  $u->setTelefone($telefone);
  $u->setEmail($email);
  $u->setSenha($senha);
  $u->setIdUsuario($_SESSION['Id_Usuario']);
  $u->alterar2();

  $_SESSION['Nome_User'] = $u->getNome();
  $_SESSION['Endereco_User'] = $u->getEndereco();
  $_SESSION['Rg_User'] = $u->getRg();
  $_SESSION['Cpf_User'] = $u->getCpf();
  $_SESSION['Telefone_User'] = $u->getTelefone();
  $_SESSION['Email_User'] = $u->getEmail();
  $_SESSION['Senha_User'] = $u->getSenha();

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