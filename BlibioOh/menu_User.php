<?php
include_once 'php_classes/Livro.php'; // Inclui a classe Livro

$livro = new Livro();
$livros_bd = $livro->listar(); // Lista todos os livros
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlibioOH - Home </title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.20.0/font/bootstrap-icons.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
      <link rel="stylesheet" href="css/style.css">
      <?php session_start();?>
</head>
<header>
    <div class="px-3 py-2 text-white" style="background-color: #309190;">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="menu_User.html" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
           <img width="80" height="80" class="d-inline-block align-text-center"src="img/logo.png" alt="Logo">
          </a>

          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
              <a href="#" class="nav-link text-dark">
                <img class="bi d-block mx-auto mb-1" width="30" height="30" src="img/homeicon.png" alt="">
                Home
              </a>
            </li>
            <li>
              <a href="#livros" class="nav-link text-white">
               <img class="bi d-block mx-auto mb-1" width="30" height="30" src="img/livrosicon.png" alt="">
                Livros
              </a>
            </li>
            <li>
              <a href="#emprestimos" class="nav-link text-white">
                <img class="bi d-block mx-auto mb-1" width="30" height="30" src="img/emprestimosicon.png" alt="">
                Meus Empréstimos
              </a>
            </li>
            <li>
              <a href="sobrenos.html" class="nav-link text-white">
                <img class="bi d-block mx-auto mb-1" width="30" height="30" src="img/sobrenosicon.png" alt="">
                Sobre Nós
              </a>
            </li>
          </ul>
          <div class="dropdown text-end">
            <a href="#" class=" mx-auto  link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="img/perfil.jpg" alt="foto de  perfil" width="45" height="45" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small">
              <li><a class="dropdown-item" href="meu_perfil.php">Meu Perfil</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="LoginUser.php">Sair da Conta</a></li>
            </ul>
          </div>
        </div>
      </div>
        </div>
      </div>
    </div>
    <div class="px-3 py-2 border-bottom mb-3">
      <div class="container d-flex flex-wrap justify-content-center">

        <a class="me-auto" href="faleconosco.html">
          <button type="button" class="btn btn-outline-primary me-auto custom-btn">Fale Conosco</button>
       </a>
         <div class="d-flex align-items-center">
        <!--<button id="themeSwitcher" class="btn-per btn btn-outline-dark mx-3" onclick="toggleTheme()">
                <i id="themeIcon" style="color:rgb(255, 118, 0) ;" class="bi bi-sun"></i>
            </button>-->
    </div>
      </div>
    </div>
  </header>
<body>
 
  <div class="container-fluid w-100 p-0"> 
    <div style="margin-top: -20px;" id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel"> 
      <div class="carousel-inner mb-3">
        <div class="carousel-item active" id="carrossel-item" data-bs-interval="5000">
          <img src="img/blibioteca.jpg" class="d-block w-100" style="pointer-events: none; object-fit: cover; max-height: 400px;" alt="Foto de um CNC por dentro">
           <div class="carousel-caption d-block d-md-block">
            <h3>BlibioOH&reg;</h3>
            <p id="carousel-caption1" style="font-family: Arial; font-size: 18px; font-weight: bold;">Explore um universo de histórias e descobertas na BiblioOH</p>
          </div>
        </div>
        <div class="carousel-item" id="carrossel-item" data-bs-interval="7000">
          <img src="img/biblioteca2.jpg" class="d-block w-100" style="pointer-events: none; object-fit: cover; max-height: 400px; filter: blur(0.5px);" alt="Foto de um CNC por dentro">
           <div class="carousel-caption d-block d-md-block">
            <h3 id= "carousel-title2">BlibioOH&reg;</h3>
            <p id="carousel-caption2" style="font-family: Arial; font-size: 18px; font-weight: bold;">Sua próxima aventura começa aqui!</p>
          </div>
        </div>
        <div class="carousel-item" id="carrossel-item" data-bs-interval="7000">
          <img src="img/biblioteca3.jpg" class="d-block w-100" style="pointer-events: none; object-fit: cover; max-height: 400px; filter: blur(0.5px);" alt="Foto de um CNC por dentro">
           <div class="carousel-caption d-block d-md-block">
            <h3 id= "carousel-title3">BlibioOH&reg;</h3>
            <p id="carousel-caption3" style="font-family: Arial; font-size: 18px; font-weight: bold;">Conecte-se ao conhecimento e inspire-se em cada página.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>


  <style>
        #detalhesLivro {
            display: none; /* Esconde o container inicialmente */
            margin-top: 20px;
            margin-bottom: 30px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
