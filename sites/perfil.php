<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário - Desktop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/CSS/perfil.css">
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
                    <!--<h2>Maria Silva</h2>-->
                    <h2><?php ?></h2>
                    
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

                <div class="option-item">
                    <div class="option-content">
                        <a href="doacao.html">
                        <i class="fa-solid fa-circle-info icon-leading"></i>
                        <span>Voltar</span>
                        </a>
                    </div>
                    <i class="fa-solid fa-chevron-right icon-trailing"></i>
                </div>

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