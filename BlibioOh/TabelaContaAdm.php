<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela Conta ADM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php
        include_once '../BlibioOh/php/ContaAdm.php';
        $c = new ContaAdm();
        $contaAdm_bd = $c->listar();
    ?>

    <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnenviar)) {
            include_once '../BlibioOh/php/ContaAdm.php';
            $c = new ContaAdm();
            $c->setIdFuncionario($id_funcionario);
            $c->setSenha($senha);
            $c->salvar();

            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }
    ?>

    <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnexcluir)) {
            include_once '../BlibioOh/php/ContaAdm.php';
            $c = new ContaAdm();
            $c->setIdFuncionario($id_funcionario);
            $c->excluir();

            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }
    ?>

    <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#CadastroCargo">Add</button>
    <form method="post">
        <input type="text" name="id_funcionario_pesquisar" placeholder="ID do Funcionario">
        <input type="submit" name="btnpesquisar" value="Pesquisar">
        <?php
            extract($_POST, EXTR_OVERWRITE);
            if (isset($btnpesquisar)) {
                include_once '../BlibioOh/php/ContaAdm.php';
                $c = new ContaAdm();
                $c->setIdFuncionario($id_funcionario_pesquisar.'%');
                $contaAdm_bd = $c->consultar();
            }
        ?>
        <table>
            <thead>
                <tr>
                    <th>ID do Funcionario</th>
                    <th>Senha</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <?php
                foreach ($contaAdm_bd as $contaAdm_mostrar)
                {
                    ?>
                    <tbody>
                        <form method="post">
                            <tr>
                                <input type="hidden" name="id_funcionario" value="<?php echo $contaAdm_mostrar[0]?>">
                                <td><?php echo $contaAdm_mostrar[0]?></td>
                                <td><?php echo $contaAdm_mostrar[1]?></td>
                                <td><input type="submit" value="Del" name="btnexcluir" id="<?php echo $cargo_mostrar[0]?>" class="excluir"> <button type="button" class="alterar" data-bs-toggle="modal" data-bs-target="#AlterarCargo">Alt</button></td>
                            </tr>
                        </form>
                    </tbody>
                    <?php
                }
            ?>
        </table>
    </form>

    <!-- Modal alterar -->
    <div class="modal fade" id="AlterarCargo" tabindex="-1" aria-labelledby="AlterarCargoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="AlterarCargoLabel">Alterar</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3" id="alt-contaAdm-form" method="post">
                <div class="col-12">
                    <label for="id_funcionario" class="form-label">ID do Funcionario</label>
                    <input type="text" name="id_funcionario" class="form-control text-secondary" id="id_funcionario" readonly>
                </div>
                <div class="col-12">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="text" name="senha" class="form-control" id="senha" placeholder="Descrição do cargo" required>
                </div>

                <div class="col-12">
                    <input type="submit" name="btnalterar" class="btn btn-outline-success btn-sm" id="cad-cargo-btn" value="Alterar"/>
                </div>
            </form>

            <?php
                extract($_POST, EXTR_OVERWRITE);
                if (isset($btnalterar)) {
                    include_once '../BlibioOh/php/ContaAdm.php';
                    $c = new ContaAdm();
                    $c->setIdFuncionario($id_funcionario);
                    $c->setSenha($senha);
                    $c->alterar2();

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
    <div class="modal fade" id="CadastroCargo" tabindex="-1" aria-labelledby="CadastroCargoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="CadastroCargoLabel">Cadastrar</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3" id="cad-contaAdm-form" method="post">
                <div class="col-12">
                    <label for="id_funcionario" class="form-label">ID do Funcionario</label>
                    <input type="text" name="id_funcionario" class="form-control text-secondary" id="id_funcionario" required>
                </div>
                <div class="col-12">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="text" name="senha" class="form-control" id="senha" placeholder="Senha" required>
                </div>

                <div class="col-12">
                    <input type="submit" name="btnenviar" class="btn btn-outline-success btn-sm" id="cad-cargo-btn" value="Cadastrar"/>
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
                var id_funcionario = linha.find('td:eq(0)').text();
                var senha = linha.find('td:eq(1)').text();
                
                
                
                // Envie os dados para a janela modal
                $('#id_funcionario').val(id_funcionario);
                $('#senha').val(senha);
                
                // Abra a janela modal
                $('#AlterarCargo').modal('show');
            });
        });
    </script>
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>