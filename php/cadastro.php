<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        include_once("./criarDB.php"); 

        try {
            include_once("./tabelaUser.php");

            $nomeUser = htmlspecialchars($_POST["nome"]);
            $email = htmlspecialchars($_POST["email"]);
            $endereco = htmlspecialchars($_POST["endereco"]);
            $celular = htmlspecialchars($_POST["celular"]);
            $cep = htmlspecialchars($_POST["cep"]);
            $tipo_acesso = intval(htmlspecialchars(($_POST["access-type"])));
            $senha = password_hash($_POST["senha"], PASSWORD_BCRYPT);

            $sql = "INSERT INTO doafacil.Users (nome_user, email_user, endereco_user, cel_user, cep_user, tipo_user, pass_user)
                    VALUES ('$nomeUser', '$email', '$endereco', '$celular', '$cep', '$tipo_acesso', '$senha');";
            $conn->exec($sql);
        } catch(PDOException $e) {
            // Handle errors during db creation
            //echo "Error creating database: " . $sql . "<br>" . $e->getMessage();
            echo "Error creating table: $sql \n" . $e->getMessage();
        }

        // Close connection
        $conn = null;
    }
?>

<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/CSS/style.css">
        <link rel="stylesheet" href="/CSS/form.css">
        <link rel="icon" type="image/x-icon" href="/img/logo-favicon.ico">
        <title>Cadastro - DOA FÁCIL</title>
    </head>
    <body>

        <header class="header">
            <h1>CADASTRE - SE</h1>
            <nav class="nav">
                <a href="../sites/ondedoar.html">SAIBA ONDE DOAR</a> | 
                <a href="#">SOBRE NOS</a> | 
                <a href="#">CONHECIMENTO FINANCEIRO</a>
            </nav>
        </header>
        
        <main class="container">
            <form action="../php/cadastro.php" method="POST" class="form-cadastro">
                <div class="input-group full-width">
                    <label for="nome">NOME:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>

                <div class="input-group full-width">
                    <label for="email">EMAIL:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="celular">CELULAR:</label>
                    <input type="tel" id="celular" name="celular" required>
                </div>

                <div class="input-group">
                    <label for="endereco">ENDEREÇO:</label>
                    <input type="text" id="endereco" name="endereco" required>
                </div>
                <div class="input-group">
                    <label for="cep">CEP:</label>
                    <input type="text" id="cep" name="cep" required>
                </div>

                <div class="input-group">
                    <label for="tipo_acesso">TIPO DE ACESSO:</label>
                    <input type="radio" id="donatario" name="access-type" value="0" required>
                    <label for="donatario">Donatário</label>

                    <input type="radio" id="doador" name="access-type" value="1" required>
                    <label for="doador">Doador</label>
                </div>

                <div class="input-group">
                    <label for="senha">SENHA:</label>
                    <input type="password" id="senha" name="senha" required>
                </div>
                <div class="input-group">
                    <label for="confirme-senha">CONFIRME A SENHA:</label>
                    <input type="password" id="confirme-senha" name="confirme-senha" required>
                </div>

                <div class="button-container">
                    <button type="submit" class="btn-criar">CRIAR</button>
                </div>
            </form>
            <a href="/index.html" class="btn-voltar">Voltar</a>
        </main>
    </body>
</html>