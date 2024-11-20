<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php
        include_once '../BlibioOh/php/Usuario.php';
        $u = new Usuario();
        $usuario_bd = $u->listar();
    ?>

    <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnenviar)) {
            include_once '../BlibioOh/php/Usuario.php';
            $u = new Usuario();
            $u->setNome($nome);
            $u->setEndereco($endereco);
            $u->setRg($rg);
            $u->setCpf($cpf);
            $u->setTelefone($telefone);
            $u->setEmail($email);
            $u->setSenha($senha);
            $u->salvar();

            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }
    ?>

    <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnexcluir)) {
            include_once '../BlibioOh/php/Usuario.php';
            $u = new Usuario();
            $u->setIdUsuario($id_usuario);
            $u->excluir();

            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }
    ?>

    <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#CadastroUsuario">Add</button>
    <form method="post">
        <input type="text" name="nome" placeholder="Nome do Usuario">
        <input type="submit" name="btnpesquisar" value="Pesquisar">
        <?php
            extract($_POST, EXTR_OVERWRITE);
            if (isset($btnpesquisar)) {
                include_once '../BlibioOh/php/Usuario.php';
                $u = new Usuario();
                $u->setNome($nome.'%');
                $usuario_bd = $u->consultar();
            } 
        ?>
        <table>
            <thead>
                <tr>
                    <th>Id do Usuario</th>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>RG</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Senha</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($usuario_bd as $usuario_mostrar)
                    {
                        ?>
                        <form method="post">
                            <tr>
                                <input type="hidden" name="id_usuario" value="<?php echo $usuario_mostrar[0]?>">
                                <td><?php echo $usuario_mostrar[0]?></td>
                                <td><?php echo $usuario_mostrar[1]?></td>
                                <td><?php echo $usuario_mostrar[2]?></td>
                                <td><?php echo $usuario_mostrar[3]?></td>
                                <td><?php echo $usuario_mostrar[4]?></td>
                                <td><?php echo $usuario_mostrar[5]?></td>
                                <td><?php echo $usuario_mostrar[6]?></td>
                                <td><?php echo $usuario_mostrar[7]?></td>
                                <td><input type="submit" value="Del" name="btnexcluir" id="<?php echo $usuario_mostrar[0]?>" class="excluir"> <button type="button" class="alterar" data-bs-toggle="modal" data-bs-target="#AlterarUsuario">Alt</button></td>
                            </tr>
                        </form>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </form>

    <!-- Modal alterar -->
    <div class="modal fade" id="AlterarUsuario" tabindex="-1" aria-labelledby="AlterarUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="AlterarUsuarioLabel">Alterar</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3" id="alt-usuario-form" method="post">
                <div class="col-12">
                    <label for="id_usuario" class="form-label">ID do Usuario</label>
                    <input type="text" name="id_usuario" class="form-control text-secondary" id="id_usuario" readonly>
                </div>
                <div class="col-12">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" required>
                </div>
                <div class="col-12">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" name="endereco" class="form-control" id="endereco" placeholder="Endereço" required>
                </div>
                <div class="col-12">
                    <label for="rg" class="form-label">RG</label>
                    <input type="text" name="rg" class="form-control" id="rg" placeholder="RG" required>
                </div>
                <div class="col-12">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" name="cpf" class="form-control" id="cpf" placeholder="CPF" required>
                </div>
                <div class="col-12">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" name="telefone" class="form-control" id="telefone" placeholder="Telefone" required>
                </div>
                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                </div>
                <div class="col-12">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="text" name="senha" class="form-control" id="senha" placeholder="Senha" required>
                </div>

                <div class="col-12">
                    <input type="submit" name="btnalterar" class="btn btn-outline-success btn-sm" id="cad-cargo-btn" value="Alterar"/>
                </div>
            </form>

            <?php
                extract($_POST, EXTR_OVERWRITE);
                if (isset($btnalterar)) {
                    include_once '../BlibioOh/php/Usuario.php';
                    $u = new Usuario();
                    $u->setNome($nome);
                    $u->setEndereco($endereco);
                    $u->setRg($rg);
                    $u->setCpf($cpf);
                    $u->setTelefone($telefone);
                    $u->setEmail($email);
                    $u->setSenha($senha);
                    $u->setIdUsuario($id_usuario);
                    $u->alterar2();

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
    <div class="modal fade" id="CadastroUsuario" tabindex="-1" aria-labelledby="CadastroUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="CadastroUsuarioLabel">Cadastrar</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3" id="cad-usuario-form" method="post">
                <div class="col-12">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" required>
                </div>
                <div class="col-12">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" name="endereco" class="form-control" id="endereco" placeholder="Endereço" required>
                </div>
                <div class="col-12">
                    <label for="rg" class="form-label">RG</label>
                    <input type="text" name="rg" class="form-control" id="rg" placeholder="RG" required>
                </div>
                <div class="col-12">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" name="cpf" class="form-control" id="cpf" placeholder="CPF" required>
                </div>
                <div class="col-12">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" name="telefone" class="form-control" id="telefone" placeholder="Telefone" required>
                </div>
                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
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
                var id_usuario = linha.find('td:eq(0)').text();
                var nome = linha.find('td:eq(1)').text();
                var endereco = linha.find('td:eq(2)').text();
                var rg = linha.find('td:eq(3)').text();
                var cpf = linha.find('td:eq(4)').text();
                var telefone = linha.find('td:eq(5)').text();
                var email = linha.find('td:eq(6)').text();
                var senha = linha.find('td:eq(7)').text();
                
                
                
                // Envie os dados para a janela modal
                $('#id_usuario').val(id_usuario);
                $('#nome').val(nome);
                $('#endereco').val(endereco);
                $('#rg').val(rg);
                $('#cpf').val(cpf);
                $('#telefone').val(telefone);
                $('#email').val(email);
                $('#senha').val(senha);
                
                // Abra a janela modal
                $('#AlterarUsuario').modal('show');
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>