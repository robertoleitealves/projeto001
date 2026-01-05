var calcular = document.getElementById('calcular');

calcular.addEventListener('click', function () {
    var n1 = parseFloat(document.getElementById('num1').value);
    var n2 = parseFloat(document.getElementById('num2').value);
    var operacao = document.getElementById('operacao').value;
    var total = 0;

    if (operacao == 'ad') {
        total = adicao(n1, n2);
    } else if (operacao == 'su') {
        total = subtracao(n1, n2);
    } else if (operacao == 'mu') {
        total = multiplicacao(n1, n2);
    } else if (operacao == 'di') {
        total = divisao(n1, n2);
    }

    document.getElementById('total').innerText = total;
    document.getElementById('num1').value = 0;
    document.getElementById('num2').value = 0;
});

function adicao(a, b) {
    return a + b;
}

function subtracao(a, b) {
    return a - b;
}

function divisao(a, b) {
    if (b === 0) return "Erro: Divisão por zero";
    return a / b;
}

function multiplicacao(a, b) {
    return a * b;
}