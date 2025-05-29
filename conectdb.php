<?php

        //antes de criar um db é necessario conectar a base de dados

        /*==============variaveis do servidor================*/
        $nomeServidor='localHost';
        $userNamedb='root';
        $senhadb='';
        $nomedb='formulariodb';
        
        /*=============conexão com o banco de dados============= */
        $conexão=mysqli_connect($nomeServidor, $userNamedb, $senhadb, "banco_de_dados_1");
        
        if (!$conexão) { //checa conexão com o banco de dados
            die("Connection failed: " . mysqli_connect_error());
        }
        else{
            $resultado[]="conexão com o banco de dados estabelecida com sucesso";
        }