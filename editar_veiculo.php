<?php
require 'connect.php';


$nome = filter_input(INPUT_POST, 'nome');
$marca = filter_input(INPUT_POST, 'marca');
$modelo = filter_input(INPUT_POST, 'modelo');
$tipo = filter_input(INPUT_POST, 'tipo');
$id = filter_input(INPUT_POST, 'id');

if($id && $nome && $marca && $modelo && $tipo ){
    $sql = $pdo->prepare("UPDATE usuario SET nome = :nome, marca = :marca, modelo = :modelo, tipo = :tipo WHERE id = :id");
    $sql->bindValue(":nome", $nome);
    $sql->bindValue(":marca", $marca);
    $sql->bindValue(":modelo", $modelo);
    $sql->bindValue(":tipo", $tipo);
    $sql->bindValue(":id", $id);
    $sql->execute();

    header("Location: lista.php");
    exit;
}else{
    header("Location: editar.php");
    exit;
}

