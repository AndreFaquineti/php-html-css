<!DOCTYPE html>
<html>
<head>
    <title>Calculadora PHP</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../darkmode_geral.css">
</head>
<body>
    <p><h2><a href="../">Pagina Inicial</a></h2></p>
    <p><h1>Calculadora Soma PHP</h1></p>
    <form method="post" action="">
        <label for="num1">Numero 1:</label>
        <input type="int" name="num1"> <br><br>
        <label for="num2">Numero 2:</label>
        <input type="int" name="num2"> <br><br>
        <input type="submit"> <br><br>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['num1']) && !empty($_POST['num2'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
        }
        if (!isset($num1) OR !isset($num2)) {
            $num1 = 0;
            $num2 = 0;
        }
        $resultado = $num1 + $num2;
        echo 'Resultado: ' . $resultado;
    }
    ?>
</body>
</html>