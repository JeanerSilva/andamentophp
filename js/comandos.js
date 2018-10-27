var botaoLimpar = document.querySelector("#limpar");
botaoLimpar.addEventListener("click", function(event) {
    event.preventDefault();
    var filtro = document.getElementById("filtrar-tabela").value;
    document.getElementById("filtrar-tabela").value = "";
});
