# Formulario para candidatura de vaga
Esse programa leva em consideração que já existe um banco de dados instalado.

## Pre-requisitos:
- [Composer](https://getcomposer.org/) (para gerenciamento de dependências)
- [PostgreSQL](https://www.postgresql.org/) (versão 12 ou superior)
- Servidor web (Apache/Nginx) com PHP 7.4+

## Instalação/uso do formulario.php
1. Clone o repositório:
```bash
git clone https://github.com/GuilhermeQuerque/formulario.com/tree/main
```
2. Instale as dependencias
```bash
composer install
composer update
```
3. configure o envio de email em conf/conf_email.php
```
$clientID=''        ID do servidor
$clientSecret='';   código secret do servidor de envio
$refreshToken='';   código de refresh
$emailClient='';    email de quem esta enviando
```

## Estrutura do Banco de Dados
- É importante ter um banco de dados passivel de conexão
- O sistema ira criar uma tabela e as colunas caso necessário com os seguintes parametros

    Informações pessoais (nome, e-mail, telefone)

    Dados acadêmicos (escolaridade, curso)

    Cargo desejado

    Habilidades/Observações

    Currículo em formato binário

    Metadados (data de inscrição, IP)


  ## Como Usar

    Acesse index.php no navegador

    Preencha o formulário

    Envie sua candidatura

    Os dados serão armazenados no banco PostgreSQL

    Um e-mail de confirmação será enviado (se configurado)

## funcionalidades extras
- Campo condicional de curso:

    Aparece automaticamente quando seleciona "Graduação"

- Validação inteligente:

    Todos os campos obrigatórios

    Formatos específicos (e-mail e telefone)

    Tamanho máximo de arquivo (1MB)

- Segurança:

    Proteção contra SQL injection

    Validação de tipos de arquivo(pdf, doc e dox)


# OBSERVAÇÔES
1. Tomei a liberdade de mudar o campo observações por habilidades onde o usuario descreve suas habilidades e proprias observações
2. Eu não consegui fazer o envio de email, mas deixei o arquivo "enviar_email.php" no projeto para caso haja um token proprio da empresa, ser inserido
