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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.8/inputmask.min.js"></script>
      <?php session_start();?>
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
           <!--<button id="themeSwitcher2" class="btn-per btn btn-outline-dark custom-btn mx-1" onclick="toggleTheme2()">
          <i id="themeIcon2" class="bi bi-sun"></i>
        </button>-->
        </div>
    </div>
</div>
</header>
    

    <!-- Menu Lateral -->
   <div class="sidebar mb-0">
   <div class="text-center mb-3" style="text-decoration: none; cursor:pointer;">
       <a style="text-decoration: none;" href="../meu_perfil_admin.php "> 
          <img src="../img/perfil.jpg" alt="Perfil" width="100" height="100" class="mb-2 rounded-circle">
          <h5 style=" font-weight: bold; color: rgb(255, 118, 0);"><?php echo $_SESSION['Nome_Func']?></h5>
          <span style="color: #dadada; font-size: 11pt;"><?php echo $_SESSION['Email_Func']?></span>
      </a>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="../menu_Admin.php" class="nav-link"><i class="bi bi-house-door-fill"></i> Início</a>
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
            <a href="../LoginUser.php" class="nav-link"><i class="bi bi-box-arrow-right"></i> Sair</a>
        </li>
    </ul>
</div>

    <!-- Conteúdo Principal -->
    <div class="content mt-4">
        <h1 class="mt-5">Funcionários</h1>
    </div>
    <div class="content-fluid mt-3 mb-3  fade-in-section">
        <div class="content mt-4 mb-5">
      
        <?php
      include_once '../php_classes/Funcionario.php';
    $f = new Funcionario();
    $func_bd = $f->listar();
    ?>

    <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnenviar)) {
            include_once '../php_classes/Funcionario.php';
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
            $f->salvar();

            echo '<script>window.location.href = "' . $_SERVER['PHP_SELF'] . '";</script>';
            //header('Location: ' . $_SERVER['PHP_SELF']);
            //exit;
            //Por favor não coloque essa parte do código em outro lugar se não ele quebra
        }
    ?>

    <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnexcluir)) {
            include_once '../php_classes/Funcionario.php';
            $f = new Funcionario();
            $f->setIdFuncionario($id_funcionario);
            $f->excluir();


            echo '<script>window.location.href = "' . $_SERVER['PHP_SELF'] . '";</script>';
            //header('Location: ' . $_SERVER['PHP_SELF']);
            //exit;
            //Por favor não coloque essa parte do código em outro lugar se não ele quebra
        }
    ?>
    
    <button type="button" class="btn btn-outline-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#CadastroFunc">Novo Registro</button>
    <form method="post">
        <input type="text" name="nome" placeholder="Nome do Funcionário">
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
/* Estilo geral para a tabela */
table th, table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
    word-wrap: break-word;  /* Quebra as palavras para não ultrapassarem a célula */
    overflow: hidden; /* Garante que o texto excessivo não ultrapasse */
}

table th {
    background-color: #f2f2f2;
    color: black;
}

table td {
    max-width: 100px; /* Define uma largura máxima para as células */
    text-overflow: ellipsis; /* Adiciona '...' quando o texto é muito grande */
    overflow: hidden; /* Garante que o texto não ultrapasse o limite da célula */
}

/* Estilo específico para ID do Funcionário (1ª coluna) */
table td:nth-child(1) {
    max-width: 100px; /* Ajuste de largura para a coluna ID */
    text-align: center; /* Alinha o texto ao centro */
}

table td:nth-child(5) {
    max-width: 60px; /* Ajuste de largura para a coluna datanasc */
    text-align: center; /* Alinha o texto ao centro */
}

table td:nth-child(9) {
    max-width: 70px; /* Ajuste de largura para a coluna Código do Período */
    text-align: center; /* Alinha o texto ao centro */
}

