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
      <link rel="stylesheet" href="css/admin.css">
</head>
<body>

    <style>
        /* Adicione ao seu arquivo CSS admin.css */
.table th,
.table td {
    text-align: center;
    font-size: 12px;
    padding: 5px;
}

.table th:first-child, /* Cod_Livro */
.table th:nth-child(10) { /* Cod_Setor */
    width: 5%; 
}

.table th:nth-child(5), /* Gênero */
.table th:nth-child(6) { /* Qtde_Pagina */
    width: %;
}

.table th:nth-child(7), /* Exemplares */
.table th:nth-child(8) { /* Editora */
    width: 10%;
}

.table th:nth-child(11) { /* Ação */
    width: 10%;
}

    </style>
   <!-- Barra Superior -->
    <header>
   <div class="container w-100 p-0 mt-0 mb-0">
    <div class="header">
        <div class="d-flex align-items-center justify-content-center w-100">
            <img src="img/logo.png" alt="Logo" width="70" height="70">
        </div>
        <div class="d-flex align-items-center" style="position: absolute; right: 20px;">
            <button id="themeSwitcher2" class="btn-per btn btn-outline-dark mx-3" onclick="toggleTheme2()">
                <i id="themeIcon2" style="color:rgb(255, 118, 0) ;" class="bi bi-sun"></i>
            </button>
        </div>
    </div>
</div>
</header>
    

    <!-- Menu Lateral -->
   <div class="sidebar mb-0">
    <div class="text-center mb-3">
        <img src="img/foto.jpg" alt="Perfil" width="100" height="100" class="mb-2 rounded-circle">
        <h5 style="font-weight: bold; color: rgb(255, 118, 0);">Nome</h5>
        <span style="color: #dadada; font-size: 11pt;">gabriel.santos@blibiooh.com</span>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="#" class="nav-link"><i class="bi bi-house-door-fill"></i> Início</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link"><i class="bi bi-people"></i> Usuários</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link"><i class="bi bi-book"></i> Livros</a>
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
                        <a href="#" class="nav-link"><i class="bi bi-person-badge"></i> Administradores</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="bi bi-book-half"></i> Administrar Livro</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="bi bi-briefcase"></i> Funcionários</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="bi bi-layout-text-sidebar"></i> Setores</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="bi bi-briefcase"></i> Cargos</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="bi bi-calendar3"></i> Período</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link"><i class="bi bi-calendar-check"></i> Empréstimos</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link"><i class="bi bi-info-circle"></i> Sobre Nós</a>
        </li>
        <li class="nav-item mt-auto">
            <a href="LoginUser.php" class="nav-link"><i class="bi bi-box-arrow-right"></i> Sair</a>
        </li>
    </ul>
</div>

   <div class="content mt-5">
   <div class="container mt-4">
    <h1 class="mt-5 text-center">Bem-vindo à Área dos Livros</h1>
</div>

    <h1 class="text-center">Livros</h1>
    <button id="novoRegistroBtn" class="btn btn-success mb-3"><i class="bi bi-plus-circle"></i> Novo Registro</button>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Cod_Livro</th>
                <th>Título</th>
                <th>Nome_Autor</th>
                <th>Data_Lancamento</th>
                <th>Gênero</th>
                <th>Qtde_Pagina</th>
                <th>Exemplares</th>
                <th>Editora</th>
                <th>ISBN</th>
                <th>Cod_Setor</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once 'php_classes/Livro.php';
            $p = new Livro();
            $pro_bd = $p->listar();
            foreach($pro_bd as $pro_mostrar) {
                echo "<tr>";
                echo "<td>" . $pro_mostrar['Cod_Livro'] . "</td>";
                echo "<td contenteditable='false'>" . $pro_mostrar['Titulo'] . "</td>";
                echo "<td contenteditable='false'>" . $pro_mostrar['Nome_Autor'] . "</td>";
                echo "<td contenteditable='false'>" . $pro_mostrar['Data_Lancamento'] . "</td>";
                echo "<td contenteditable='false'>" . $pro_mostrar['Genero'] . "</td>";
                echo "<td contenteditable='false'>" . $pro_mostrar['Qtde_Pagina'] . "</td>";
                echo "<td contenteditable='false'>" . $pro_mostrar['Exemplares'] . "</td>";
                echo "<td contenteditable='false'>" . $pro_mostrar['Editora'] . "</td>";
                echo "<td contenteditable='false'>" . $pro_mostrar['ISBN'] . "</td>";
                echo "<td contenteditable='false'>" . $pro_mostrar['Cod_Setor'] . "</td>";
                echo "<td>
                        <button class='btn btn-warning btn-sm editarBtn'><i class='bi bi-pencil'></i></button>
                        <button class='btn btn-danger btn-sm deletarBtn'><i class='bi bi-trash'></i></button>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script>
    // Função para tornar a linha editável
    document.querySelectorAll('.editarBtn').forEach(button => {
        button.addEventListener('click', function() {
            const row = this.closest('tr');
            row.querySelectorAll('td').forEach((td, index) => {
                if (index !== 0 && index !== 10) { // Ignora o Cod_Livro e Ação
                    td.contentEditable = true;
                    td.classList.add('editavel');
                }
            });
            // Muda o botão para salvar
            this.innerHTML = '<i class="bi bi-save"></i>';
            this.classList.remove('editarBtn');
            this.classList.add('salvarBtn');
        });
    });

    // Função para salvar a linha editada
    document.addEventListener('click', function(e) {
        if (e.target.closest('.salvarBtn')) {
            const row = e.target.closest('tr');
            // Coleta os dados da linha editada
            const dados = Array.from(row.querySelectorAll('td')).map(td => td.innerText);
            // Código para enviar os dados ao servidor para atualização aqui (ex: AJAX)
            
            // Desativa a edição e volta o botão para editar
            row.querySelectorAll('td').forEach(td => {
                td.contentEditable = false;
                td.classList.remove('editavel');
            });
            e.target.innerHTML = '<i class="bi bi-pencil"></i>';
            e.target.classList.remove('salvarBtn');
            e.target.classList.add('editarBtn');
        }
    });

    // Função para adicionar uma nova linha editável
    document.getElementById('novoRegistroBtn').addEventListener('click', function() {
        const table = document.querySelector('table tbody');
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>--</td>
            <td contenteditable="true" class="editavel"></td>
            <td contenteditable="true" class="editavel"></td>
            <td contenteditable="true" class="editavel"></td>
            <td contenteditable="true" class="editavel"></td>
            <td contenteditable="true" class="editavel"></td>
            <td contenteditable="true" class="editavel"></td>
            <td contenteditable="true" class="editavel"></td>
            <td contenteditable="true" class="editavel"></td>
            <td contenteditable="true" class="editavel"></td>
            <td>
                <button class="btn btn-success btn-sm salvarNovoBtn"><i class="bi bi-save"></i></button>
                <button class="btn btn-danger btn-sm deletarBtn"><i class="bi bi-trash"></i></button>
            </td>
        `;
        table.prepend(newRow);
    });

    // Função para deletar uma linha
    document.addEventListener('click', function(e) {
        if (e.target.closest('.deletarBtn')) {
            const row = e.target.closest('tr');
            row.remove();
            // Código para deletar do banco de dados (ex: AJAX)
        }
    });

</script>

</body>
</html>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
