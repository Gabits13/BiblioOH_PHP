<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <title>Login - BlibioOH</title>
    <?php session_start();?>

</head>
<body>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Sucesso</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modalMessage">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Salvar mudanças</button>
      </div>
    </div>
  </div>
</div>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="" method="POST">
                <h2 class="mb-0 mt-2">Crie sua Conta</h2>
                <div class="input-box mb-0">
                    <input type="text" name="txtname" placeholder="Nome" required autocomplete="off"><br>
                </div>
                <div class="input-box mb-0">
                    <input type="text" name="txtendereco" placeholder="Endereço" required autocomplete="off"><br>
                </div>
                <div class="input-box mb-0">
                    <input type="text" name="txtrg" placeholder="RG (00.000.000-0)" required autocomplete="off" maxlength="12" OnKeyPress="formatar('##.###.###-##',this)" pattern="\d{2}\.\d{3}\.\d{3}-\d{1}" title="Formato: 00.000.000-0"><br>
                </div>
                <div class="input-box mb-0">
                    <input type="text" name="txtcpf" placeholder="CPF" required autocomplete="off" maxlength="14" OnKeyPress="formatar('###.###.###-##',this)" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}|\d{11}" title="Formato: 000.000.000-00 ou 00000000000"><br>
                </div>
                <div class="input-box mb-0">
                    <input type="tel" placeholder="(XX) 9XXXX-XXXX" id="phone" name="txtphone" maxlength="15" OnKeyPress="formatar('(##) #####-####',this)" pattern="\(\d{2}\) 9\d{4}-\d{4}" autocomplete="off"><br>
                </div>
                <div class="input-box mb-0">
                    <input type="email" name="txtemail" placeholder="Email" required autocomplete="off"><br>
                </div>
                <div class="input-box mb-0">
                    <input type="password" name="txtsenha" placeholder="Senha" required autocomplete="off"><br>
                </div>
                <button class="mb-0 mt-0" type="submit" name="btnCriarConta">Criar Conta</button>

<script> 
    function formatar(mascara, documento) {
    let i = documento.value.length;
    let saida = '#';
    let texto = mascara.substring(i);
    while (texto.substring(0, 1) != saida && texto.length ) {
      documento.value += texto.substring(0, 1);
      i++;
      texto = mascara.substring(i);
    }
  }
</script>
                <?php
            include_once 'php_classes/conectar.php'; 

            if (isset($_POST['btnCriarConta'])) { 
                
                $nome = $_POST['txtname'];
                $endereco = $_POST['txtendereco'];
                $rg = $_POST['txtrg'];
                $cpf = $_POST['txtcpf'];
                $telefone = $_POST['txtphone'];
                $email = $_POST['txtemail'];
                $senha = $_POST['txtsenha']; 
            
                try {
                    $conn = new Conectar(); 
                  
                    $sql = $conn->prepare("
                        INSERT INTO usuario (Nome, Endereco, RG, CPF, Telefone, Email, Senha) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)
                    ");
                  
                    $sql->bindParam(1, $nome, PDO::PARAM_STR);
                    $sql->bindParam(2, $endereco, PDO::PARAM_STR);
                    $sql->bindParam(3, $rg, PDO::PARAM_STR);
                    $sql->bindParam(4, $cpf, PDO::PARAM_STR);
                    $sql->bindParam(5, $telefone, PDO::PARAM_STR);
                    $sql->bindParam(6, $email, PDO::PARAM_STR);
                    $sql->bindParam(7, $senha, PDO::PARAM_STR); 
            
                  
                    if ($sql->execute()) {
                        $message = "Conta criada com sucesso!";
                    } else {
                        $message = "Erro ao criar conta.";
                    }
            
                   
                    echo "
                    <script>
                        document.getElementById('modalMessage').innerText = '$message';
                        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
                        myModal.show();
                    </script>";
                } catch (PDOException $e) {
                    echo "Erro: " . $e->getMessage();
                }
            }
            ?>
            </form>

         
        </div>

        <div class="form-container sign-in">
            <form method="post" action="">
                <h1 class="mb-2 mt-1">Login</h1>
                <div class="social-icons mt-0 mb-2">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                </div>
                <span class="mb-3 mt-1">Use seu Email e sua senha para entrar!</span>
                <div class="input-box mb-0">
                    <input type="email" placeholder="Email do usuário" id="email" name="txtemail" autocomplete="off" required>
                </div>
                <div class="input-box mb-0">
                    <input type="password" placeholder="Senha" id="password" autocomplete="off" name="txtsenha">
                </div>
                <button type="submit" name="btnenviar" class="btn">Login</button>
                <div class="register-link mb-0">
                    <p>É Administrador? <a style="color: #309190;" href="LoginAdm.php">Entre Aqui!</a></p>
                </div>
                <?php 
                extract($_POST, EXTR_OVERWRITE);
                if (isset($btnenviar)) {
                    include_once 'php_classes/usuario.php';
                    $u = new Usuario();
                    $u->setEmail($txtemail);  
                    $u->setSenha($txtsenha); 
                    $pro_bd = $u->logar();
                    $existe = false;

                    foreach ($pro_bd as $pro_mostrar) {
                        $existe = true;

                        $_SESSION['Id_Usuario'] = $pro_mostrar[0];
                        $_SESSION['Nome_User'] = $pro_mostrar[1];
                        $_SESSION['Endereco_User'] = $pro_mostrar[2];
                        $_SESSION['Rg_User'] = $pro_mostrar[3];
                        $_SESSION['Cpf_User'] = $pro_mostrar[4];
                        $_SESSION['Telefone_User'] = $pro_mostrar[5];
                        $_SESSION['Email_User'] = $pro_mostrar[6];
                        $_SESSION['Senha_User'] = $pro_mostrar[7];

                        echo "<div class='mb-0 mt-0 alert alert-success text-center' style='padding: 10px; font-size: 0.9em;'><b>Bem Vindo! Usuário: " . ($_SESSION['Nome_User']) . "</b></div>";
                        echo "<a href='menu_User.php'><button type='button' name='btnentrar' class=' mt-0 mb-0 btn btn-primary w-100'>Entrar</button></a>";
                    }
                    if (!$existe) {
                        echo "<div class='alert alert-danger text-center'><b>Login inválido! Tente novamente.</b></div>";
                    }
                }
                ?>
            </form>
        </div>
        
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <img src="img/logo.png" alt="logo"> 
                    <h1>Olá, Amigo!</h1>
                    <p>Já tem uma Conta?</p>
                    <button class="hidden" id="login">Faça Login</button>
                    <p id="rodape">BlibioOH&reg; 2024 todos os direitos reservados</p>
                </div>
                <div class="toggle-panel toggle-right">
                    <img src="img/logo.png" alt="logo">
                    <h1>Bem Vindo!</h1>
                    <p>Não tem uma Conta? Crie Uma!</p>
                    <button class="hidden" id="register">Crie sua Conta!</button>
                    <p id="rodape">BlibioOH&reg; 2024 todos os direitos reservados</p>
                </div>
            </div>
        </div>
    </div>

    

    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
