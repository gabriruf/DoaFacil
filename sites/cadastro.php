<?php 
session_start();
?>

<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CSS/style.css">
        <link rel="stylesheet" href="../CSS/form.css">
        <link rel="icon" type="image/x-icon" href="../img/logo-favicon.ico">
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
            <?php
                if (isset($_POST["login"])) {
                    require_once("../php/database.php"); 
                    try {
                        require_once("../php/tabelaUser.php");

                        $nomeUser = htmlspecialchars($_POST["nome"]);
                        $email = htmlspecialchars($_POST["email"]);
                        $endereco = htmlspecialchars($_POST["endereco"]);
                        $celular = htmlspecialchars($_POST["celular"]);
                        $cep = htmlspecialchars($_POST["cep"]);
                        $tipo_acesso = htmlspecialchars(($_POST["access-type"]));
                        $senha = password_hash($_POST["senha"], PASSWORD_BCRYPT);

                        $erroArray = [];

                        if (empty($nomeUser) OR empty($email) OR empty($endereco) OR empty($celular) OR empty($cep) OR empty($tipo_acesso) OR empty($_POST["senha"]) OR empty($_POST["repetir-senha"])) {
                            array_push($erroArray, "Todos os campos devem ser preenchidos!");
                        }

                        $checkEmail = $conn->query("SELECT email_user FROM doafacil.Users
                                                    WHERE email_user = '$email';");
                        if ($checkEmail->rowCount() > 0) {
                            array_push($erroArray, "E-mail já existe na base de dados!");
                        }

                        if (strlen($_POST["senha"]) < 8) {
                            array_push($erroArray, "Senha deve ter pelo menos 8 digitos!");
                        }

                        if ($_POST["senha"] !== $_POST["repetir-senha"]) {
                            array_push($erroArray, "As senhas digitadas não são as mesmas!");
                        }

                        if (count($erroArray) > 0) {
                            foreach ($erroArray as $error) {
                                echo "<div><p>ERRO: $error</p></div>";
                            }
                        } else {
                            $sql = "INSERT INTO doafacil.Users (nome_user, email_user, endereco_user, cel_user, cep_user, tipo_user, pass_user)
                                VALUES ('$nomeUser', '$email', '$endereco', '$celular', '$cep', '$tipo_acesso', '$senha');";
                            $conn->exec($sql);
                            header("Location: ../index.php");
                            echo "<div><p style='color: #6aff00;'>Cadastro feito com sucesso!</p></div>";

                        }
                    } catch(PDOException $e) {
                        // Handle errors during db creation
                        //echo "Error creating database: " . $sql . "<br>" . $e->getMessage();
                        echo "Error creating table: $sql \n" . $e->getMessage();
                    }

                    // Close connection
                    $conn = null;
                }
            ?>

            <form action="./cadastro.php" method="POST" class="form-cadastro">
                <div class="input-group full-width">
                    <label for="nome">NOME:</label>
                    <input type="text" id="nome" name="nome">
                </div>

                <div class="input-group full-width">
                    <label for="email">EMAIL:</label>
                    <input type="email" id="email" name="email">
                </div>
                <div class="input-group">
                    <label for="celular">CELULAR:</label>
                    <input type="tel" id="celular" name="celular">
                </div>

                <div class="input-group">
                    <label for="endereco">ENDEREÇO:</label>
                    <input type="text" id="endereco" name="endereco">
                </div>
                <div class="input-group">
                    <label for="cep">CEP:</label>
                    <input type="text" id="cep" name="cep">
                </div>

                <div class="input-group">
                    <label for="tipo_acesso">TIPO DE ACESSO:</label>
                    <input type="radio" id="donatario" name="access-type" value="Donatário">
                    <label for="donatario">Donatário</label>

                    <input type="radio" id="doador" name="access-type" value="Doador">
                    <label for="doador">Doador</label>
                </div>

                <div class="input-group">
                    <label for="senha">SENHA:</label>
                    <input type="password" id="senha" name="senha">
                </div>
                <div class="input-group">
                    <label for="confirme-senha">CONFIRME A SENHA:</label>
                    <input type="password" id="repetir-senha" name="repetir-senha">
                </div>

                <div class="button-container">
                    <button type="submit" value="login" name="login" class="btn-criar">CRIAR</button>
                </div>
            </form>
            <!--<a href="../index.html" class="btn-voltar">Voltar</a>-->
        </main>
    </body>
</html>