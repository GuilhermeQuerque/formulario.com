<?php session_start(); //garante que os dados dessa pagina sejam acessados pelas outras paginas?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario para curriculo</title>
    <style>
    table, th, td {
  border: 1px solid lightgray;
  height: 50px;
  
}
table{
    width: 70%; 
}
input {
  width: 97%;
  height: 50%;
      background-color:rgb(235, 235, 235);

}

</style>
</head>

<body>
 <h1 align="center">Formulario de emprego</h1><br>

 <!--define o formato do formulario ps:enctype é necessario para arquivos-->
 <form action="<?php echo $_SERVER['PHP_SELF'];?>", method ="POST" enctype="multipart/form-data"> 
 
    <table align="center">
        <tr style="background-color: gray;">    <!-- primeiro table row nome e sobrenome -->
            <th><label for="nomeID"> Insira seu nome: </label></th>
            <td><input type="text" name="nome" id="nomeID" placeholder="Primeiro nome" autofocus sim style="width: 30%;"><input type="text" name="sobrenome" id="sobrenomeID" placeholder="sobrenome" sim style="width: 50%;"></td>
        </tr>
        
        <tr style="background-color: lightgray;">
            <th><label for="emailID">Insira seu email:</label></th>
            <td><input type="email" name="email" id="emailID" size="45" placeholder="usuario@exemplo.com" sim></td>
        </tr>
        
        <tr style="background-color: gray;">
            <th><label for="telefoneID">número de telefone</label></th>
            <td><input type="tel" name="telefone" id="telefoneID" placeholder="(84) 9XXXX-XXXX" sim></td> <!-- oninput="return mascarar(this, event, 'telefoneID')"-->
        </tr>

        <tr style="background-color: lightgray;">
            <th><label for="cargoID">Insira o cargo desejado</label></th>
            <td><input type="text" name="cargo" id="cargoID" sim></td>
        </tr>

        <tr style="background-color: gray;">
            <th><label for="escolaridadeID">Grau de escolaridade:</label></th>

            <td><select onclick="verificarEscolaridade()" name="escolaridade" id="escolaridadeID" style="width: 45%; background-color: gray; border: 2px solid black">
                <option disabled selected value="" >Escolha uma opção</option>
                <option value="FundamentalI">Fundamental incompleto</option>
                <option value="FundamentalC">Fundamental completo</option>
                <option value="MédioI">Médio incompleto</option>
                <option value="MédioC">Médio completo</option>
                <option value="superiorI">Superior incompleto</option>
                <option value="superiorC">Superior completo</option>
                        <!-- ideia para acrescentar: se o grau for "superior" adicionar uma caixa de texto para o curso -->
            </select> <input type="text" name="curso" id="cursoID"  style="width: 50%;" placeholder="Curso" ></td>
        </tr>

        <tr style="background-color: lightgray;">
            <th><label for="descriçãoID">Descreva suas habilidades</label></th>
            <td><textarea name="descrição" id="descriçãoID" style="width:95%; height: 70px; background-color: f0f0f0;"></textarea></td>
        </tr>

        <tr style="background-color: gray;">
            <th><label for="documentosID[]">Insira documentos que <br>comprovem suas habilidades<br>(opcional)</label></th>
            <td><input type="file" name="documentos[]" id="documentosID[]" multiple style="background-color:gray"></td>
        </tr>
        
        <tr style="background-color: lightgray;">
            <th><label for="curriculoID">Insira seu curriculo</label></th>
            <td><input type="file" name="curriculo" id="curriculoID" sim style="background-color:lightgray"></td>
        </tr>
        
        
    </table>
    
    <table align="center" style="border:0"  >
        <th style="border:0"><button style="margin-top: 10px" type="submit" name="enviar" id="enviarID" >enviar formulario</button></th>
    </table>
 </form>
<h2 align="center"> agora só falta mesmo a parte php de banco de dados</h2>
<h3 align="center">e talvez um css alí no meio do caminho</h3>
  
</body>
</html>


