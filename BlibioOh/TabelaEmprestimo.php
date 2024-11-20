<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela Emprestimo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php
    include_once '../BlibioOh/php/EmprestaLivro.php';
    $e = new EmprestaLivro();
    $emprestaLivro_bd = $e->listar();
    ?>

    <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnenviar)) {
            include_once '../BlibioOh/php/EmprestaLivro.php';
            $e = new EmprestaLivro();
            $e->setIdUsuario($id_usuario);
            $e->setCodLivro($cod_livro);
            $e->setDataEmissao($emissao);
            $e->setDataDevolucao($devolucao);
            $e->salvar();

            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }
    ?>

    <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnexcluir)) {
            include_once '../BlibioOh/php/EmprestaLivro.php';
            $e = new EmprestaLivro();
            $e->setIdUsuario($id_usuario);
            $e->setCodLivro($cod_livro);
            $e->excluir();

            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }
    ?>
    <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#CadastroEmprestimo">Add</button>
    <form method="post">
        <input type="text" name="devolucao_pesquisar" placeholder="Data de devolução">
        <input type="submit" name="btnpesquisar" value="Pesquisar">
        <?php
            extract($_POST, EXTR_OVERWRITE);
            if (isset($btnpesquisar)) {
                include_once '../BlibioOh/php/EmprestaLivro.php';
                $e = new EmprestaLivro();
                $e->setDataDevolucao($devolucao_pesquisar.'%');
                $emprestaLivro_bd = $e->consultar();
            }
        ?>
        <table>
            <thead>
                <tr>
                    <th>ID do Usuario</th>
                    <th>Código do Livro</th>
                    <th>Emissão</th>
                    <th>Devolução</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <?php
                foreach($emprestaLivro_bd as $empresta_mostrar)
                {
                    ?>
                    <tbody>
                        <form method="post">
                            <tr>
                                <input type="hidden" name="id_usuario" value="<?php echo $empresta_mostrar[0]?>">
                                <input type="hidden" name="cod_livro" value="<?php echo $empresta_mostrar[1]?>">
                                <td><?php echo $empresta_mostrar[0]?></td>
                                <td><?php echo $empresta_mostrar[1]?></td>
                                <td><?php echo $empresta_mostrar[2]?></td>
                                <td><?php echo $empresta_mostrar[3]?></td>
                                <td><input type="submit" value="Del" name="btnexcluir" id="<?php echo $empresta_mostrar[0]?>" class="excluir"> <button type="button" class="alterar" data-bs-toggle="modal" data-bs-target="#AlterarEmprestimo">Alt</button></td>
                            </tr>
                        </form>
                    </tbody>
                    <?php
                }
            ?>
        </table>
    </form>

    <!-- Modal alterar -->
    <div class="modal fade" id="AlterarEmprestimo" tabindex="-1" aria-labelledby="AlterarEmprestimoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="AlterarEmprestimoLabel">Alterar</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3" id="alt-emprestimo-form" method="post">
                <div class="col-12">
                    <label for="id_usuario" class="form-label">ID do Usuario</label>
                    <input type="text" name="id_usuario" class="form-control text-secondary" id="id_usuario" readonly>
                </div>
                <div class="col-12">
                    <label for="cod_livro" class="form-label">Código do Livro</label>
                    <input type="text" name="cod_livro" class="form-control text-secondary" id="cod_livro" readonly>
                </div>
                <div class="col-12">
                    <label for="emissao" class="form-label">Emissão</label>
                    <input type="date" name="emissao" class="form-control" id="emissao" placeholder="Descrição do cargo" required>
                </div>
                <div class="col-12">
                    <label for="devolucao" class="form-label">Devolução</label>
                    <input type="date" name="devolucao" class="form-control" id="devolucao" placeholder="Nome do cargo" required>
                </div>

                <div class="col-12">
                    <input type="submit" name="btnalterar" class="btn btn-outline-success btn-sm" id="cad-cargo-btn" value="Alterar"/>
                </div>
            </form>

            <?php
                extract($_POST, EXTR_OVERWRITE);
                if (isset($btnalterar)) {
                    include_once '../BlibioOh/php/EmprestaLivro.php';
                    $e = new EmprestaLivro();
                    $e->setIdUsuario($id_usuario);
                    $e->setCodLivro($cod_livro);
                    $e->setDataEmissao($emissao);
                    $e->setDataDevolucao($devolucao);
                    $e->alterar2();

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
    <div class="modal fade" id="CadastroEmprestimo" tabindex="-1" aria-labelledby="CadastroEmprestimoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="CadastroEmprestimoLabel">Cadastrar</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3" id="cad-usuario-form" method="post">
                <div class="col-12">
                    <label for="id_usuario" class="form-label">ID do Usuario</label>
                    <input type="text" name="id_usuario" class="form-control text-secondary" id="id_usuario" required>
                </div>
                <div class="col-12">
                    <label for="cod_livro" class="form-label">Código do Livro</label>
                    <input type="text" name="cod_livro" class="form-control text-secondary" id="cod_livro" required>
                </div>
                <div class="col-12">
                    <label for="emissao" class="form-label">Emissão</label>
                    <input type="date" name="emissao" class="form-control" id="emissao" placeholder="Descrição do cargo" required>
                </div>
                <div class="col-12">
                    <label for="devolucao" class="form-label">Devolução</label>
                    <input type="date" name="devolucao" class="form-control" id="devolucao" placeholder="Nome do cargo" required>
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
                var id_usuario = linha.find('td:eq(0)').text();
                var cod_livro = linha.find('td:eq(1)').text();
                var emissao = linha.find('td:eq(2)').text();
                var devolucao = linha.find('td:eq(3)').text();
                
                
                
                // Envie os dados para a janela modal
                $('#id_usuario').val(id_usuario);
                $('#cod_livro').val(cod_livro);
                $('#emissao').val(emissao);
                $('#devolucao').val(devolucao);
                
                // Abra a janela modal
                $('#AlterarEmprestimo').modal('show');
            });
        });
    </script>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>