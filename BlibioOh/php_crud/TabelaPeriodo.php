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
      <link rel="stylesheet" href="../css/admin.css">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>

    
 
 <!-- Barra Superior -->
 <header>
   <div class="container w-100 p-0 mt-0 mb-0">
    <div class="header">
        <div class="d-flex align-items-center justify-content-center w-100">
            <img src="../img/logo.png" alt="Logo" width="70" height="70">
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
       <a href="meu_perfil_admin.php"></a> <img src="../img/foto.jpg" alt="Perfil" width="100" height="100" class="mb-2 rounded-circle">
        <h5 style="font-weight: bold; color: rgb(255, 118, 0);">Nome</h5>
        <span style="color: #dadada; font-size: 11pt;">gabriel.santos@blibiooh.com</span>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="../menu_Admin.html" class="nav-link"><i class="bi bi-house-door-fill"></i> Início</a>
        </li>
        <li class="nav-item">
            <a href="TabelaUsuario.php" class="nav-link"><i class="bi bi-people"></i> Usuários</a>
        </li>
        <li class="nav-item">
            <a href="TabelaLivro.php" class="nav-link"><i class="bi bi-book"></i> Livros</a>
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
                        <a href="TabelaContaAdm.php" class="nav-link"><i class="bi bi-person-badge"></i> Administradores</a>
                    </li>
                    <li class="nav-item">
                        <a href="TabelaAdministra.php" class="nav-link"><i class="bi bi-book-half"></i> Administrar Livro</a>
                    </li>
                    <li class="nav-item">
                        <a href="TabelaFuncionario.php" class="nav-link"><i class="bi bi-briefcase"></i> Funcionários</a>
                    </li>
                    <li class="nav-item">
                        <a href="TabelaSetor.php" class="nav-link"><i class="bi bi-layout-text-sidebar"></i> Setores</a>
                    </li>
                    <li class="nav-item">
                        <a href="TabelaCargo.php" class="nav-link"><i class="bi bi-briefcase"></i> Cargos</a>
                    </li>
                    <li class="nav-item">
                        <a href="TabelaPeriodo.php" class="nav-link"><i class="bi bi-calendar3"></i> Período</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a href="TabelaEmprestimo.php" class="nav-link"><i class="bi bi-calendar-check"></i> Empréstimos</a>
        </li>
        <li class="nav-item mt-auto">
            <a href="LoginUser.php" class="nav-link"><i class="bi bi-box-arrow-right"></i> Sair</a>
        </li>
    </ul>
</div>

    <!-- Conteúdo Principal -->
    <div class="content mt-4">
        <h1 class="mt-5">Períodos</h1>
    </div>
    <div class="content-fluid mt-3 mb-3  fade-in-section">
        <div class="content mt-4 mb-5">
        <?php
    include_once '../php_classes/Periodo.php';
    $p = new Periodo();
    $periodo_bd = $p->listar();
    ?>

    <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnenviar)) {
            include_once '../php_classes/Periodo.php';
            $p = new Periodo();
            $p->setDescricao($descricao);
            $p->setHoraEntrada($horaEntrada);
            $p->setHoraSaida($horaSaida);
            $p->salvar();

            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
            //Por favor não coloque essa parte do código em outro lugar se não ele quebra
        }
    ?>

    <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnexcluir)) {
            include_once '../php_classes/Periodo.php';
            $p = new Periodo();
            $p->setCodPeriodo($cod_periodo);
            $p->excluir();

            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
            //Por favor não coloque essa parte do código em outro lugar se não ele quebra
        }
    ?>
    
    <button type="button" class="btn btn-outline-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#CadastroPeriodo">Novo Registro</button>
    <form method="post">
            <input type="text" name="nome" placeholder="Descrição">
            <button  name="btnpesquisar" class="btn btn-outline-secondary custom-btn me-auto mb-1" type="submit">
              <i class="bi bi-search"></i>
        </button>
        <style>
      .custom-btn {
    border-color: rgb(255, 118, 0); 
    color: rgb(255, 118, 0);       
    background-color: transparent; 
    transition: all 0.3s ease-in-out;
    margin-bottom: 3px; 
}

