<?php session_start(); //garante que os dados dessa pagina sejam acessados pelas outras paginas?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Emprego</title>
    <style>
        .form-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
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
                <input type="tel" name="telefone" id="telefoneID" class="form-control" placeholder="(84)9XXXX-XXXX"  required>
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