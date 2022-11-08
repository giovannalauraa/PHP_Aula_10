<!DOCTYPE html>
    <html>
        <head>
            <title>Todas disciplinas</title>
        </head>
        <body>
        <?php require_once "cabecalho.php";?>
            <h2>Todas as disciplinas</h2>
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Carga Horária</th>
                    <th>Ementa</th>
                    <th>Ações</th>
                </tr>
                <?php
                    require_once "Disciplina.class.php";
                    $objDisciplina = new Disciplina();
                    $disciplinas = $objDisciplina->buscarTodasDisciplinas();
                    
                    foreach($disciplinas AS $dc){
                        echo "<tr>";
                        echo "<td>".$dc["nome"]."</td>";
                        echo "<td>".$dc["cargaHoraria"]."</td>";
                        echo "<td>".$dc["ementa"]."</td>";
                        echo "<td><a href='atualizar-disciplina.php?nome={$dc["nome"]}&carga={$dc["cargaHoraria"]}&ementa={$dc["ementa"]}'>
                        Editar</a> | Excluir</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </body>
</html>