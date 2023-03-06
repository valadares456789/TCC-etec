<?php
include('../conexao.php');
 $id = $_GET['id_vencom'];
$fim_ped = "DELETE FROM venda WHERE id_venda =  $id;";
   $stmt_fim = $pdo->prepare($fim_ped);
   $stmt_fim->execute();
    header ("Location: ../menu/menu.php");
    ?>