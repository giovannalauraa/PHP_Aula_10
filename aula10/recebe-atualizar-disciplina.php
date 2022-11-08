<?php
    require_once "Disciplina.class.php";
    $nome = $__POST["nome"];
    $ementa = $__POST["ementa"];
    $carga = $__POST["carga"];

    $obj = new Disciplina($nome, $carga, $ementa);
    $obj->atualizarDisciplina();
    header("Location: todas-disciplinas.php"); //Redireciona


    ?>