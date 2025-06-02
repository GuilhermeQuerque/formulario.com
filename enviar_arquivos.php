
<?php
    if(isset($_POST["enviar"])){    //varifica se foi apertado o botão enviar no formulario
        $erros=array();             //variavel para exibir erros
        $resultado=array();         //variavel para armazenar os sucessos
        
        //filtrando e definindo variaveis do input
        $nome=filter_input(type: INPUT_POST, var_name: "nome", filter: FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $segundoNome=filter_input(INPUT_POST, "sobrenome", FILTER_SANITIZE_SPECIAL_CHARS);
        $email=filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $telefone=filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
        $escolaridade=filter_input(INPUT_POST, "escolaridade", FILTER_SANITIZE_SPECIAL_CHARS);
        $curso=filter_input(INPUT_POST, "curso", FILTER_SANITIZE_SPECIAL_CHARS);
        $cargo=filter_input(INPUT_POST, "cargo", FILTER_SANITIZE_SPECIAL_CHARS);
        $habilidade=filter_input(INPUT_POST, "descrição", FILTER_SANITIZE_SPECIAL_CHARS);
        $ipUsuario = $_SERVER['REMOTE_ADDR'];
        
        //conectando ao banco de dados e preparando o comando de armazenamento para o sql
        require_once("/conf/connect_db.php");
        $sql = $conexao->prepare("INSERT INTO guilhermedb(PRIMEIRO_NOME, SEGUNDO_NOME, EMAIL, TELEFONE, ESCOLARIDADE, CURSO, CARGO, HABILIDADES, HORA_INSCRICAO, DOCUMENTO, IP)
                                VALUES (:nome, :segundoNome, :email, :telefone, :escolaridade, :curso, :cargo, :habilidade, :hora, :conteudo, :ip)");
                

        
        $nomeArquivo=$_FILES['curriculo']['name']; //armazena o nome do arquivo enviado
        $formatos= array("pdf", "docx", "doc");     //define os formatos aceitos para o arquivo
        $extensao=pathinfo($_FILES["curriculo"]["name"], PATHINFO_EXTENSION); //armazena o formato do arquivo
        $tamanhoArquivo=$_FILES["curriculo"]["size"]; //armazena o tamanho do arquivo
        $arquivoTemp=$_FILES["curriculo"]["tmp_name"];//armazena a localização atual do arquivo

        if(in_array($extensao, $formatos)){    //verifica se o formato do arquivo é aceito

            if($tamanhoArquivo/1000000 < 1) {//verifica se o tamanho do arquivo é menor que 1MB

                $conteudoCurriculo = file_get_contents($arquivoTemp); //variavel que armazena o arquivo
                $horaInscricao = date('Y-m-d H:i:s');   //horario de inscrição

                //enviado todos os arquivos para o banco de dados
                $sql->bindParam(':nome', $nome);
                $sql->bindParam(':segundoNome', $segundoNome);
                $sql->bindParam(':email', $email);
                $sql->bindParam(':telefone', $telefone);
                $sql->bindParam(':escolaridade', $escolaridade);
                $sql->bindParam(':curso', $curso);
                $sql->bindParam(':cargo', $cargo);
                $sql->bindParam(':habilidade', $habilidade);
                $sql->bindParam(':hora', $horaInscricao);
                $sql->bindParam(':conteudo', $conteudoCurriculo, PDO::PARAM_LOB);
                $sql->bindParam(':ip', $ipUsuario);

                //verificando o envio dos dados 
                if($sql->execute()){
                    $resultado[]="dados enviado com sucesso!";
                }
                else{
                    $erros[]="erro ao enviar!";
                }

            }
            else{
                $erros[]='Arquivo "'.$nomeArquivo[$i].'" muito grande! Por favor insira um arquivo com menos de 1MB';
            }
        }
        else{
            $erros[]="formato de arquivo ".$extensao." não permitido por favor insira um arquivo válido";
        }
        require_once("enviar_email.php"); 

    }

    //exibe resultados possitivos ou negativos caso haja algum
    if(!empty($erros)){
        foreach($erros as $i1){
            echo "<li style='color:red;'>$i1</li>";
        }
    }
    echo"<br>";
    if(!empty($resultado)){
        foreach($resultado as $i){
            echo "<br>".$i;
        }
    }