.custom-btn:hover {
    background-color: rgb(255, 118, 0); 
    color: white;                      
    border-color: rgb(255, 118, 0);    
}
table {
    border-collapse: collapse;
    width: 100%;
    margin-top: 10px;
}

table th, table td {
    border: 1px solid #ddd; 
    padding: 8px; 
    text-align: left; 
}

table td {
    max-width: 200px; /* Define uma largura máxima para as células */
    text-overflow: ellipsis; /* Adiciona '...' quando o texto é muito grande */
    overflow: hidden; /* Garante que o texto não ultrapasse o limite da célula */
}


table th {
    background-color: #f2f2f2; 
    color: black; 
}
footer {
    background: linear-gradient(to right, rgb(255, 118, 0), rgb(255, 165, 77));
    color: white;
    padding: 15px 0;
    text-align: center;
}
     </style>
                <?php
                    extract($_POST, EXTR_OVERWRITE);
                    if (isset($btnpesquisar)) {
                        include_once '../php_classes/Periodo.php';
                        $p = new Periodo();
                        $p->setDescricao($nome.'%');
                        $periodo_bd = $p->consultar();
                    } 
                ?>
            <table id="example">
                <thead>
                    <tr>
                        <th>Código do período</th>
                        <th>Descrição</th>
                        <th>Horario de entrada</th>
                        <th>Horario de saída</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <?php
                    foreach ($periodo_bd as $periodo_mostrar)
                    {
                        ?>
                        <tbody>
                            <form method="post">
                                <tr>
                                    <input type="hidden" name="cod_periodo" value="<?php echo $periodo_mostrar[0]; ?>">
                                    <td <?php echo "name = '" . $periodo_mostrar[0] . "'"?>><?php echo $periodo_mostrar[0]?></td>
                                    <td><?php echo $periodo_mostrar[1]?></td>
                                    <td><?php echo $periodo_mostrar[2]?></td>
                                    <td><?php echo $periodo_mostrar[3]?></td>
                                    <td>
                                <button type="submit" name="btnexcluir" id="<?php echo $usuario_mostrar[0] ?>" class="btn btn-outline-danger btn-sm excluir mb-1 ml-2">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <button type="button" class="btn btn-outline-primary btn-sm alterar mb-1" data-bs-toggle="modal" data-bs-target="#AlterarPeriodo">
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </td>
                                </tr>
                            </form>
                        </tbody>
                        <?php
                    }
                ?>
            </table>
        </form>

    <!-- Modal alterar -->
    <div class="modal fade" id="AlterarPeriodo" tabindex="-1" aria-labelledby="AlterarPeriodoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="AlterarPeriodoLabel">Alterar</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3" id="alt-periodo-form" method="post">
                <div class="col-12">
                    <label for="cod_periodo" class="form-label">Código do Período</label>
                    <input type="text" name="cod_periodo" class="form-control text-secondary" id="cod_periodo" readonly>
                </div>
                <div class="col-12">
                    <label for="descricao" class="form-label">Descrição</label>
                    <input type="text" name="descricao" class="form-control" id="descricao" placeholder="Descrição do período" required>
                </div>
                <div class="col-12">
                    <label for="horaEntrada" class="form-label">Horario de Entrada</label>
                    <input type="text" name="horaEntrada" class="form-control" id="horaEntrada" placeholder="Horario de Entrada" required>
                </div>
                <div class="col-12">
                    <label for="horaSaida" class="form-label">Horario de Saída</label>
                    <input type="text" name="horaSaida" class="form-control" id="horaSaida" placeholder="Horario de Saída" required>
                </div>
                
                <div class="col-12">
                    <input type="submit" name="btnalterar" class="btn btn-outline-success btn-sm" id="cad-periodo-btn" value="Alterar"/>
                </div>
            </form>

            <?php
                extract($_POST, EXTR_OVERWRITE);
                if (isset($btnalterar)) {
                    include_once '../php_classes/Periodo.php';
                    $p = new Periodo();
                    $p->setDescricao($descricao);
                    $p->setHoraEntrada($horaEntrada);
                    $p->setHoraSaida($horaSaida);
                    $p->setCodPeriodo($cod_periodo);
                    $p->alterar2();

                    echo '<script>window.location.href = "' . $_SERVER['PHP_SELF'] . '";</script>';
                    //Por favor não coloque essa parte do código em outro lugar se não ele quebra
                } 
            ?>
        </div>
        </div>
    </div>
    </div>
    <!-- Fim Modal alterar -->

    <!-- Modal cadastrar -->
    <div class="modal fade" id="CadastroPeriodo" tabindex="-1" aria-labelledby="CadastroPeriodoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="CadastroPeriodoLabel">Cadastrar</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3" id="cad-periodo-form" method="post">
            <div class="col-12">
                    <label for="descricao" class="form-label">Descrição</label>
                    <input type="text" name="descricao" class="form-control" id="descricao" placeholder="Descrição do período" required>
                </div>
                <div class="col-12">
                    <label for="horaEntrada" class="form-label">Horario de Entrada</label>
                    <input type="text" name="horaEntrada" class="form-control" id="horaEntrada" placeholder="Horario de Entrada" required>
                </div>
                <div class="col-12">
                    <label for="horaSaida" class="form-label">Horario de Saída</label>
                    <input type="text" name="horaSaida" class="form-control" id="horaSaida" placeholder="Horario de Saída" required>
                </div>

                <div class="col-12">
                    <input type="submit" name="btnenviar" class="btn btn-outline-success btn-sm" id="cad-periodo-btn" value="Cadastrar"/>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
    <!-- Fim Modal cadastrar -->
    

    <script>
        $(document).ready(function() {
            // Adicione evento de clique ao botão Alterar
            $('.alterar').click(function() {
                // Recupere a linha da tabela que contém o botão Alterar pressionado
                var linha = $(this).closest('tr');
                
                // Recupere os dados da linha da tabela
                var cod_periodo = linha.find('td:eq(0)').text();
                var descricao = linha.find('td:eq(1)').text();
                var horaEntrada = linha.find('td:eq(2)').text();
                var horaSaida = linha.find('td:eq(3)').text();
                
                
                
                // Envie os dados para a janela modal
                $('#cod_periodo').val(cod_periodo);
                $('#descricao').val(descricao);
                $('#horaEntrada').val(horaEntrada);
                $('#horaSaida').val(horaSaida);
                
                // Abra a janela modal
                $('#AlterarPeriodo').modal('show');
            });
        });
    </script>
    

</div>
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
                    <img src="../img/foto.jpg" alt="Perfil do Gabriel Santos" class="mt-2" width="80" height="80" style="border-radius: 50%;">
                  </a>
                  <p class="text-center mt-2" style="text-decoration: none; color: black;">Gabriel Santos</p>
                </li>
                <li style="margin-right: 16px;">
                  <a href="https://github.com/Gabits13" target="_blank" class="link-body">
                    <img src="../img/fotoBielOliveira.jpg" alt="Perfil do Gabriel Santos" class="mt-2" width="80" height="80" style="border-radius: 50%;">
                  </a>
                  <p class="text-center mt-2" style="text-decoration: none; color: black;">Gabriel Oliveira</p>
                </li>
                <li style="margin-right: 16px;">
                  <a href="https://github.com/Gabits13" target="_blank" class="link-body">
                    <img src="../img/fotoGui.jpg" alt="Perfil do Gabriel Santos" class="mt-2" width="80" height="80" style="border-radius: 50%;">
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
