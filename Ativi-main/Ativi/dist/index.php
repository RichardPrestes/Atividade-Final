<?php include "header.php" ?>


<div class="container mt-5 mb-5">

            <?php

                //Inclui o arquivo de conexão com o Banco de Dados
                include("conexaoBD.php");

                $listarProdutos = "SELECT * FROM Produtos"; //Query para selecionar todos os campos da tabela

                //PHP para trabalhar o filtro

                //Verificar se há algum parâmetro sendo recebido via URL utilizando a função isset()
                if(isset($_GET["filtroProduto"])){
                    $filtroProduto = $_GET["filtroProduto"];
                    
                    if($filtroProduto != "todos"){
                        $listarProdutos = $listarProdutos . " WHERE statusProduto LIKE '$filtroProduto' ";
                    }

                    switch($filtroProduto){
                        case "todos" : $mensagemFiltro = "no total";
                        break;

                        case "disponivel" : $mensagemFiltro = "disponível";
                        break;

                        case "esgotado" : $mensagemFiltro = "esgotados";
                        break;
                    }
                    
                }
                else{
                    $filtroProduto = "todos";
                    $mensagemFiltro = "no total";
                }

                $res = mysqli_query($conn, $listarProdutos); //Executa a query
                $totalProdutos = mysqli_num_rows($res); //Retorna a quantidade de registros

                if($totalProdutos > 0){

                    if($totalProdutos == 1){
                        echo "<div class='alert alert-info text-center'>Há <strong>$totalProdutos</strong> produto $mensagemFiltro!</div>";
                    }
                    else{
                        echo "<div class='alert alert-info text-center'>Há <strong>$totalProdutos</strong> produtos $mensagemFiltro!</div>";
                    }

                }
                else{
                    echo "<div class='alert alert-info text-center'>Não há produtos cadastrados neste sistema!</div>";
                }

                echo "
                    <form name='formFiltro' action='index.php' method='GET'>
                        <div class='form-floating mt-3'>
                            <select class='form-select' name='filtroProduto' required>
                                <option value='todos'"; if($filtroProduto == 'todos'){echo "selected";}; echo ">Visualizar todos os Produtos</option>
                                <option value='disponivel'"; if($filtroProduto == 'disponivel'){echo "selected";}; echo">Visualizar apenas Produtos disponíveis</option>
                                <option value='esgotado'"; if($filtroProduto == 'esgotado'){echo "selected";}; echo">Visualizar apenas Produtos esgotados</option>
                            </select>
                            <label for='filtroProduto'>Selecione um Filtro</label>
                            <br>
                        </div>
                        <button type='submit' class='btn btn-outline-success' style='float:right'><i class='bi bi-funnel'></i>  Filtrar Produtos</button><br>
                    </form>
                ";

            ?>

            <hr>


        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Fancy Product</h5>
                                    <!-- Product price-->
                                    $40.00 - $80.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
</div>

<?php include "footer.php" ?>
