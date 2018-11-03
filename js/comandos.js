var botaoLimpar = document.querySelector("#limpar");
botaoLimpar.addEventListener("click", function(event) {
    event.preventDefault();
    var filtro = document.getElementById("filtrar-tabela").value;
    document.getElementById("filtrar-tabela").value = "";
    var tabela = document.getElementById("tabela").value;
    window.location = "indexphp.php?filtro=&tabela=" + tabela + "&oculta=false";
    
});


var botaoFiltrar = document.querySelector("#filtrar");
botaoFiltrar.addEventListener("click", function(event) {
    event.preventDefault();
    var filtro = document.getElementById("filtrar-tabela").value;
    document.getElementById("filtrar-tabela").value = "";
    var tabela = document.getElementById("tabela").value;
    var oculta = document.getElementById("oculta").value;
    window.location = "indexphp.php?filtro="
    + filtro + "&tabela=" + tabela + "&oculta=" + oculta;
});


var ocultarButton = document.querySelector("#ocultarButton");
ocultarButton.addEventListener("click", function(event) {
    event.preventDefault();
    var filtro = document.getElementById("filtrar-tabela").value;
    document.getElementById("filtrar-tabela").value = "";
    var tabela = document.getElementById("tabela").value;
    var oculta = document.getElementById("oculta").value;

    if (oculta=="false") {				
        oculta="true";
    } else {				
        oculta="false";
    }

    console.log(oculta);
    window.location = "indexphp.php?filtro="
    + filtro + "&tabela=" + tabela + "&oculta=" + oculta;
});



