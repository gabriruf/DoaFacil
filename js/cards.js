document.addEventListener('DOMContentLoaded', function() {
    // 1. Verifica se existe algum pedido salvo na memória do navegador
    const pedidoSalvo = localStorage.getItem('novoPedido');

    if (pedidoSalvo) {
        // Transforma os dados de texto para objeto novamente
        const pedido = JSON.parse(pedidoSalvo);

        // 2. Define qual imagem usar baseado na categoria
        let imagemSrc = '../img/logo-favicon.ico'; // Imagem padrão
        if (pedido.categoria === 'alimento') {
            imagemSrc = '../img/cestaBasica.jpg';
        } else if (pedido.categoria === 'roupa') {
            imagemSrc = '../img/ropaFrio.jpg';
        } else if (pedido.categoria === 'higiene') {
            imagemSrc = '../img/itensHigiene.jpg';
        }

        // 3. Formata o texto da urgência para ficar bonito na tela (Primeira letra maiúscula)
        let urgenciaTexto = '';
        if (pedido.urgencia === 'alta') urgenciaTexto = 'Alta';
        if (pedido.urgencia === 'media') urgenciaTexto = 'Média';
        if (pedido.urgencia === 'baixa') urgenciaTexto = 'Baixa';

        // 4. Esconde APENAS a ilustração e o texto, mantendo o botão na tela
        const ilustracao = document.querySelector('.illustration-container');
        const textoVazio = document.querySelector('.status-message');
            
        if (ilustracao) ilustracao.style.display = 'none';
        if (textoVazio) textoVazio.style.display = 'none';

        // 5. Monta o HTML do novo Card
        const novoCardHTML = `
            <section class="grid-pedidos" style="margin-bottom: 30px; width: 100%;">
                <article class="card">
                    <div class="card-image">
                        <img src="${imagemSrc}" alt="${pedido.categoria}">
                    </div>
                    <div class="card-content">
                        <h2 class="card-title">${pedido.titulo}</h2>
                        <p class="card-description">${pedido.descricao}</p>
                    
                        <div class="card-footer">
                            <span class="priority ${pedido.urgencia}">
                                <span class="dot"></span> ${urgenciaTexto}
                            </span>
                        </div>
                    </div>
                </article>
            </section>
        `;

        // 6. Injeta o card na tela principal (afterbegin faz o card aparecer no topo, acima do botão)
        const mainContainer = document.querySelector('.main-container');
        mainContainer.insertAdjacentHTML('afterbegin', novoCardHTML);

        // 7. Limpa a memória para que o card só apareça dessa vez
        localStorage.removeItem('novoPedido');
        }
    });