<div id="livros" class="container mt-5 mb-5">
    <h2 class="text-left mb-5">Explore um mundo vasto na BiblioOh</h2>

<!-- Carrossel de Livros -->
<div id="livrosCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php
        $active = true; // Define o primeiro slide como ativo
        foreach (array_chunk($livros_bd, 4) as $livros_grupo) { // Divide os livros em grupos de 4
            echo '<div class="carousel-item ' . ($active ? 'active' : '') . '">';
            echo '<div class="row">';
            foreach ($livros_grupo as $livro_item) {
                // Define o caminho correto da imagem com base no código do livro
                $img_src = "img/livro" . $livro_item['Cod_Livro'] . ".jpeg"; 
        ?>
                <div class="col-md-3 mb-4">
                    <div class="card" style="cursor: pointer;" 
                         onclick="mostrarDetalhes(<?php echo htmlspecialchars(json_encode($livro_item)); ?>)">
                        <!-- A imagem agora será carregada com base no Cod_Livro -->
                        <img src="<?php echo $img_src; ?>" class="card-img-top" alt="Capa do Livro" style="height: 300px;">
                        <div class="card-body" style="height: 100px;">
                            <h5 class="card-title"><?php echo $livro_item['Titulo']; ?></h5>
                            <p class="card-text">Autor: <?php echo $livro_item['Nome_Autor']; ?></p>
                        </div>
                    </div>
                </div>
        <?php
            }
            echo '</div></div>';
            $active = false; // Após o primeiro slide, os próximos não são mais "ativos"
        }
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#livrosCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#livrosCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Próximo</span>
    </button>
</div>


    <!-- Container de Detalhes do Livro -->
    <div id="detalhesLivro">
        <button type="button" class="btn-close float-end" aria-label="Fechar" onclick="fecharDetalhes()"></button>
        <h4 id="detalhesTitulo"></h4>
        <p><strong>Autor:</strong> <span id="detalhesAutor"></span></p>
        <p><strong>Gênero:</strong> <span id="detalhesGenero"></span></p>
        <p><strong>ISBN:</strong> <span id="detalhesISBN"></span></p>
        <p><strong>Editora:</strong> <span id="detalhesEditora"></span></p>
        <p><strong>Páginas:</strong> <span id="detalhesPaginas"></span></p>
        <p><strong>Descrição:</strong></p>
        <p id="detalhesDescricao"></p>
        <a id="botaoEmprestar" class="btn btn-success" href="#" download>Emprestar</a>
    </div>
</div>

<script>
    // Função para mostrar os detalhes do livro
    function mostrarDetalhes(livro) {
        document.getElementById('detalhesLivro').style.display = 'block';
        document.getElementById('detalhesTitulo').textContent = livro.Titulo;
        document.getElementById('detalhesAutor').textContent = livro.Nome_Autor;
        document.getElementById('detalhesGenero').textContent = livro.Genero;
        document.getElementById('detalhesISBN').textContent = livro.ISBN;
        document.getElementById('detalhesEditora').textContent = livro.Editora;
        document.getElementById('detalhesPaginas').textContent = livro.Qtde_Pagina;
        document.getElementById('detalhesDescricao').textContent = livro.Descricao;
        document.getElementById('botaoEmprestar').href = `downloads/${livro.Titulo}.pdf`; // Define o link de download
    }

    // Função para fechar os detalhes
    function fecharDetalhes() {
        document.getElementById('detalhesLivro').style.display = 'none';
    }
