<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        include_once("./criarDB.php"); 

        try {

            $tables = $conn -> query("SHOW TABLES LIKE 'Users'");
            if ($tables->rowCount() < 1) {
                $conn -> query(
                    "CREATE TABLE doafacil.Users (
                        id_user       SERIAL PRIMARY KEY,
                        nome_user     VARCHAR(50),
                        email_user    VARCHAR(70),
                        endereco_user VARCHAR(70),
                        cel_user      VARCHAR(14),
                        cep_user      VARCHAR(9),
                        tipo_user     NUMERIC(1),
                        pass_user     VARCHAR(255)
                    );"
                );
            }

            $email = htmlspecialchars($_POST["email"]);
            $senhaBanco = $conn->exec(
                "SELECT pass_user FROM doafacil.Users
                WHERE email_user = '$email' AND tipo_user = 0;"
            );
            $senha = password_verify($_POST["senhaA"], $senhaBanco);
            
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
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário - Desktop</title>
    <link rel="icon" type="image/x-icon" href="img/logo-favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/CSS/perfil_recebedor.css">
</head>
<body>

    <div class="profile-desktop-container">
        <header class="profile-header">
            <h1>Perfil</h1>
        </header>

        <div class="profile-box">
            
            <div class="user-card">
                <div class="avatar-wrapper">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="user-details">
                    <h2>Maria Silva</h2>
                    <p class="user-email">maria.silva@email.com</p>
                    <a href="#" class="edit-link">Editar perfil</a>
                </div>
            </div>

            <div class="options-list">
                
                <div class="option-item">
                    <div class="option-content">
                        <i class="fa-regular fa-user icon-leading"></i>
                        <span>Meus dados</span>
                    </div>
                    <i class="fa-solid fa-chevron-right icon-trailing"></i>
                </div>

                <div class="option-item">
                    <div class="option-content">
                        <i class="fa-solid fa-location-dot icon-leading"></i>
                        <span>Endereços</span>
                    </div>
                    <i class="fa-solid fa-chevron-right icon-trailing"></i>
                </div>

                <div class="option-item">
                    <div class="option-content">
                        <i class="fa-regular fa-bell icon-leading"></i>
                        <span>Notificações</span>
                    </div>
                    <i class="fa-solid fa-chevron-right icon-trailing"></i>
                </div>

                <div class="option-item">
                    <div class="option-content">
                        <i class="fa-regular fa-circle-question icon-leading"></i>
                        <span>Ajuda e suporte</span>
                    </div>
                    <i class="fa-solid fa-chevron-right icon-trailing"></i>
                </div>

                <a href="/sites/receber.html">
                    <div class="option-item">
                            <div class="option-content">
                                <i class="fa-solid fa-arrow-left icon-leading"></i>
                                <span>Voltar</span>
                            </div>
                        <i class="fa-solid fa-chevron-right icon-trailing"></i>
                    </div>
                </a>

            </div>

            <div class="logout-wrapper">
                <button class="logout-btn">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span>Sair da conta</span>
                </button>
            </div>

        </div>
    </div>

</body>
</html>