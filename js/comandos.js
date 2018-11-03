var botaoLimpar = document.querySelector("#limpar");
botaoLimpar.addEventListener("click", function(event) {
    event.preventDefault();
    var filtro = document.getElementById("filtrar-tabela").value;
    document.getElementById("filtrar-tabela").value = "";
    var tabela = document.getElementById("tabela").value;
    window.location = "indexphp.php?filtro=&tabela=" + tabela;
});


var botaoFiltrar = document.querySelector("#filtrar");
botaoFiltrar.addEventListener("click", function(event) {
    event.preventDefault();
    var filtro = document.getElementById("filtrar-tabela").value;
    document.getElementById("filtrar-tabela").value = "";
    var tabela = document.getElementById("tabela").value;
    window.location = "indexphp.php?filtro="
    + filtro + "&tabela=" + tabela;
});
