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
        $idade = $_POST['idade'];
        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $genero = $_POST['genero'];

        if (!$idade = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT)) {
            $erros[] = 'Idade deve ser um numero inteiro';
        }
        if (!$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
            $erros[] = 'Digite um email válido';
        } 
        if ($nome == ''){
            $erros[] = 'Informe seu nome';
        }

        if (!empty($erros)){
            foreach($erros as $erro){
                echo "<li>$erro</li>";
            }
        } else {
            $mensagem = ($genero == 'M') ? "Seja Bem Vindo " : "Seja Bem Vinda" ;
            $mensagem .= " $nome !!!<br> Seu email é $email e sua idade é $idade";
        }
    }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

        <label class="form-label">NOME: </label>
        <input type="text" class="form-control" name='nome' value=''>
        <label class="form-label">EMAIL: </label>
        <input type="text" class="form-control" name='email' value=''>
        <label class="form-label">IDADE: </label>
        <input type="number" class="form-control" name='idade' value='0'>
        <label class="form-label">GENERO: </label>
        <select name="genero" class="form-select" id="genero">
            <option value="M">MASCULINO</option>
            <option value="F">FEMININO</option>

        </select>
        <div class="resultado">
           
            <label class="form-label" id="total"><?php echo $mensagem?></label>
        </div>
        <button type="submit" name="enviar" id="enviar">Enviar</button>

    </form>
</body>

</html>