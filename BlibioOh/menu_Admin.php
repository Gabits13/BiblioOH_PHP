<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.20.0/font/bootstrap-icons.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
      <link rel="stylesheet" href="css/admin.css">
      <?php session_start();?>

</head>
<body>

    
   <!-- Barra Superior -->
    <header>
   <div class="container w-100 p-0 mt-0 mb-0">
    <div class="header">
        <div class="d-flex align-items-center justify-content-center w-100">
            <img src="img/logo.png" alt="Logo" width="70" height="70">
        </div>
        <div class="d-flex align-items-center" style="position: absolute; right: 20px;">
            <button id="themeSwitcher2" class="btn-per btn btn-outline-dark mx-3" onclick="toggleTheme2()">
                <i id="themeIcon2" style="color:rgb(255, 118, 0) ;" class="bi bi-sun"></i>
            </button>
        </div>
    </div>
</div>
</header>
    

    <!-- Menu Lateral -->
   <div class="sidebar mb-0">
    <div class="text-center mb-3">
       <a href="meu_perfil_admin.php "> 
          <img src="img/foto.jpg" alt="Perfil" width="100" height="100" class="mb-2 rounded-circle">
          <h5 style="font-weight: bold; color: rgb(255, 118, 0);"><?php echo $_SESSION['Nome_Func']?></h5>
          <span style="color: #dadada; font-size: 11pt;"><?php echo $_SESSION['Email_Func']?></span>
      </a>
    </div>
    
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="#" class="nav-link"><i class="bi bi-house-door-fill"></i> Início</a>
        </li>
        <li class="nav-item">
            <a href="php_crud/TabelaUsuario.php" class="nav-link"><i class="bi bi-people"></i> Usuários</a>
        </li>
        <li class="nav-item">
            <a href="php_crud/TabelaLivro.php" class="nav-link"><i class="bi bi-book"></i> Livros</a>
        </li>

        <!-- Dropdown para Administração Interna -->
        <li class="nav-item">
            <a href="#adminDropdown" class="nav-link" data-bs-toggle="collapse" aria-expanded="false">
                <i class="bi bi-gear-fill"></i> Administração Interna
                <i class="bi bi-caret-down-fill ms-auto"></i>
            </a>
            <div class="collapse" id="adminDropdown">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                        <a href="php_crud/TabelaContaAdm.php" class="nav-link"><i class="bi bi-person-badge"></i> Administradores</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="bi bi-book-half"></i> Administrar Livro</a>
                    </li>
                    <li class="nav-item">
                        <a href="php_crud/TabelaFuncionario.php" class="nav-link"><i class="bi bi-briefcase"></i> Funcionários</a>
                    </li>
                    <li class="nav-item">
                        <a href="php_crud/TabelaSetor.php" class="nav-link"><i class="bi bi-layout-text-sidebar"></i> Setores</a>
                    </li>
                    <li class="nav-item">
                        <a href="php_crud/TabelaCargo.php" class="nav-link"><i class="bi bi-briefcase"></i> Cargos</a>
                    </li>
                    <li class="nav-item">
                        <a href="php_crud/TabelaPeriodo.php" class="nav-link"><i class="bi bi-calendar3"></i> Período</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a href="php_crud/TabelaEmprestimo.php" class="nav-link"><i class="bi bi-calendar-check"></i> Empréstimos</a>
        </li>
        <li class="nav-item mt-auto">
            <a href="LoginUser.php" class="nav-link"><i class="bi bi-box-arrow-right"></i> Sair</a>
        </li>
    </ul>
