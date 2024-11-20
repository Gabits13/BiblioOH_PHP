<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela Setor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php
    include_once 'php/Setor.php';
    $s = new Setor();
    $setor_bd = $s->listar();
    ?>

    <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnenviar)) {
            include_once '../BliblioohPw/php/Setor.php';
            $s = new Setor();
            $s->setCodSetor($cod_setor);
            $s->setAndar($andar);
            $s->setGenero($genero);
            $s->salvar();

            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
            //Por favor não coloque essa parte do código em outro lugar se não ele quebra
        }
    ?>

    <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnexcluir)) {
            include_once '../BliblioohPw/php/Setor.php';
            $s = new Setor();
            $s->setCodSetor($cod_setor);
            $s->excluir();

            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
            //Por favor não coloque essa parte do código em outro lugar se não ele quebra
        }
    ?>
    
    <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#CadastroSetor">Add</button>
    <form method="post">
        <input type="text" name="nome" placeholder="Gênero">
        <input type="submit" name="btnpesquisar" value="Pesquisar">
            <?php
                extract($_POST, EXTR_OVERWRITE);
                if (isset($btnpesquisar)) {
                    include_once '../BlibioOh/php/Setor.php';
                    $s = new Setor();
                    $s->setGenero($nome.'%');
                    $setor_bd = $s->consultar();
                } 
            ?>
            <table id="example">
                <thead>
                    <tr>
                        <th>Código do Setor</th>
                        <th>Andar</th>
                        <th>Gênero</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <?php
                    foreach ($setor_bd as $setor_mostrar)
                    {
                        ?>
                        <tbody>
                            <form method="post">
                                <tr>
                                    <input type="hidden" name="cod_setor" value="<?php echo $setor_mostrar[0]; ?>">
                                    <td <?php echo "name = '" . $setor_mostrar[0] . "'"?>><?php echo $setor_mostrar[0]?></td>
                                    <td><?php echo $setor_mostrar[1]?></td>
                                    <td><?php echo $setor_mostrar[2]?></td>
                                    <td><input type="submit" value="Del" name="btnexcluir" id="<?php echo $setor_mostrar[0]?>" class="excluir"> <button type="button" class="alterar" data-bs-toggle="modal" data-bs-target="#AlterarSetor">Alt</button></td>
                                </tr>
                            </form>
                        </tbody>
                        <?php
                    }
                ?>
            </table>
        </form>

    <!-- Modal alterar -->
    <div class="modal fade" id="AlterarSetor" tabindex="-1" aria-labelledby="AlterarSetorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="AlterarSetorLabel">Alterar</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3" id="alt-setor-form" method="post">
                <div class="col-12">
                    <label for="cod_setor" class="form-label">Código do Setor</label>
                    <input type="text" name="cod_setor" class="form-control text-secondary" id="cod_setor" readonly>
                </div>
                <div class="col-12">
                    <label for="andar" class="form-label">Andar</label>
                    <input type="text" name="andar" class="form-control" id="andar" placeholder="Andar do setor" required>
                </div>
                <div class="col-12">
                    <label for="genero" class="form-label">Gênero</label>
                    <input type="text" name="genero" class="form-control" id="genero" placeholder="Gênero literario do setor" required>
                </div>
                
                <div class="col-12">
                    <input type="submit" name="btnalterar" class="btn btn-outline-success btn-sm" id="cad-setor-btn" value="Alterar"/>
                </div>
            </form>

            <?php
                extract($_POST, EXTR_OVERWRITE);
                if (isset($btnalterar)) {
                    include_once 'php/Setor.php';
                    $p = new Setor();
                    $p->setAndar($andar);
                    $p->setGenero($genero);
                    $p->setCodSetor($cod_setor);
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
    <div class="modal fade" id="CadastroSetor" tabindex="-1" aria-labelledby="CadastroSetorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="CadastroSetorLabel">Cadastrar</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3" id="cad-setor-form" method="post">
            <div class="col-12">
                    <label for="andar" class="form-label">Andar</label>
                    <input type="text" name="andar" class="form-control" id="andar" placeholder="Andar do setor" required>
                </div>
                <div class="col-12">
                    <label for="genero" class="form-label">Gênero</label>
                    <input type="text" name="genero" class="form-control" id="genero" placeholder="Gênero literario do setor" required>
                </div>

                <div class="col-12">
                    <input type="submit" name="btnenviar" class="btn btn-outline-success btn-sm" id="cad-setor-btn" value="Cadastrar"/>
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
                var cod_setor = linha.find('td:eq(0)').text();
                var andar = linha.find('td:eq(1)').text();
                var genero = linha.find('td:eq(2)').text();
                
                
                
                // Envie os dados para a janela modal
                $('#cod_setor').val(cod_setor);
                $('#andar').val(andar);
                $('#genero').val(genero);
                                
                // Abra a janela modal
                $('#AlterarSetor').modal('show');
            });
        });
    </script>
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>