<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMULARIO</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h5>FORMULARIO</h5>

    <?php
    $mensagem = '';
    if (isset($_POST['enviar'])) {
        $erros = array();

        $nome_sujo = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
        $nome = preg_replace("/[^a-zA-ZÀ-ÿ\s]/u", "", $nome_sujo);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $erros[] = 'Informe um e-mail válido';
        }
        $idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);
        if (!filter_var($idade, FILTER_VALIDATE_INT)) {
            $erros[] = 'Idade deve ser um numero inteiro';
        }

        if ($nome == '') {
            $erros[] = 'Informe seu nome';
        }
        if (empty($erros)) {

            $mensagem .= "Olá $nome !!!<br> Seu email é $email e sua idade é $idade";
        }
    }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

        <label class="form-label">NOME: </label>
        <input type="text" class="form-control" name='nome' value=''>
        <label class="form-label">EMAIL: </label>
        <input type="text" class="form-control" name='email' value=''>
        <label class="form-label">IDADE: </label>
        <input type="text" class="form-control" name='idade' value='0'>
        <div class="resultado">
            <label class="form-label" id="total"><?php echo $mensagem ?></label>
            <?php
            if (!empty($erros)) {
                foreach ($erros as $erro) {
                    echo "<li>$erro</li><br>";
                }
            }
            ?>
        </div>
        <button type="submit" name="enviar" id="enviar">Enviar</button>

    </form>
</body>

</html>