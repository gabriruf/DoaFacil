document.addEventListener('DOMContentLoaded', () => {
    const celularInput = document.getElementById('celular');

    celularInput.addEventListener('input', (e) => {
    let valor = e.target.value;

    // 1. Remove tudo o que não é número
    valor = valor.replace(/\D/g, "");

    // 2. Adiciona os parênteses no DDD: (00) 0...
    valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2");

    // 3. Adiciona o hífen no formato correto para celulares: (00) 00000-0000
    valor = valor.replace(/(\d)(\d{4})$/, "$1-$2");

    // Atualiza o valor no input
    e.target.value = valor;
    });

    // --- MÁSCARA DO CEP ---
    const cepInput = document.getElementById('cep');
    cepInput.addEventListener('input', (e) => {
    let valor = e.target.value;
                    
    // 1. Remove tudo o que não é número
    valor = valor.replace(/\D/g, ""); 
                    
    // 2. Adiciona o hífen depois do 5º dígito: 00000-000
    valor = valor.replace(/^(\d{5})(\d)/, "$1-$2"); 
                    
    // Atualiza o valor no input
    e.target.value = valor;
    });
});