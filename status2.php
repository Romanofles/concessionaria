<?php

        $con=mysqli_connect("localhost","root","","locadora");
  
        if (isset($_GET['id'])){
      
            $id=$_GET['id'];

            $sql="UPDATE `usuario` SET 
                `situacao`=0 WHERE id='$id'";
      
            mysqli_query($con,$sql);
        }
      
        header('location: lista.php');
?>