<?php
    

    if(isset($_POST["enviar"])){    //se e somente se o usuario apertar o botão de enviar ele vai executar essa parte do código
        $erros=array();             //caso haja algum erro nos dados, sera exibido para o usuario
        $resultado=array();         //parte teste do programa
        
        $preenchimento =array(
            'nome'=>$nome=filter_input(type: INPUT_POST, var_name: "nome", filter: FILTER_SANITIZE_FULL_SPECIAL_CHARS),//recebe o valor do nome inserido pelo usuário
            $segundoNome=filter_input(INPUT_POST, "sobrenome", FILTER_SANITIZE_SPECIAL_CHARS),
            $email=$_POST['email'],
            $telefone=filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT),
            $cargo=filter_input(INPUT_POST, "cargo", FILTER_SANITIZE_SPECIAL_CHARS),
            $habilidade=filter_input(INPUT_POST, "descrição", FILTER_SANITIZE_SPECIAL_CHARS),
        );
        $_SESSION['primeiroNome']=$nome;//agora o nome de usuario esta disponivel para os arquivos durante toda a seção

        //antes de criar um db é necessario conectar a base de dados

        /*==============variaveis do servidor================*/
        $nomeServidor='localHost';
        $userNamedb='root';
        $senhadb='';
        $nomedb='formulariodb';

        /*===============conexão com o servidor==============*/

        $conexão=mysqli_connect($nomeServidor, $userNamedb, $senhadb); //estabelece conexão com o servidor

        if (!$conexão) { //chega conexão com o servidor
            die("Connection failed: " . mysqli_connect_error());
        }

        /*==============criando bando de dados============= */

        $sql="CREATE DATABASE bando_de_dados_1"; //defino um código de SQL para a variavel que vai ser usado para criar db

        if(mysqli_query($conexão, $sql)){//manda um comando para o sql que nesse caso é para criar o banco de dados
            $resultado[]="db criado com sucesso";
        }
        else{
            echo "Error creating database: " . mysqli_error($conexão);
        }
        /*===============manipulando o banco de dados=========*/


        



        var_dump($preenchimento);
        echo "<br><br>";

        
        
        
        /**
         * os arquivos vão ser os ultimos a serem mexidos
         */
        $nomeArquivo=$_FILES['documentos']['name']; //aqui vai estar um array com todos os nomes dos arquivos inseridos

        $formatos= array("pdf", "docx", "doc");     //formatos que serão aceitos para os documentos requistados
            
            /*laço de repetição para teste e armazenamento de cada arquivo comprobatorio */
            for ($i=0; $i<sizeof($nomeArquivo); $i++){ 

                $extensao=pathinfo($_FILES["documentos"]["name"][$i], PATHINFO_EXTENSION);
                if(in_array($extensao, $formatos)){    //verifica se a extensão do arquivo confere dentro dos requisitados
                    $tamanhoArquivo=$_FILES["documentos"]["size"][$i];

                    $arquivoTemp=$_FILES["documentos"]["tmp_name"][$i]; //variavel onde é armazenado o nome do arquivo
                    $diretorioCertificados="certificados/";             //diretorio onde os arquivos vão ser armazenados
                    if($tamanhoArquivo/1000000<1){    //verifica se o arquivo tem pelo menos 1 MB

                /*
                *   futuramente invés de mover o arquivo para uma pasta, mover para um banco de dados
                if(move_uploaded_file($arquivoTemp, "$diretorioCertificados ".uniqid()."$nome.$extensao")){//move o arquivo para o diretorio e verifica se deu certo
                $resultado[]="arquivo enviado com sucesso!";
            }
            else{
                $erros[]="erro ao enviar arquivo! $nomeArquivo[$i]";
        }
        */echo "deu certo! mas lembra de botar o arquivos lá";
                    }
                    else{
                        $erros[]='Arquivo "'.$nomeArquivo[$i].'" muito grande! Por favor insira um arquivo com menos de 1MB';
                    }
                }
                else{
                    $erros[]="formato de arquivo não permitido para ".$_FILES["documentos"]["name"][$i]." por favor insira um formato válido";
                }
            }
        
        }


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

?>

<script>
    let selecao=true;
    document.getElementById("cursoID").disabled=true;

    function verificarEscolaridade(){
        let escolaridade=document.getElementById("escolaridadeID");
        if((escolaridade.value=="superiorI"||escolaridade.value=="superiorC")&&selecao){
            document.getElementById("cursoID").disabled=false;
            document.getElementById("cursoID").focus();
            console.log("deu certo");
            selecao=false;
        }
    }

    //função para adicionar automaticamente os caracteres do telefone continuar depois
function mascarar(thisTelefone, evento, telefoneID){

    let telefone = thisTelefone.value; //variavel telefone
    
    //array para desativar a funcionalidade da mascara
    let onAndOff=[true, true, true, true];


    // Aplica a máscara
    if (telefone.length == 1){
        telefone = '(' + telefone.substring(0, 2);
        onAndOff[0]=false;
    }
    if (telefone.length == 3) {
        telefone += ') ' + telefone.substring(3, 4);
    }
    if (telefone.length == 9) {
        telefone += telefone.substring(7, 11) + '-';
    }
    if (telefone.length > 14) {
        telefone += telefone.substring(12, 16);
    }
    
    // Limita ao tamanho máximo (14 caracteres: (99) 99999-9999)
    this.telefone = telefone.substring(0, 14);
};
</script>