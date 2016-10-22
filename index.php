<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Associação dos Moradores de Estreito</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <!-- importa a biblioteca de ícones do font awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

    <?php

        $host = "127.0.0.1"; //localhost
        $user = "erlonpr"; //Your Cloud 9 username
        $pass = ""; //Remember, there is NO password by default!
        $db = "sample_db"; //poderia também ter usado a função mysql_select_db("sample_db");
        $port = 3306; //The port #. It is always 3306

        //conexão com o banco de dados
        $connection = mysqli_connect($host, $user, $pass, $db, $port) or die(mysql_error());

        //filtro de pesquisa dos dados da tabela
        $query_filter = filter_input(INPUT_GET, "btn_filter");

        if($query_filter){
            $query = "SELECT * FROM animals WHERE name LIKE '$query_filter%' ORDER BY name;";
        } else {
            $query = "SELECT * FROM animals ORDER BY name;";
        }

        $result = mysqli_query($connection, $query);


    ?>

</head>

<body>
    <header class="page_header">
        <h1>CADASTRO</h1>
    </header>
    <section class="inside">

        <p>Tabela ANIMALS</p>


        <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></i></span>
            <input class="form-control" type="text" placeholder="Busca">
        </div>

        <?php


            while ($row = mysqli_fetch_assoc($result)) {
                echo $row['id'] . " " . $row['name'] . "<br/>";
            }

            //limpa pesquisa SQL da memória
            mysql_free_result($result);

            //encerra conexão com o banco de dados
            //mysql_close($connection);


        ?>

    </section>
<!-- ----------------------------------------------------------------------- -->
    <footer>
       <p>rodapé do site</p>
    </footer>

    <!-- faz a ligação desta página HTML com a biblioteca jQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- faz a ligação desta página HTML com o documento JavaScript -->
    <script type="text/javascript" language="javascript" src="assets/javascript.js"></script>


</body>

</html>