</script>


<style>
      .custom-btn {
    border-color: rgb(255, 118, 0); 
    color: rgb(255, 118, 0);       
    background-color: transparent; 
    transition: all 0.3s ease-in-out;
    margin-bottom: 3px; 
}

.custom-btn:hover {
    background-color: rgb(255, 118, 0); 
    color: white;                      
    border-color: rgb(255, 118, 0);    
}
table {
    border-collapse: collapse; /* Evita bordas duplas */
    width: 100%;
    margin-top: 10px;
    margin-bottom: 30px;
}

table th, table td {
    border: 1px solid #ddd; /* Define a borda de cada célula */
    padding: 8px; /* Adiciona espaço interno */
    text-align: left; /* Alinha o texto à esquerda */
}

table th {
    background-color: #f2f2f2; /* Cor de fundo para cabeçalhos */
    color: black; /* Cor do texto no cabeçalho */
}
</style>

<?php
  include_once 'php_classes/EmprestaLivro.php';
  include_once 'php_classes/Livro.php';
  $u = new EmprestaLivro();
  $u->setIdUsuario($_SESSION['Id_Usuario']);
  $usuario_bd = $u->listarEmprestimo();
?>

    <h1 id="emprestimos">Meus Empréstimos</h1>

        <table>
            <thead>
                <tr>
                    <th>Titulo do Livro</th>
                    <th>Data de Emissão</th>
                    <th>Data de Devolução</th>
                    <th>Dias Restantes</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($usuario_bd as $usuario_mostrar)
                    {
                        $l = new Livro();
                        $l->setCodLivro($usuario_mostrar[1]);
                        $livro_bd = $l->listarEmprestimo();

                        $date1=date_create(date("Y-m-d"));
                        $date2=date_create($usuario_mostrar[3]);
                        $diff=date_diff($date1,$date2);
                ?>
                        <form method="post">
                            <tr>
                                <input type="hidden" name="id_usuario" value="<?php echo $usuario_mostrar[0]?>">
                                <td><?php foreach($livro_bd as $livro_mostrar){echo $livro_mostrar[1];}?></td>
                                <td><?php echo $usuario_mostrar[2]?></td>
                                <td><?php echo $usuario_mostrar[3]?></td>
                                <td><?php echo $diff->format("%R%a dia(s)")?></td>
                            </tr>
                              
                        </form>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </form>
     <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Footer -->
 <div class="b-example-divider mt-auto" style="background: linear-gradient(135deg, #2c8583, #4aa7a8);">
  <div class="container" style="color: white;">
    <footer class="py-5">
      <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
        <p id="direitos-footer">&copy; 2024 BiblioOh&reg;. Todos os direitos reservados</p>
        <ul class="list-unstyled d-flex">
          <li class="ms-3"><a rel="external" class="link-body-emphasis" href="#"><img src="img/instaicon.png" alt="Instagram" width="24" height="24"></a></li>
          <li class="ms-3"><a rel="external" class="link-body-emphasis" href="#"><img src="img/facebookicon.png" alt="Facebook" width="24" height="24"></a></li>
          <li class="ms-3"><a rel="external" class="link-body-emphasis" href="#"><img src="img/whatsappicon.png" alt="WhatsApp" width="24" height="24"></a></li>
        </ul>
      </div>

  

      <div class="row">
        <div class="col text-center">
          <a href="#" class="btn btn-dark btn-m rounded-pill"><i class="bi-arrow-up-circle"></i></a>
        </div>
      </div>
    </footer>
  </div>
</div>
</div>   
</body>

</html>