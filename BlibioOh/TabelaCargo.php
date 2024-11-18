<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela Cargo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php
    include_once '../BiblioohPw/php/Cargo.php';
    $c = new Cargo();
    $cargo_bd = $c->listar();
    ?>

    <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnenviar)) {
            include_once '../BiblioohPw/php/Cargo.php';
            $c = new Cargo();
            $c->setDescricao($descricao);
            $c->setNomeCargo($nome);
            $c->setSalario($salario);
            $c->salvar();

            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
            //Por favor não coloque essa parte do código em outro lugar se não ele quebra
        }
    ?>

    <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnexcluir)) {
            include_once '../BiblioohPw/php/Cargo.php';
            $c = new Cargo();
            $c->setCodCargo($cod_cargo);
            $c->excluir();

            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
            //Por favor não coloque essa parte do código em outro lugar se não ele quebra
        }
    ?>
    
    <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#CadastroCargo">Add</button>
        <table id="example">
            <thead>
                <tr>
                    <th>Codigo do Cargo</th>
                    <th>Descrição</th>
                    <th>Nome do Cargo</th>
                    <th>Salario</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <?php
                foreach ($cargo_bd as $cargo_mostrar)
                {
                    ?>
                    <tbody>
                        <form method="post">
                            <tr>
                                <input type="hidden" name="cod_cargo" value="<?php echo $cargo_mostrar[0]; ?>">
                                <td <?php echo "name = '" . $cargo_mostrar[0] . "'"?>><?php echo $cargo_mostrar[0]?></td>
                                <td><?php echo $cargo_mostrar[1]?></td>
                                <td><?php echo $cargo_mostrar[2]?></td>
                                <td><?php echo $cargo_mostrar[3]?></td>
                                <td><input type="submit" value="Del" name="btnexcluir" id="<?php echo $cargo_mostrar[0]?>" class="excluir"> <button type="button" class="alterar" data-bs-toggle="modal" data-bs-target="#AlterarCargo">Alt</button></td>
                            </tr>
                        </form>
                    </tbody>
                    <?php
                }
            ?>
        </table>

    <!-- Modal alterar -->
    <div class="modal fade" id="AlterarCargo" tabindex="-1" aria-labelledby="AlterarCargoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="AlterarCargoLabel">Alterar</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3" id="alt-cargo-form" method="post">
                <div class="col-12">
                    <label for="cod_cargo" class="form-label">Código do Cargo</label>
                    <input type="text" name="cod_cargo" class="form-control text-secondary" id="cod_cargo" placeholder="Descrição do cargo" readonly>
                </div>
                <div class="col-12">
                    <label for="descricao" class="form-label">Descrição</label>
                    <input type="text" name="descricao" class="form-control" id="descricao" placeholder="Descrição do cargo" required>
                </div>
                <div class="col-12">
                    <label for="nome" class="form-label">Nome do Cargo</label>
                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome do cargo" required>
                </div>
                <div class="col-12">
                    <label for="salario" class="form-label">Salário</label>
                    <input type="text" name="salario" class="form-control" id="salario" placeholder="Salário" required>
                </div>

                <div class="col-12">
                    <input type="submit" name="btnalterar" class="btn btn-outline-success btn-sm" id="cad-cargo-btn" value="Alterar"/>
                </div>
            </form>

            <?php
                extract($_POST, EXTR_OVERWRITE);
                if (isset($btnalterar)) {
                    include_once '../BiblioohPw/php/Cargo.php';
                    $c = new Cargo();
                    $c->setDescricao($descricao);
                    $c->setNomeCargo($nome);
                    $c->setSalario($salario);
                    $c->setCodCargo($cod_cargo);
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
            <form class="row g-3" id="cad-cargo-form" method="post">
                <div class="col-12">
                    <label for="descricao" class="form-label">Descrição</label>
                    <input type="text" name="descricao" class="form-control" id="descricao" placeholder="Descrição do cargo" required>
                </div>
                <div class="col-12">
                    <label for="nome" class="form-label">Nome do Cargo</label>
                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome do cargo" required>
                </div>
                <div class="col-12">
                    <label for="salario" class="form-label">Salário</label>
                    <input type="text" name="salario" class="form-control" id="salario" placeholder="Salário" required>
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
                var cod_cargo = linha.find('td:eq(0)').text();
                var descricao = linha.find('td:eq(1)').text();
                var nome = linha.find('td:eq(2)').text();
                var salario = linha.find('td:eq(3)').text();
                console.log(descricao, nome, salario);
                
                
                
                // Envie os dados para a janela modal
                $('#cod_cargo').val(cod_cargo);
                $('#descricao').val(descricao);
                $('#nome').val(nome);
                $('#salario').val(salario);
                
                // Abra a janela modal
                $('#AlterarCargo').modal('show');
            });
        });
    </script>
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>