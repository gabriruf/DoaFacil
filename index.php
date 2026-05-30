<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="CSS/form.css">
        <link rel="icon" type="image/x-icon" href="img/logo-favicon.ico">
        <title>Login DOA FÁCIL</title>
    </head>
    <body>

    <header class="header">
        <div class="a">
        <img id="header-logo" alt='Logotipo do "Doá Facil"' src="img/img00.png">
        
        <div class="textos-header">
            <h1><span style="color: rgb(0, 165, 0);">DOA</span><span style="color: rgb(0, 81, 255);">Fácil</span></h1>
            <h4>CONECTANDO QUEM DOA A QUEM PRECISA</h4>
        </div>
    </div>
    
    <h3 class="titulo-login">LOGIN</h3> 
    </header>

        <main class="container">
          <?php
            if (isset($_POST["login"])) {
                include_once("php/database.php");

                try {
                    include_once("php/tabelaUser.php");

                    $erroArray = [];
                    $email = htmlspecialchars($_POST["email"]);
                    $senha = htmlspecialchars($_POST["senha"]);
                    $tipo_user = htmlspecialchars($_POST["opcoes-acesso"]);

                    $stmt = $conn->prepare('SELECT nome_user, pass_user FROM doafacil.Users WHERE email_user = :email AND tipo_user = :tipo');
                    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                    $stmt->bindParam(':tipo', $tipo_user, PDO::PARAM_STR);
                    $stmt->execute();
                    $dados = $stmt->fetch(PDO::FETCH_ASSOC);

                    $senhaHashBanco = $dados["pass_user"];

                    $checkSenha = password_verify($senha, $senhaHashBanco);

                    if ($checkSenha == false) {
                        array_push($erroArray, "A senha está incorreta");
                    }

                    if (count($erroArray) > 0) {
                        foreach ($erroArray as $erros) {
                            echo "<div><p>$erros</p></div>";
                        }
                    } else {
                        // Preenche as variáveis de sessão
                        $_SESSION["email"] = $email;
                        $_SESSION["username"] = $dados["nome_user"];
                        $_SESSION["tipo_user"] = $tipo_user;
                        
                        // --- NOVA LÓGICA DE REDIRECIONAMENTO ---
                        if ($tipo_user === "Donatário") {
                            // Redireciona Donatário
                            header("Location: sites/receber.php"); 
                        } elseif ($tipo_user === "Doador") {
                            // Redireciona Doador
                            header("Location: sites/doacao.php"); 
                        } else {
                            // Prevenção caso caia em alguma outra opção no futuro
                            header("Location: sites/perfil.php");
                        }
                        exit();
                    }
                } catch (PDOException $e) {
                    // Handle errors during db creation
                    echo "Error creating database: " . $sql . "<br>" . $e->getMessage();
                }

                // Close connection
                $conn = null;
            }
            ?>
            <form action="./index.php" method="POST" class="form-cadastro">
                <div class="input-group full-width">
                    <input type="email" id="email" name="email" placeholder=" " required>
                    <label for="email" class="float-label">EMAIL:</label>
                </div>

                <div class="input-group full-width">
                    <input type="password" id="senha" name="senha" placeholder=" " required>
                    <label for="senha" class="float-label">SENHA:</label>
                </div>

                <div class="input-group full-width" id="escolha">
                    <label for="opt-acesso" id="opcao">TIPO DE ACESSO:</label>
                    <select name="opcoes-acesso" id="opt-acesso" required>
                        <option value="">-- Selecione uma opção --</option>
                        <option value="Donatário">Donatário</option>
                        <option value="Doador">Doador</option>
                    </select>
                </div>

                <div class="button-container">
                    <button type="submit" value="login" name="login" class="btn">ENTRAR</button>
                </div>

                <p class="nao-conta">Ainda não possui uma conta?&nbsp;<a href="sites/cadastro.php">Cadastre-se</a></p>
            </form>
            <!-- <a href="../index.html" class="btn-voltar">Voltar</a> -->
        </main>

    </body>
</html>