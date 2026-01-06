<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CALCULADORA</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h5>FORMULARIO</h5>
    <form action="cap.php" method="get">

        <label class="form-label">Digite um número: </label>
        <input type="number" class="form-control" id='num1' value='0'>
        <label class="form-label">Digite um número: </label>
        <input type="number" class="form-control" id='num2' value='0'>
        <label class="form-label">Selecione a operação: </label>
        <select name="operacao" class="form-select" id="operacao">
            <option value="ad">Adição</option>
            <option value="su">Subtração</option>
            <option value="mu">Multiplicação</option>
            <option value="di">Divisão</option>
        </select>
        <div class="resultado">
            <label class="form-label">Total: </label>
            <label class="form-label" id="total">0</label>
        </div>
        <button type="button" id="calcular">Calcular</button>
        <script src="../js/calcula.js">
            //src indica de onde o HTML buscará o código a ser executado
        </script>
    </form>
</body>

</html>