<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela Administra Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
        include_once '../BlibioOh/php/AdministraLivro.php';
        $a = new AdministraLivro();
        $administra_bd = $a->listar();
    ?>

    <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnenviar)) {
            include_once '../BlibioOh/php/AdministraLivro.php';
            $a = new AdministraLivro();
            $a->setCodLivro($cod_livro);
            $a->setIdFuncionario($id_funcionario);
            $a->salvar();

            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }
    ?>

    <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnexcluir)) {
            include_once '../BlibioOh/php/AdministraLivro.php';
            $a = new AdministraLivro();
            $a->setCodLivro($cod_livro);
            $a->setIdFuncionario($id_funcionario);
            $a->excluir();

            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }
    ?>

    <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#CadastroCargo">Add</button>
    <form method="post">
        <input type="text" name="cod_livro_pesquisar" placeholder="Código do Livro">
        <input type="submit" name="btnpesquisar" value="Pesquisar">
        <?php
            extract($_POST, EXTR_OVERWRITE);
            if (isset($btnpesquisar)) {
                include_once '../BlibioOh/php/AdministraLivro.php';
                $a = new AdministraLivro();
                $a->setCodLivro($cod_livro_pesquisar.'%');
                $administra_bd = $a->consultar();
            } 
        ?>
        <table>
            <thead>
                <tr>
                    <th>ID Funcionario</th>
                    <th>Código do Livro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <?php
                foreach ($administra_bd as $administra_mostrar)
                {
                    ?>
                    <tbody>
                        <form method="post">
                            <tr>
                                <input type="hidden" name="id_funcionario" value="<?php echo $administra_mostrar[0]?>">
                                <input type="hidden" name="cod_livro" value="<?php echo $administra_mostrar[1]?>">
                                <td><?php echo $administra_mostrar[0]?></td>
                                <td><?php echo $administra_mostrar[1]?></td>
                                <td><input type="submit" value="Del" name="btnexcluir" id="<?php echo $administra_mostrar[0]?>" class="excluir"></td>
                            </tr>
                        </form>
                    </tbody>
                    <?php
                }
            ?>
        </table>
    </form>

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
                    <label for="id_funcionario" class="form-label">ID Funcionario</label>
                    <input type="text" name="id_funcionario" class="form-control" id="id_funcionario" placeholder="ID do funcionario" required>
                </div>
                <div class="col-12">
                    <label for="cod_livro" class="form-label">Código do Livro</label>
                    <input type="text" name="cod_livro" class="form-control" id="cod_livro" placeholder="Código do livro" required>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>