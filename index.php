<?php session_start(); //garante que os dados dessa pagina sejam acessados pelas outras paginas?>
<<<<<<< HEAD
=======



>>>>>>> 521c95d0632c6989bc0c87654bdfc5300f7caa19
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Emprego</title>
    <style>
<<<<<<< HEAD
        .form-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
=======
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
    $erros=array();             //caso haja algum erro nos dados, sera exibido para o usuario
    $resultado=array();         //parte teste do programa

    require_once("conectdb.php");
    

    if(isset($_POST["enviar"])){    //se e somente se o usuario apertar o botão de enviar ele vai executar essa parte do código
        
        $preenchimento =array(
            'nome'=>$nome=filter_input(type: INPUT_POST, var_name: "nome", filter: FILTER_SANITIZE_FULL_SPECIAL_CHARS),//recebe o valor do nome inserido pelo usuário
            $segundoNome=filter_input(INPUT_POST, "sobrenome", FILTER_SANITIZE_SPECIAL_CHARS),
            $email=$_POST['email'],
            $telefone=filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT),
            $escolaridade=filter_input(INPUT_POST, "escolaridade", FILTER_SANITIZE_SPECIAL_CHARS),
            $curso=filter_input(INPUT_POST, "curso", FILTER_SANITIZE_SPECIAL_CHARS),
            $cargo=filter_input(INPUT_POST, "cargo", FILTER_SANITIZE_SPECIAL_CHARS),
            $habilidade=filter_input(INPUT_POST, "descrição", FILTER_SANITIZE_SPECIAL_CHARS),
        );
        $_SESSION['primeiroNome']=$nome;//agora o nome de usuario esta disponivel para os arquivos durante toda a seção

>>>>>>> 521c95d0632c6989bc0c87654bdfc5300f7caa19
        
        .form-group {
            margin-bottom: 15px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }
        
        .form-group label {
            width: 30%;
            text-align: right;
            padding-right: 15px;
            font-weight: bold;
        }
        
        .form-control {
            width: 65%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        .form-group-flex {
            display: flex;
            gap: 10px;
            width: 65%;
        }
        
        .form-group-flex input {
            flex: 1;
        }
        
        textarea.form-control {
            height: 100px;
            resize: vertical;
        }
        
        .btn-submit {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            margin: 20px auto;
        }
        
        .btn-submit:hover {
            background-color: #45a049;
        }
        
        /* Responsividade */
        @media (max-width: 600px) {
            .form-group label {
                width: 100%;
                text-align: left;
                padding-right: 0;
                margin-bottom: 5px;
            }
            
            .form-control, .form-group-flex {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <h2 style="text-align: center; margin-bottom: 20px;">Formulário de Emprego</h2>
            
            <!-- Nome -->
            <div class="form-group">
                <label for="nomeID">Nome completo:</label>
                <div class="form-group-flex">
                    <input type="text" name="nome" id="nomeID" class="form-control" placeholder="Primeiro nome" required>
                    <input type="text" name="sobrenome" id="sobrenomeID" class="form-control" placeholder="Sobrenome" required>
                </div>
            </div>
            
            <!-- Email -->
            <div class="form-group">
                <label for="emailID">Email:</label>
                <input type="email" name="email" id="emailID" class="form-control" placeholder="usuario@exemplo.com" required>
            </div>
            
            <!-- Telefone -->
            <div class="form-group">
                <label for="telefoneID">Telefone:</label>
                <input type="tel" name="telefone" id="telefoneID" class="form-control" placeholder="(84) 9XXXX-XXXX"  required>
            </div>
            
            <!-- Cargo -->
            <div class="form-group">
                <label for="cargoID">Cargo desejado:</label>
                <input type="text" name="cargo" id="cargoID" class="form-control" required>
            </div>
            
            <!-- Escolaridade -->
            <div class="form-group">
                <label for="escolaridadeID">Escolaridade:</label>
                <div class="form-group-flex">
                    <select name="escolaridade" id="escolaridadeID" class="form-control" onchange="verificarEscolaridade()" required>
                        <option disabled selected value="">Selecione...</option>
                        <option value="FundamentalI">Fundamental incompleto</option>
                        <option value="FundamentalC">Fundamental completo</option>
                        <option value="MédioI">Médio incompleto</option>
                        <option value="MédioC">Médio completo</option>
                        <option value="superiorI">Superior incompleto</option>
                        <option value="superiorC">Superior completo</option>
                    </select>
                    <input type="text" name="curso" id="cursoID" class="form-control" placeholder="Curso (se superior)" disabled>
                </div>
            </div>
            
            <!-- Habilidades -->
            <div class="form-group">
                <label for="descricaoID">Habilidades:</label>
                <textarea name="descricao" id="descricaoID" class="form-control"></textarea>
            </div>
            
            <!-- Currículo -->
            <div class="form-group">
                <label for="curriculoID">Currículo (PDF/DOC):</label>
                <input type="file" name="curriculo" id="curriculoID" class="form-control" accept=".pdf,.doc,.docx" required>
            </div>
            
            <button type="submit" name="enviar" class="btn-submit">Enviar Formulário</button>
        </form>
    </div>
    <?php
    require_once("enviar_arquivos.php");
    ?>

    <script>
    let selecao=true;
    document.getElementById("cursoID").disabled=true;

    //função para verificar se a escolaridade é ensino superior 
    //caso positivo, libera a caixa de preencher o curso

    function verificarEscolaridade(){
        let escolaridade=document.getElementById("escolaridadeID");
        if((escolaridade.value=="superiorI"||escolaridade.value=="superiorC")&&selecao){
            document.getElementById("cursoID").disabled=false;
            document.getElementById("cursoID").focus();
            selecao=false;
        }
    }
    </script>

</body> 