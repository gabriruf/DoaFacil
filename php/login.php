<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        include_once("./criarDB.php"); 

        try {
            include_once("./tabelaUser.php");

            $email = htmlspecialchars($_POST["email"]);
            $senhaBanco = $conn->exec(
                "SELECT pass_user FROM doafacil.Users
                WHERE email_user = '$email' AND tipo_user = 0;"
            );
            $senha = password_verify($_POST["senha"], $senhaBanco);
            
        } catch(PDOException $e) {
            // Handle errors during db creation
            echo "Error creating database: " . $sql . "<br>" . $e->getMessage();
        }

        // Close connection
        $conn = null;
    } else {
        Header("Location: ../index.html");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login DOA FÁCIL</title>
    <link rel="stylesheet" href="/CSS/style.css">
    <link rel="stylesheet" href="/CSS/form.css">
</head>
<body>

    <header class="header">
        <!-- Mantendo o título conforme a imagem de referência -->
        <h1>logar</h1> 
        <nav class="nav">
            <a href="ondedoar.html">SAIBA ONDE DOAR</a> | 
            <a href="#">SOBRE NOS</a> | 
            <a href="#">CONHECIMENTO FINANCEIRO</a>
        </nav>
    </header>

    <main class="container">
        <form action="../sites/perfil_recebedor.php" method="POST" class="form-cadastro">
            
            <!-- Campo de Email -->
            <div class="input-group full-width">
                <label for="email">EMAIL:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <!-- Campo de Senha -->
            <div class="input-group full-width">
                <label for="senha">SENHA:</label>
                <input type="password" id="senha" name="senha" required>
            </div>

            <!-- Botão Entrar -->
            <div class="button-container">
                  <button type="submit" class="btn">ENTRAR</button>
            </div>
            
        </form>
        <a href="/index.html" class="btn-voltar">Voltar</a>

        <?php 
            if ($senha == false) {
                echo "<h3 style='color: #ff2222'>Erro no login</h3>";
            } else {
            }
        ?>
                
        

    </main>

</body>
</html>