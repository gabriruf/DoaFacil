<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perfil do Usuário - Desktop</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="../CSS/perfil.css">
        <link rel="icon" type="image/x-icon" href="../img/logo-favicon.ico">
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
                        <?php
                        echo '<h2>' . $_SESSION["username"] . '</h2>';
                        echo '<p class="user-email">' . $_SESSION["email"] . '</p>';
                        echo '<p class="user-type">' . $_SESSION["tipo_user"] . '</p>';
                        ?>
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

                    <a href="doacao.html" style="text-transform: capitalize"> <!-- provisorio até descobrir a causa. Sem o "capitalize", ele fica com o texto inteiro em caixa alta, mesmo explicitando no CSS para não deixar em caixa alta. -->
                        <div class="option-item">
                            <div class="option-content">
                                <i class="fa-solid fa-circle-info icon-leading"></i>
                                <span>Voltar</span>
                            </div>
                            <i class="fa-solid fa-chevron-right icon-trailing"></i>
                        </div>
                    </a>


                    <!--
                    <a href="doacao.html">
                        <div class="option-item">
                            <div class="option-content">
                                <i class="fa-solid fa-circle-info icon-leading"></i>
                                <span>Voltar</span>
                            </div>
                            <i class="fa-solid fa-chevron-right icon-trailing"></i>
                        </div>
                    </a>
-->

                </div>

                <div class="logout-wrapper">
                    <a href="../php/logout.php" class="logout-btn">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <span>Sair da conta</span>
                    </a>
                </div>

            </div>
        </div>

    </body>
</html>