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
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form>
                <h1>Crie uma Conta</h1>
                <span>Preencha todas as informações para se registrar!</span>
                <input type="text" placeholder="Nome">
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Senha">
                <button>Criar Conta</button>
            </form>
        </div>
        <div class="form-container sign-in">
        <form method="post" action="">
                <h1 class="mb-2 mt-4">Login de Admin</h1>
                <div class="social-icons mt-0 mb-2">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                </div>
                <span class="mb-3 mt-1">Use seu Email e sua senha para entrar!</span>
                <div class="input-box mb-0">
                    <input type="email" autocomplete="off" placeholder="Email do usuário" id="email" name="txtemail" required>
                </div>
                <div class="input-box mb-0">
                    <input type="password" autocomplete="off" placeholder="Senha" id="password" name="txtsenha">
                </div>
                <button type="submit" name="btnenviar" class="btn">Login</button>
                <div class="register-link mb-0">
                    <p>É Usuário? <a style="color: #309190;" href="LoginUser.php">Entre Aqui!</a></p>
                </div>
                <?php 
                
              
                    extract($_POST, EXTR_OVERWRITE);
                    if (isset($btnenviar)) {
                        include_once 'php_classes/Admin.php';
                        $u = new Admin();
                        $u->setEmail($txtemail); 
                        $u->setSenha($txtsenha);
                        $pro_bd = $u->logar();
                        $existe = false;
                
                        foreach ($pro_bd as $pro_mostrar) {
                            $existe = true;
                            echo "<div class='mb-0 mt-0 alert alert-success text-center' style='padding: 10px; font-size: 0.9em;'><b>Bem Vindo! Usuário: " . ($pro_mostrar['Nome']) . "</b></div>";
                            echo "<a href='menu_Admin.html'><button type='button' name='btnentrar' class=' mt-0 mb-0 btn btn-primary w-100'>Entrar</button></a>";
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
                <div class="toggle-panel toggle-right">
                    <img src="img/logo.png" alt="logo">
                    <h1>Bem Vindo de Volta!</h1>
                    <p>Vamos ao trabalho?</p>
                    <p id="rodape">BlibioOH&reg; 2024 todos os direitos reservados</p>
                </div>
            </div>
        </div>
    </div>


    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
