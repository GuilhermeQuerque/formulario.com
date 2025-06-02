<?php
require "/conf/conf_email.php";
//configuração da mensagem

$mail->setFrom(address: 'nao-responda@gmail.com', name: 'Formulario de Currículo');    //define remetente e nome do mesmo
$mail->addAddress(address: "guirineuqazwsxx@gmail.com");                   //define destinatario
$mail->isHTML(isHtml: true);
$mail->Subject = "Curriculo recebido!";                                                //define assunto do mail
$mail->Body = "
    <h3>Novo curriculo enviado</h3><br>
    Nome: $nome $segundoNome<br>
    mail: $email<br>
    Telefone: $telefone<br>
    Cargo: $cargo";

$mail->addStringAttachment(string: $conteudoCurriculo, filename: $nomeArquivo);        //envia arquivo de curriculo

$mail->send();
return true;
