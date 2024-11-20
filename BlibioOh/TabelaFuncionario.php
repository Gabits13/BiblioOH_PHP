<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela Funcionario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php
    include_once 'php/Funcionario.php';
    $f = new Funcionario();
    $func_bd = $f->listar();
    ?>

    <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnenviar)) {
            include_once '../BliblioohPw/php/Funcionario.php';
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

            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
            //Por favor não coloque essa parte do código em outro lugar se não ele quebra
        }
    ?>

    <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnexcluir)) {
            include_once '../BliblioohPw/php/Funcionario.php';
            $f = new Funcionario();
            $f->setIdFuncionario($id_funcionario);
            $f->excluir();

            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
            //Por favor não coloque essa parte do código em outro lugar se não ele quebra
        }
    ?>
    
    <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#CadastroFunc">Add</button>
    <form method="post">
        <input type="text" name="nome" placeholder="Gênero">
        <input type="submit" name="btnpesquisar" value="Pesquisar">
            <?php
                extract($_POST, EXTR_OVERWRITE);
                if (isset($btnpesquisar)) {
                    include_once '../BlibioOh/php/Funcionario.php';
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
                                <td><input type="submit" value="Del" name="btnexcluir" id="<?php echo $func_mostrar[0]?>" class="excluir"> <button type="button" class="alterar" data-bs-toggle="modal" data-bs-target="#AlterarCargo">Alt</button></td>
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
                    <input type="text" name="rg" class="form-control" id="rg" placeholder="RG do funcionário" required>
                </div>
                <div class="col-12">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" name="cpf" class="form-control" id="cpf" placeholder="CPF do funcionário" required>
                </div>
                <div class="col-12">
                    <label for="dataNascimento" class="form-label">Data de nascimento</label>
                    <input type="text" name="dataNascimento" class="form-control" id="dataNascimento" placeholder="Data de nascimento do funcionário" required>
                </div>
                <div class="col-12">
                    <label for="dataAdmissao" class="form-label">Data de admissão</label>
                    <input type="text" name="dataAdmissao" class="form-control" id="dataAdmissao" placeholder="Data de admissão do funcionário" required>
                </div>
                <div class="col-12">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" name="endereco" class="form-control" id="endereco" placeholder="Endereço do funcionário" required>
                </div>
                <div class="col-12">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" name="telefone" class="form-control" id="telefone" placeholder="Telefone do funcionário" required>
                </div>
                <div class="col-12">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="E-mail do funcionário" required>
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
                    include_once 'php/Funcionario.php';
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
                    <input type="text" name="rg" class="form-control" id="rg" placeholder="RG do funcionário" required>
                </div>
                <div class="col-12">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" name="cpf" class="form-control" id="cpf" placeholder="CPF do funcionário" required>
                </div>
                <div class="col-12">
                    <label for="dataNascimento" class="form-label">Data de nascimento</label>
                    <input type="text" name="dataNascimento" class="form-control" id="dataNascimento" placeholder="Data de nascimento do funcionário" required>
                </div>
                <div class="col-12">
                    <label for="dataAdmissao" class="form-label">Data de admissão</label>
                    <input type="text" name="dataAdmissao" class="form-control" id="dataAdmissao" placeholder="Data de admissão do funcionário" required>
                </div>
                <div class="col-12">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" name="endereco" class="form-control" id="endereco" placeholder="Endereço do funcionário" required>
                </div>
                <div class="col-12">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" name="telefone" class="form-control" id="telefone" placeholder="Telefone do funcionário" required>
                </div>
                <div class="col-12">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="E-mail do funcionário" required>
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
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>