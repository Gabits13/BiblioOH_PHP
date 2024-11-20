<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela Período</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php
    include_once 'php/Periodo.php';
    $p = new Periodo();
    $periodo_bd = $p->listar();
    ?>

    <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnenviar)) {
            include_once '../BliblioohPw/php/Periodo.php';
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
            include_once '../BliblioohPw/php/Periodo.php';
            $p = new Periodo();
            $p->setCodPeriodo($cod_periodo);
            $p->excluir();

            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
            //Por favor não coloque essa parte do código em outro lugar se não ele quebra
        }
    ?>
    
    <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#CadastroPeriodo">Add</button>
    <form method="post">
            <input type="text" name="nome" placeholder="Descrição">
            <input type="submit" name="btnpesquisar" value="Pesquisar">
                <?php
                    extract($_POST, EXTR_OVERWRITE);
                    if (isset($btnpesquisar)) {
                        include_once '../BlibioOh/php/Periodo.php';
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
                                    <td><input type="submit" value="Del" name="btnexcluir" id="<?php echo $periodo_mostrar[0]?>" class="excluir"> <button type="button" class="alterar" data-bs-toggle="modal" data-bs-target="#AlterarPeriodo">Alt</button></td>
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
                    include_once 'php/Periodo.php';
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
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>