table td:nth-child(10) {
    max-width: 70px; /* Ajuste de largura para a coluna Código do cargo */
    text-align: center; /* Alinha o texto ao centro */
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
                    include_once '../php_classes/Funcionario.php';
                    $f = new Funcionario();
                    $f->setNome($nome.'%');
                    $func_bd = $f->consultar();
                } 
            ?>
        <table id="example">
            <thead>
                <tr>
                    <th>ID do funcionário</th>
                    <th>Nome</th>
                    <th>RG</th>
                    <th>CPF</th>
                    <th>Data de nascimento</th>
                    <th>Data de admissão</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Codigo do Periodo</th>
                    <th>Codigo do cargo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <?php
                foreach ($func_bd as $func_mostrar)
                {
                    ?>
                    <tbody>
                        <form method="post">
                            <tr>
                                <input type="hidden" name="id_funcionario" value="<?php echo $func_mostrar[0]; ?>">
                                <td <?php echo "name = '" . $func_mostrar[0] . "'"?>><?php echo $func_mostrar[0]?></td>
                                <td><?php echo $func_mostrar[1]?></td>
                                <td><?php echo $func_mostrar[2]?></td>
                                <td><?php echo $func_mostrar[3]?></td>
                                <td><?php echo $func_mostrar[4]?></td>
                                <td><?php echo $func_mostrar[5]?></td>
                                <td><?php echo $func_mostrar[6]?></td>
                                <td><?php echo $func_mostrar[7]?></td>
                                <td><?php echo $func_mostrar[8]?></td>
                                <td><?php echo $func_mostrar[9]?></td>
                                <td><?php echo $func_mostrar[10]?></td>
                                <td>
                                <button type="submit" name="btnexcluir" id="<?php echo $usuario_mostrar[0] ?>" class="btn btn-outline-danger btn-sm excluir mb-1 ml-2">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <button type="button" class="btn btn-outline-primary btn-sm alterar mb-1" data-bs-toggle="modal" data-bs-target="#AlterarFunc">
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
    <div class="modal fade" id="AlterarFunc" tabindex="-1" aria-labelledby="AlterarFuncLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="AlterarFuncLabel">Alterar</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3" id="alt-func-form" method="post">
                <div class="col-12">
                    <label for="id_funcionario" class="form-label">ID do funcionário</label>
                    <input type="text" name="id_funcionario" class="form-control text-secondary" id="id_funcionario" readonly>
                </div>
                <div class="col-12">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome do funcionário" required>
                </div>
                <div class="col-12">
                    <label for="rg" class="form-label">RG</label>
                    <input type="text" name="rg" class="form-control" id="rg" placeholder="RG do funcionário" maxlength="12" OnKeyPress="formatar('##.###.###-##',this)" required>
                </div>
                <div class="col-12">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" name="cpf" class="form-control" id="cpf" placeholder="CPF do funcionário" maxlength="14" OnKeyPress="formatar('###.###.###-##',this)" required>
                </div>
                <div class="col-12">
                    <label for="dataNascimento" class="form-label">Data de nascimento</label>
                    <input type="date" name="dataNascimento" class="form-control" id="dataNascimento" placeholder="Data de nascimento do funcionário" required>
                </div>
                <div class="col-12">
                    <label for="dataAdmissao" class="form-label">Data de admissão</label>
                    <input type="date" name="dataAdmissao" class="form-control" id="dataAdmissao" placeholder="Data de admissão do funcionário" required>
                </div>
                <div class="col-12">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" name="endereco" class="form-control" id="endereco" placeholder="Endereço do funcionário" required>
                </div>
                <div class="col-12">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="tel" name="telefone" class="form-control" id="telefone" placeholder="Telefone do funcionário" maxlength="15" OnKeyPress="formatar('(##) #####-####',this)" required>
                </div>
                <div class="col-12">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="E-mail do funcionário" required>
                </div>
                <div class="col-12">
                    <label for="codPeriodo" class="form-label">Código do periodo</label>
                    <input type="text" name="codPeriodo" class="form-control" id="codPeriodo" placeholder="Código do periodo" required>
                </div>
                <div class="col-12">
                    <label for="codCargo" class="form-label">Código do cargo</label>
                    <input type="text" name="codCargo" class="form-control" id="codCargo" placeholder="Código do cargo" required>
                </div>

                <div class="col-12">
                    <input type="submit" name="btnalterar" class="btn btn-outline-success btn-sm" id="cad-func-btn" value="Alterar"/>
                </div>
            </form>

            <?php
                extract($_POST, EXTR_OVERWRITE);
                if (isset($btnalterar)) {
                    include_once '../php_classes/Funcionario.php';
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
                    $f->setIdFuncionario($id_funcionario);
                    $f->alterar2();

                    echo '<script>window.location.href = "' . $_SERVER['PHP_SELF'] . '";</script>';
                    //Por favor não coloque essa parte do código em outro lugar se não ele quebra
                } 
            ?>
        </div>
        </div>
    </div>
    </div>
    <!-- Fim Modal alterar -->

<script> 
  function formatar(mascara, documento) {
    let i = documento.value.length;
    let saida = '#';
    let texto = mascara.substring(i);
    while (texto.substring(0, 1) != saida && texto.length ) {
      documento.value += texto.substring(0, 1);
      i++;
      texto = mascara.substring(i);
    }
  }
</script>

    <!-- Modal cadastrar -->
    <div class="modal fade" id="CadastroFunc" tabindex="-1" aria-labelledby="CadastroFuncLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="CadastroFuncLabel">Cadastrar</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3" id="cad-func-form" method="post">
            <div class="col-12">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome do funcionário" required>
                </div>
                <div class="col-12">
                    <label for="rg" class="form-label">RG</label>
                    <input type="text" name="rg" class="form-control" id="rg" placeholder="RG do funcionário" maxlength="12" OnKeyPress="formatar('##.###.###-##',this)" required>
                </div>
                <div class="col-12">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" name="cpf" class="form-control" id="cpf" placeholder="CPF do funcionário" maxlength="14" OnKeyPress="formatar('###.###.###-##',this)" required>
                </div>
                <div class="col-12">
                    <label for="dataNascimento" class="form-label">Data de nascimento</label>
                    <input type="date" name="dataNascimento" class="form-control" id="dataNascimento" placeholder="Data de nascimento do funcionário" required>
                </div>
                <div class="col-12">
                    <label for="dataAdmissao" class="form-label">Data de admissão</label>
                    <input type="date" name="dataAdmissao" class="form-control" id="dataAdmissao" placeholder="Data de admissão do funcionário" required>
                </div>
                <div class="col-12">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" name="endereco" class="form-control" id="endereco" placeholder="Endereço do funcionário" required>
                </div>
                <div class="col-12">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="tel" name="telefone" class="form-control" id="telefone" placeholder="Telefone do funcionário" maxlength="15" OnKeyPress="formatar('(##) #####-####',this)" required>
                </div>
                <div class="col-12">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="E-mail do funcionário" required>
                </div>
                <div class="col-12">
                    <label for="codPeriodo" class="form-label">Código do periodo</label>
                    <input type="text" name="codPeriodo" class="form-control" id="codPeriodo" placeholder="Código fo periodo" required>
                </div>
                <div class="col-12">
                    <label for="codCargo" class="form-label">Código do cargo</label>
                    <input type="text" name="codCargo" class="form-control" id="codCargo" placeholder="Código do cargo" required>
                </div>

                <div class="col-12">
                    <input type="submit" name="btnenviar" class="btn btn-outline-success btn-sm" id="cad-funcionario-btn" value="Cadastrar"/>
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
                var id_func = linha.find('td:eq(0)').text();
                var nome = linha.find('td:eq(1)').text();
                var rg = linha.find('td:eq(2)').text();
                var cpf = linha.find('td:eq(3)').text();
                var dataNascimento = linha.find('td:eq(4)').text();
                var dataAdmissao = linha.find('td:eq(5)').text();
                var endereco = linha.find('td:eq(6)').text();
                var telefone = linha.find('td:eq(7)').text();
                var email = linha.find('td:eq(8)').text();
                var codPeriodo = linha.find('td:eq(9)').text();
                var codCargo = linha.find('td:eq(10)').text();
                
                
                
                // Envie os dados para a janela modal
                $('#id_funcionario').val(id_func);
                $('#nome').val(nome);
                $('#rg').val(rg);
                $('#cpf').val(cpf);
                $('#dataNascimento').val(dataNascimento);
                $('#dataAdmissao').val(dataAdmissao);
                $('#endereco').val(endereco);
                $('#telefone').val(telefone);
                $('#email').val(email);
                $('#codPeriodo').val(codPeriodo);
                $('#codCargo').val(codCargo);
                
                // Abra a janela modal
                $('#AlterarFunc').modal('show');
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
