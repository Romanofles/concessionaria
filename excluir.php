<?php

require 'connect.php';

$id = filter_input(INPUT_GET, 'id');

if($id){
    $sql = $pdo->prepare("DELETE FROM usuario WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();
}
$_SESSION['msg'] = "<p style='color:green;'>Usuário apagado com sucesso</p>";
header("Location: lista.php");

?>