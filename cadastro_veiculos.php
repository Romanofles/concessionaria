<?php

require 'connect.php';

$nome = filter_input(INPUT_POST, 'nome');
$modelo = filter_input(INPUT_POST, 'modelo');
$marca = filter_input(INPUT_POST, 'marca');
$tipo = filter_input(INPUT_POST, 'tipo');
//$situacao = filter_input(INPUT_POST, 'situacao');    INSERIR NO PREPARE E NO BindValue DEPOIS

if($nome && $modelo && $marca && $tipo){

    $sql = $pdo->prepare("INSERT INTO usuario (nome, modelo, marca, tipo) VALUES(:nome, :modelo, :marca, :tipo)");
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':modelo', $modelo);
    $sql->bindValue(':marca', $marca);
    $sql->bindValue(':tipo', $tipo);
    //$sql->bindValue(':situacao', $situacao);
    $sql->execute();
    
    header("Location: lista.php");
}else{
    header("Location: cadastro.php");
}




