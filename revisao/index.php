<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revisâo</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="container coluna">
        <div class="qdr">
        <div class="qdrimagem">
            <form class="for meio" action="processa.php" method="POST">
                <h1>Cadastro</h1>
                <input type="text" placeholder="Insira seu nome" name="nome">
                <input type="email" placeholder="Insira seu email" name="email">
                <input type="password" placeholder="Insira seu senha" name="senha">
                <input type="text" placeholder="Insira seu CPF" name="cpf" maxlength="11">
                <input type="date" placeholder="Insira sua data de nascimento" name="data_nascimento">
                <input type="submit" value="enviar">
            </form>
        </div>
        </div>  
    </div>
    
</body>
</html>