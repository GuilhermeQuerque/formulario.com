<?php
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1); // Se usando HTTPS
ini_set('session.cookie_samesite', 'Strict');
session_start();
require 'vendor/autoload.php';

$clientId = '655242797131-okibk257g4nhnrv9morlaehc6jtqgct3.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/formulario.com-1/oauth2callback';

$provider = new League\OAuth2\Client\Provider\Google([
    'clientId'     => $clientId,
    'clientSecret' => $clientSecret,
    'redirectUri'  => $redirectUri,

]);


var_dump($_SESSION);


if (!isset($_GET['code'])) {
    // Redireciona para o consentimento
    $authUrl = $provider->getAuthorizationUrl([
        'scope' => ['https://mail.google.com/'],
        'access_type' => 'offline',
    ]);
    $_SESSION['oauth2state'] = $provider->getState();
    header('Location: ' . $authUrl);
    exit;
} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
    unset($_SESSION['oauth2state']);
    exit('Estado inválido');
} else {
    // Obtém o token
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);
    
    echo "Refresh Token: " . $token->getRefreshToken();
}
?>
