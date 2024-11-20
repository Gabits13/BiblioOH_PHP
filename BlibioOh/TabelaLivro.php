<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php
    include_once 'php/Livro.php';
    $l = new Livro();
    $livro_bd = $l->listar();
    ?>

    <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnenviar)) {
            include_once '../BliblioohPw/php/Livro.php';
            $l = new Livro();
            $l->setTitulo($titulo);
            $l->setNomeAutor($nomeAutor);
            $l->setDataLancamento($dataLancamento);
            $l->setGenero($genero);
            $l->setQtdePaginas($qtdePaginas);
            $l->setExemplares($exemplares);
            $l->setEditora($editora);
            $l->setIsbn($isbn);
            $l->setCodSetor($codSetor);
            $l->salvar();

            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
            //Por favor não coloque essa parte do código em outro lugar se não ele quebra
        }
    ?>

    <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnexcluir)) {
            include_once '../BliblioohPw/php/Livro.php';
            $l = new Livro();
            $l->setCodLivro($cod_livro);
            $l->excluir();

            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
            //Por favor não coloque essa parte do código em outro lugar se não ele quebra
        }
    ?>
    
    <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#CadastroLivro">Add</button>
    <form method="post">
            <input type="text" name="nome" placeholder="Titulo">
            <input type="submit" name="btnpesquisar" value="Pesquisar">
                <?php
                    extract($_POST, EXTR_OVERWRITE);
                    if (isset($btnpesquisar)) {
                        include_once '../BlibioOh/php/Livro.php';
                        $l = new Livro();
                        $l->setTitulo($nome.'%');
                        $livro_bd = $l->consultar();
                    } 
                ?>
            <table id="example">
                <thead>
                    <tr>
                        <th>Código do livro</th>
                        <th>Titulo</th>
                        <th>Nome do autor</th>
                        <th>Data de lançamento</th>
                        <th>Gênero</th>
                        <th>Quantidade de páginas</th>
                        <th>Exemplares</th>
                        <th>Editora</th>
                        <th>ISBN</th>
                        <th>Codigo do Setor</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <?php
                    foreach ($livro_bd as $livro_mostrar)
                    {
                        ?>
                        <tbody>
                            <form method="post">
                                <tr>
                                    <input type="hidden" name="cod_livro" value="<?php echo $livro_mostrar[0]; ?>">
                                    <td <?php echo "name = '" . $livro_mostrar[0] . "'"?>><?php echo $livro_mostrar[0]?></td>
                                    <td><?php echo $livro_mostrar[1]?></td>
                                    <td><?php echo $livro_mostrar[2]?></td>
                                    <td><?php echo $livro_mostrar[3]?></td>
                                    <td><?php echo $livro_mostrar[4]?></td>
                                    <td><?php echo $livro_mostrar[5]?></td>
                                    <td><?php echo $livro_mostrar[6]?></td>
                                    <td><?php echo $livro_mostrar[7]?></td>
                                    <td><?php echo $livro_mostrar[8]?></td>
                                    <td><?php echo $livro_mostrar[9]?></td>
                                    <td><input type="submit" value="Del" name="btnexcluir" id="<?php echo $livro_mostrar[0]?>" class="excluir"> <button type="button" class="alterar" data-bs-toggle="modal" data-bs-target="#AlterarLivro">Alt</button></td>
                                </tr>
                            </form>
                        </tbody>
                        <?php
                    }
                ?>
            </table>
        </form>

    <!-- Modal alterar -->
    <div class="modal fade" id="AlterarLivro" tabindex="-1" aria-labelledby="AlterarLivroLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="AlterarLivroLabel">Alterar</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3" id="alt-livro-form" method="post">
                <div class="col-12">
                    <label for="cod_livro" class="form-label">Código do Livro</label>
                    <input type="text" name="cod_livro" class="form-control text-secondary" id="cod_livro" readonly>
                </div>
                <div class="col-12">
                    <label for="titulo" class="form-label">Titulo</label>
                    <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Titulo do livro" required>
                </div>
                <div class="col-12">
                    <label for="nomeAutor" class="form-label">Nome do autor</label>
                    <input type="text" name="nomeAutor" class="form-control" id="nomeAutor" placeholder="Autor do livro" required>
                </div>
                <div class="col-12">
                    <label for="dataLancamento" class="form-label">Data de lançamento</label>
                    <input type="text" name="dataLancamento" class="form-control" id="dataLancamento" placeholder="Data de lançamento" required>
                </div>
                <div class="col-12">
                    <label for="genero" class="form-label">Gênero</label>
                    <input type="text" name="genero" class="form-control" id="genero" placeholder="Gênero do livro" required>
                </div>
                <div class="col-12">
                    <label for="qtdePaginas" class="form-label">Quantidade de páginas</label>
                    <input type="text" name="qtdePaginas" class="form-control" id="qtdePaginas" placeholder="Quantidade de páginas" required>
                </div>
                <div class="col-12">
                    <label for="exemplares" class="form-label">Exemplares</label>
                    <input type="text" name="exemplares" class="form-control" id="exemplares" placeholder="Quantidade de exemplares" required>
                </div>
                <div class="col-12">
                    <label for="editora" class="form-label">Editora</label>
                    <input type="text" name="editora" class="form-control" id="editora" placeholder="editora do livro" required>
                </div>
                <div class="col-12">
                    <label for="isbn" class="form-label">ISBN</label>
                    <input type="text" name="isbn" class="form-control" id="isbn" placeholder="ISBN do livro" required>
                </div>
                <div class="col-12">
                    <label for="codSetor" class="form-label">Código do setor</label>
                    <input type="text" name="codSetor" class="form-control" id="codSetor" placeholder="Código do setor" required>
                </div>
                
                <div class="col-12">
                    <input type="submit" name="btnalterar" class="btn btn-outline-success btn-sm" id="cad-livro-btn" value="Alterar"/>
                </div>
            </form>

            <?php
                extract($_POST, EXTR_OVERWRITE);
                if (isset($btnalterar)) {
                    include_once 'php/Livro.php';
                    $l = new Livro();
                    $l->setTitulo($titulo);
                    $l->setNomeAutor($nomeAutor);
                    $l->setDataLancamento($dataLancamento);
                    $l->setGenero($genero);
                    $l->setQtdePaginas($qtdePaginas);
                    $l->setExemplares($exemplares);
                    $l->setEditora($editora);
                    $l->setIsbn($isbn);
                    $l->setCodSetor($codSetor);
                    $l->setCodLivro($cod_livro);
                    $l->alterar2();

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
    <div class="modal fade" id="CadastroLivro" tabindex="-1" aria-labelledby="CadastroLivroLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="CadastroLivroLabel">Cadastrar</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3" id="cad-livro-form" method="post">
            <div class="col-12">
                    <label for="tiitulo" class="form-label">Titulo</label>
                    <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Titulo do livro" required>
                </div>
                <div class="col-12">
                    <label for="nomeAutor" class="form-label">Nome do autor</label>
                    <input type="text" name="nomeAutor" class="form-control" id="nomeAutor" placeholder="Autor do livro" required>
                </div>
                <div class="col-12">
                    <label for="dataLancamento" class="form-label">Data de lançamento</label>
                    <input type="text" name="dataLancamento" class="form-control" id="dataLancamento" placeholder="Data de lançamento" required>
                </div>
                <div class="col-12">
                    <label for="genero" class="form-label">Gênero</label>
                    <input type="text" name="genero" class="form-control" id="genero" placeholder="Gênero do livro" required>
                </div>
                <div class="col-12">
                    <label for="qtdePaginas" class="form-label">Quantidade de páginas</label>
                    <input type="text" name="qtdePaginas" class="form-control" id="qtdePaginas" placeholder="Quantidade de páginas" required>
                </div>
                <div class="col-12">
                    <label for="exemplares" class="form-label">Exemplares</label>
                    <input type="text" name="exemplares" class="form-control" id="exemplares" placeholder="Quantidade de exemplares" required>
                </div>
                <div class="col-12">
                    <label for="editora" class="form-label">Editora</label>
                    <input type="text" name="editora" class="form-control" id="editora" placeholder="editora do livro" required>
                </div>
                <div class="col-12">
                    <label for="isbn" class="form-label">ISBN</label>
                    <input type="text" name="isbn" class="form-control" id="isbn" placeholder="ISBN do livro" required>
                </div>
                <div class="col-12">
                    <label for="codSetor" class="form-label">Código do setor</label>
                    <input type="text" name="codSetor" class="form-control" id="codSetor" placeholder="Código do setor" required>
                </div>

                <div class="col-12">
                    <input type="submit" name="btnenviar" class="btn btn-outline-success btn-sm" id="cad-livro-btn" value="Cadastrar"/>
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
                var cod_livro = linha.find('td:eq(0)').text();
                var titulo = linha.find('td:eq(1)').text();
                var nomeAutor = linha.find('td:eq(2)').text();
                var dataLancamento = linha.find('td:eq(3)').text();
                var genero = linha.find('td:eq(4)').text();
                var qtdePaginas = linha.find('td:eq(5)').text();
                var exemplares = linha.find('td:eq(6)').text();
                var editora = linha.find('td:eq(7)').text();
                var isbn = linha.find('td:eq(8)').text();
                var codSetor = linha.find('td:eq(9)').text();
                
                
                
                // Envie os dados para a janela modal
                $('#cod_livro').val(cod_livro);
                $('#titulo').val(titulo);
                $('#nomeAutor').val(nomeAutor);
                $('#dataLancamento').val(dataLancamento);
                $('#genero').val(genero);
                $('#qtdePaginas').val(qtdePaginas);
                $('#exemplares').val(exemplares);
                $('#editora').val(editora);
                $('#isbn').val(isbn);
                $('#codSetor').val(codSetor);
                
                // Abra a janela modal
                $('#AlterarLivro').modal('show');
            });
        });
    </script>
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>