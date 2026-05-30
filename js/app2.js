let indice = -1;

document.addEventListener('DOMContentLoaded', function() {
    caregarongs();
});

function caregarongs(){
    let results = "";
    let resultado = document.getElementById("CentroDoacoes")

    
    for (let ong of ongs){
          results +=   `<div class="card-ong">
                            <div class="tituloong">
                                <h1>${ong.nome}</h1>
                            </div>
                            <div class = "logoong">
                                <img src="${ong.img}" alt="Logo da ong ${ong.nome}" width="250">
                            </div>
                            <div class="infoong">
                                <p class= "modadalidade">
                                    ${ong.tem}
                                </p>
                            </div>
                            <div class="saibamaisong">
                                <a href="${ong.link}" target="_blank" rel="external">
                                Saiba mais</a> 
                            </div>
                        </div>`
    }
    resultado.innerHTML = results;
}