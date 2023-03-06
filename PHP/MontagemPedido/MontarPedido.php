<?php
include('../verificarLogin.php');
include('../conexao.php');
include('../Produtos/listaprodfunc.php');
include('carrinho.php');
$precofinal = 0;
$qtn = 0;


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../CSS/MenuMont.css">
    <link rel="stylesheet" type="text/css" href="../../CSS/montarPedido.css">

    <title>Montar Pedido</title>
</head>

<body onload="abrirAba();">

    <!--Menu Horizontal-->
    <div class="headerPedido">




        <div class="SorveteTipo" class="cursor" id="massabtn" onclick="opnMassas()">
            <h1 class="noclick">Massas</h1>
        </div>

        <div class="SorveteTipo" class="cursor" id="picolebtn" onclick="opnPicoles()">
            <h1 class="noclick">Picolés</h1>
        </div>

        <div class="SorveteTipo" class="cursor" id="coberturabtn" onclick="opnCoberturas()">
            <h1 class="noclick">Diversos</h1>
        </div>

        <img src="../../IMG/carrinho.png" class="icones" onclick="abrecar2()" id="carrinhoPedido">

    </div>


    <!-- aba de carrinho -->





    <div class="car-scn" id="car-aba" onmouseleave="fechacar2()">

        <a href="final.php" style="text-decoration: none; color:black;">
            <div> <img src="../../IMG/carrinho.png" class="icones" id="carrinhoPop">
                <p class="txt" style="text-align: center; margin-bottom: 20px;">Abrir Venda</p>
            </div>
        </a>

        <div class="carpop" id="carlist"><?php

if(empty ($_SESSION['carrinho'])){
    $_SESSION['carrinho'] = array();
} 

if(isset($_GET['id_cli']))
{  $_SESSION['id_climont'] = $_GET['id_cli'];
    
    // print_r($_SESSION['id_climont']);
}        


if(isset($_GET['id_prod']))
{

$ids = $_GET['id_prod'];
// echo $ids;


}

