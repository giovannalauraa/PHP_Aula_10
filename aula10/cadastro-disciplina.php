<!DOCTYPE html>
<html>
    <head>
        <title>
            Cadastro de Disciplina
        </title>
        <style>
            input, textarea{
                display: block;
            }
        </style>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php require_once "cabecalho.php";?>
        <form method="POST" action="recebe-atualizar-disciplina.php">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome">
            
            <label for="carga">Carga horária:</label>
            <input type="text" name="carga" id="carga">
            
            <label for="Ementa">Ementa:</label>
            <textarea name="ementa" id="ementa" cols="30" rows="5">
            </textarea>
            <button type="submit">Enviar</button>
            
        </form>
    </body>
</html>