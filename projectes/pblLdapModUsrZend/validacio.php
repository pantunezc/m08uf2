<?php
    require 'vendor/autoload.php';
    use Laminas\Ldap\Ldap;
    
    $domini = 'dc=fjeclot,dc=net';
    $password=($_POST['password']);
    
    
    $opcions = [
        'host' => 'zend-paancl.fjeclot.net',
        'username' => "cn=admin,$domini",
        'password' => $password,
        'bindRequiresDn' => true,
        'accountDomainName' => 'fjeclot.net',
        'baseDn' => 'dc=fjeclot,dc=net',
    ];
    
    $ldap = new Ldap($opcions);
    
    try{
        $ldap->bind();           
        echo header('Location: opcionsAdmin.html');
    }
    catch(exception $e){
        echo "Error de connexió i autenticació<br>";
    }
?>