if(!empty ($ids) or isset($_GET['deletado']) ){
if (!empty ($ids) ){
array_push ($_SESSION['carrinho'], ($ids));}
if(empty ($_SESSION['carrinho'])){
header ("Location: ../cliente/selecionarcliente.php");
}
print_r($_SESSION['carrinho']);
$select = implode(',',$_SESSION['carrinho'] );

}





                                            // echo $select;
                                            $query = "SELECT * FROM produtos";
                                            $resultadototal = $pdo->prepare($query);
                                            $resultadototal->execute();

                                            while ($linhas_car = $resultadototal->fetch(PDO::FETCH_ASSOC)) { ?>
                <!-- a variavel id passa pelo o link ao invés de um form -->
                <div style="display: none;" class="itemCar" id="cartxt<?php echo $linhas_car["id_prod"]; ?>">



                    <t>





                        <input id="sabor<?php echo $linhas_car["id_prod"]; ?>" value="<?php echo utf8_encode($linhas_car["sabor"]); ?>" class="carQtd" type="hidden"> </input>

                        <input id="<?php echo $linhas_car["id_prod"]; ?>" value="10" class="carQtd" type="hidden"> </input>

                        <input class="carQtd" value=<?php echo $linhas_car["preco_uni"]; ?> type="hidden" name="qtnfunc" id="valor<?php echo $linhas_car["id_prod"]; ?>"> </input>

                        <input class="carQtd" value=0 type="hidden" name="dife" id="diferenca<?php echo $linhas_car["id_prod"]; ?>"> </input>

                        <input class="carQtd" value=0 type="hidden" name="desc" id="desconto<?php echo $linhas_car["id_prod"]; ?>"> </input>

                        <input class="carQtd" value=<?php echo $linhas_car["preco_pacote"]; ?> null type="hidden" id="ppct<?php echo $linhas_car["id_prod"]; ?>"> </input>

                        <input class="carQtd" value=<?php echo $linhas_car["tamanho_pacote"]; ?> null type="hidden" id="tpct<?php echo $linhas_car["id_prod"]; ?>"> </input>

                        <input class="carQtd" value=<?php echo $linhas_car["tamanho_uni"]; ?> null type="hidden" id="tmnu<?php echo $linhas_car["id_prod"]; ?>"> </input>
                        



                    </t>
                </div>

                </script>

            <?php





                                            };

            ?>

        </div>

        <div>
            <p class="total" id="valorTotal"> Total: R$ 0 </p>
        </div>
    </div>
    <!--Conteúdo do Site-->

    <div class="conteudo">


        <!--Tabela de Massas-->
        <div class="tabelaMontagem" style="margin-bottom: 100px;" id="tableM">

            <?php while ($linhas_prod = $resultado1->fetch(PDO::FETCH_ASSOC)) {
                $id = $linhas_prod["id_prod"]; ?>

                <div class="itemTab" id="tabelatxt">
                    <t> <?php

                        echo utf8_encode($linhas_prod["sabor"]);   ?></t>
                    <input id="montpct<?php echo $linhas_prod["id_prod"]; ?>" value="<?php echo $linhas_prod["preco_pacote"]; ?>" class="carQtd" type="hidden"> </input>


                    <?php if ($linhas_prod["preco_pacote"] == NULL) {

                        if ($linhas_prod["tamanho_uni"] == 1) {
                            echo '<a  class="txtdeco" href="montarpedido.php?id_prod='. $linhas_prod["id_prod"] .'"><button  id="carBtn" class="carBtn" onclick="adicionou(' . $linhas_prod["id_prod"] . ')">1L</button></a>  </t></div>';
                        } else if ($linhas_prod["tamanho_uni"] == 2) {
                            echo '<a  class="txtdeco" href="montarpedido.php?id_prod='. $linhas_prod["id_prod"] .'"><button id="carBtn" onclick="adicionou(' . $linhas_prod["id_prod"] . ')" class="carBtn">5L</button> </a>  </t></div>';
                        } else if ($linhas_prod["tamanho_uni"] == 3) {
                            echo '<a  class="txtdeco" href="montarpedido.php?id_prod='. $linhas_prod["id_prod"] .'"><t><button value="', $id, '"id="carBtn" class="carBtn" onclick="adicionou(' . $linhas_prod["id_prod"] . ')" <button  class="carBtn">5L</button> </a>  </t></div>';
                        }
                    }


                    if ($linhas_prod["preco_pacote"] <> NULL) {
                        if ($linhas_prod["tamanho_uni"] == 1) {
                     echo '<a  class="txtdeco" href="montarpedido.php?id_prod='. $linhas_prod["id_prod"] .'"><button  id="carBtn" class="carBtn" onclick="adicionou(' . $linhas_prod["id_prod"] . ')">1L</button></a>  </t></div>';
                        }

                        if ($linhas_prod["tamanho_uni"] == 2) {
                            echo '<a  class="txtdeco" href="montarpedido.php?id_prod='. $linhas_prod["id_prod"] .'"><button  id="carBtn" onclick="adicionou(' . $linhas_prod["id_prod"] . ')" class="carBtn">5L</button> </a>  </t></div>';
                        }
                        if ($linhas_prod["tamanho_uni"] == 3) {
                            echo '<a  class="txtdeco" href="montarpedido.php?id_prod='. $linhas_prod["id_prod"] .'"><t><button"id="carBtn" onclick="adicionou(' . $linhas_prod["id_prod"] . ')" class="carBtn">1L</button> <button onclick="adicionou(' . $linhas_prod["id_prod"] . ')" class="carBtn">5L</button> </a>  </t></div>';
                        }
                    };
                    
                    }; ?>

                </div>

                <!--Tabela de Picolés-->
                <div class="tabelaMontagem" id="tableP">

                    <?php while ($linhas_prod = $resultado2->fetch(PDO::FETCH_ASSOC)) {
                        $id = $linhas_prod["id_prod"];  ?>
                        <div class="itemTab" id="tabelatxt">
                            <t class="sabor"><?php echo utf8_encode($linhas_prod["sabor"]); ?></t>

                        <?php
                        echo '<a  class="txtdeco" href="montarpedido.php?id_prod='. $linhas_prod["id_prod"] .'"><button  value="', $id, '"id="carBtn" class="carBtn" onclick="adicionou(' . $linhas_prod["id_prod"] . ')">+</button></a> </div>';
                    };



                        ?>



                        </div>


                        <!--Tabela de coberturas-->
                        <div class="tabelaMontagem" id="tableC">


                            <?php while ($linhas_prod = $resultado3->fetch(PDO::FETCH_ASSOC)) {
                                $id = $linhas_prod["id_prod"]; ?>
                                <div class="itemTab" id="tabelatxt">
                                    <t class="sabor"><?php echo utf8_encode($linhas_prod["sabor"]); ?></t>

                                <?php
                                echo '<a  class="txtdeco" href="montarpedido.php?id_prod='. $linhas_prod["id_prod"] .'"><button id="carBtn" class="carBtn" onclick="adicionou(' . $linhas_prod["id_prod"] . ')">+</button> </a>  </t></div>';
                            };
                                ?>


                                </div>


                        </div>
                        <div id="bntliscli">

                            <a href="final.php" class="bntFim" onclick="">
                                <div> Finalizar pedido</div>
                            </a>
                        </div>

                        <!--Menu Vertical-->



                        <div id="menuho">
                            <div id="operador">
                                <!-- <img  id="icon" alt=""> -->

                                <?php

                                $avatar = $_SESSION['avatar_session'];

                                echo '<img id="icon" src="' . $avatar . '">';

                                ?>

                                <h1 id="nome"> <?php

                                                $nome_oper = $_SESSION['nome_session'];
                                                echo utf8_encode($nome_oper) ?></h1>

                            </div>




                            <a class="sidebtn" href="../Menu/menu.php"> <img class="imgbtn" src="../../IMG/casinha.png">
                                <div href="#" class="MP">Menu</div>
                                <p class="sairadjustment"></p>
                            </a>
                            <a class="sidebtn" href="../Venda/historico.php"> <img class="imgbtn" src="../../IMG/historico.png">
                                <div href="#" class="MP">Histórico de Vendas</div>
                            </a>
                            <a class="sidebtn" href="../Produtos/ProdutosList.php"> <img class="imgbtn" src="../../IMG/LP.png">
                                <div href="#" class="MP">Lista de Produtos</div>
                            </a>
                            <a class="sidebtn" href="../Cliente/listagemcli.php"> <img class="imgbtn" src="../../IMG/LC.png">
                                <div href="#" class="MP">Lista de
                                    Clientes</div>
                            </a>
                            <a class="sidebtn" href="../logout.php"> <img class="imgbtn" src="../../IMG/EX.png">
                                <div href="#" class="MP">Sair</div>
                                <p id="sairadjustment"></p>
                            </a>
                            <img src="../../IMG/trevoice.png" class="logo" alt="">

                        </div>



                        <script src="../../JAVASCRIPT/controle.js"></script>
                        <script src="../../JAVASCRIPT/Montagem.js"></script>
                        <script src="../../JAVASCRIPT/carrinho.js"></script>
                        <script src="../../JAVASCRIPT/controlepdf.js"></script>
                        <div onload="teste()">


</body>