</div>

    <!-- Conteúdo Principal -->
    <div class="content mt-4">
        <div class="container-fluid w-100 p-0"> 
            <div style="margin-top: -20px;" id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel"> 
              <div class="carousel-inner mb-3">
                <div class="carousel-item active" id="carrossel-item" data-bs-interval="5000">
                  <img src="img/blibioteca.jpg" class="d-block w-100" style="pointer-events: none; object-fit: cover; max-height: 400px;" alt="Foto de um CNC por dentro">
                   <div class="carousel-caption d-block d-md-block">
                    <h3>BlibioOH&reg;</h3>
                    <p id="carousel-caption1" style="font-family: Arial; font-size: 18px; font-weight: bold;">Explore um universo de histórias e descobertas na BiblioOH</p>
                  </div>
                </div>
                <div class="carousel-item" id="carrossel-item" data-bs-interval="7000">
                  <img src="img/biblioteca2.jpg" class="d-block w-100" style="pointer-events: none; object-fit: cover; max-height: 400px; filter: blur(0.5px);" alt="Foto de um CNC por dentro">
                   <div class="carousel-caption d-block d-md-block">
                    <h3 id= "carousel-title2">BlibioOH&reg;</h3>
                    <p id="carousel-caption2" style="font-family: Arial; font-size: 18px; font-weight: bold;">Sua próxima aventura começa aqui!</p>
                  </div>
                </div>
                <div class="carousel-item" id="carrossel-item" data-bs-interval="7000">
                  <img src="img/biblioteca3.jpg" class="d-block w-100" style="pointer-events: none; object-fit: cover; max-height: 400px; filter: blur(0.5px);" alt="Foto de um CNC por dentro">
                   <div class="carousel-caption d-block d-md-block">
                    <h3 id= "carousel-title3">BlibioOH&reg;</h3>
                    <p id="carousel-caption3" style="font-family: Arial; font-size: 18px; font-weight: bold;">Conecte-se ao conhecimento e inspire-se em cada página.</p>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        <h1 class="mt-5">Bem-vindo à Área Administrativa</h1>
        <p class="mb-5">Este é o painel de administração onde você pode gerenciar livros, usuários e configurações do sistema.</p>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Footer -->
<footer class="bg-primary text-white py-4 mt-auto">
    <div class="container-fluid">
        <div class="row">
            <!-- Espaçamento lateral da sidebar -->
            <div class="col-12 col-md-8 offset-md-3">
                <div class="text-center">
                    <p class="mb-2">&copy; 2024 BiblioOh&reg;. Todos os direitos reservados</p>
                    <ul class="list-unstyled d-flex justify-content-center">
                        <li class="ms-3"><a href="#" target="_blank" rel="external" class="text-white">
                            <i class="fab fa-instagram" style="font-size: 24px;"></i></a></li>
                        <li class="ms-3"><a href="#" target="_blank" rel="external" class="text-white">
                            <i class="fab fa-facebook" style="font-size: 24px;"></i></a></li>
                        <li class="ms-3"><a href="#" target="_blank" rel="external" class="text-white">
                            <i class="fab fa-whatsapp" style="font-size: 24px;"></i></a></li>
                            <li class="ms-3"><a target="_blank" rel="external" class="text-white" href="#" data-bs-toggle="modal" data-bs-target="#githubModal"><i class="fab fa-github" style="font-size: 24px;"></i></a></li>
                    </ul>
                    <div class="row mb-1">
                      <div class="col mt-3 text-center">
                          <a href="#top" class="btn btn-dark rounded-circle">
                              <i class="bi bi-arrow-up-circle" style="font-size: 20px;"></i>
                          </a>
                      </div>
                  </div>
                </div>
            </div>
        </div>
      </div>
  
</footer>


      <!-- Modal do GitHub -->
      <div class="modal fade" id="githubModal" tabindex="-1" aria-labelledby="githubModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #24292e; color: #fff; border-bottom: none;">
              <i class="fab fa-github" style="font-size: 2rem; margin-right: 8px;"></i>
              <h5 class="modal-title" id="githubModalLabel">Sobre os Desenvolvedores</h5>
              <button type="button" class="btn-close custom-bg" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
              <ul class="list-unstyled d-flex justify-content-center">
                <li style="margin-right: 16px;">
                  <a href="https://github.com/Gabits13" target="_blank" class="link-body">
                    <img src="img/foto.jpg" alt="Perfil do Gabriel Santos" class="mt-2" width="80" height="80" style="border-radius: 50%;">
                  </a>
                  <p class="text-center mt-2" style="text-decoration: none; color: black;">Gabriel Santos</p>
                </li>
                <li style="margin-right: 16px;">
                  <a href="https://github.com/Gabits13" target="_blank" class="link-body">
                    <img src="img/fotoBielOliveira.jpg" alt="Perfil do Gabriel Santos" class="mt-2" width="80" height="80" style="border-radius: 50%;">
                  </a>
                  <p class="text-center mt-2" style="text-decoration: none; color: black;">Gabriel Oliveira</p>
                </li>
                <li style="margin-right: 16px;">
                  <a href="https://github.com/Gabits13" target="_blank" class="link-body">
                    <img src="img/fotoGui.jpg" alt="Perfil do Gabriel Santos" class="mt-2" width="80" height="80" style="border-radius: 50%;">
                  </a>
                  <p class="text-center mt-2" style="text-decoration: none; color: black;">Guilherme Santos</p>
                </li>
              </ul>
            </div>
            <div class="modal-footer" style="border-top: none;">
              <button type="button" class="btn btn-secondary" id="botao-fechar-footer-2" data-bs-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
      </div>
  </div> 
</body>
</html>
