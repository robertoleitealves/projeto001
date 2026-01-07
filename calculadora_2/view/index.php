<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CALCULADORA</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h5>CALCULADORA</h5>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <?php
        $total = 0;
        if (isset($_POST['calcular'])) {
            $erros = array();
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $operacao = $_POST['operacao'];

            if (!$num1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_INT) and !$num2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_INT)) {
                $erros[] = 'Apenas numeros!';
            }

            if ($operacao == "AD") {
                $total = $num1 + $num2;
            } else if ($operacao == "SU") {
                $total = $num1 - $num2;
            } else if ($operacao == "MU") {
                if ($num1 > 0 and $num2 > 0) {
                    $total = $num1 * $num2;
                }
            } else if ($operacao == "DI") {
                if ($num1 > 0 and $num2 > 0) {
                    $total = $num1 / $num2;
                } else {
                    $erros[] = 'Divisão apenas por numeros maiores que 0!';
                }
            }
        }
        ?>
        <label class="form-label">Digite um número: </label>
        <input type="number" class="form-control" name='num1' value='0'>
        <label class="form-label">Digite um número: </label>
        <input type="number" class="form-control" name='num2' value='0'>
        <label class="form-label">Selecione a operação: </label>
        <select name="operacao" class="form-select" id="operacao">
            <option value="AD">Adição</option>
            <option value="SU">Subtração</option>
            <option value="MU">Multiplicação</option>
            <option value="DI">Divisão</option>
        </select>
        <div class="mensagens">
            <?php
                if (!empty($erros)) {
                    foreach ($erros as $erro) {
                        echo "<li>$erro</li><br>";
                    }
                }
                ?></div>
        <div class="resultado">

            <label class="form-label">Total: </label>
            <label class="form-label" id="total"><?php echo $total; ?></label>
        </div>
        <button type="submit" name="calcular" id="calcular">Calcular</button>

    </form>
</body>

</html>