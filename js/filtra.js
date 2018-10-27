var campoFiltro = document.querySelector("#filtrar-tabela");

campoFiltro.addEventListener("input", function() {
    var processos = document.querySelectorAll(".processos");
    if (this.value.length > 0) {
        for (var i = 0; i < processos.length; i++) {
            var processo = processos[i];
            var tdProcesso1 = processo.querySelector(".processo1");
            var tdProcesso2 = processo.querySelector(".processo2");
            var tdProcesso3 = processo.querySelector(".processo3");
            var tdProcesso4 = processo.querySelector(".processo4");
            var tdProcesso5 = processo.querySelector(".processo5");
            var tdProcesso6 = processo.querySelector(".processo6");
            //var tdProcesso7 = processo.querySelector(".processo7");
            var nome1 = tdProcesso1.textContent;
            var nome2 = tdProcesso2.textContent;
            var nome3 = tdProcesso3.textContent;
            var nome4 = tdProcesso4.textContent;
            var nome5 = tdProcesso5.textContent;
            var nome6 = tdProcesso6.textContent;
            //var nome7 = tdProcesso7.textContent;
            var expressao = new RegExp(this.value, "i");
            if ( expressao.test(nome1)
              || expressao.test(nome2)
              || expressao.test(nome3)
              || expressao.test(nome4)
              || expressao.test(nome5)
              || expressao.test(nome6)
            //  || expressao.test(nome7)
            ) {
                processo.classList.remove("invisivel");
            } else {
                processo.classList.add("invisivel");
            }
        }
    } else {
        for (var i = 0; i < processos.length; i++) {
            var processo = processos[i];
            processo.classList.remove("invisivel");

        }
    }
});
