<?php
    require 'vendor/autoload.php';
    use Laminas\Ldap\Ldap;
    
    $domini = 'dc=fjeclot,dc=net';
    $password=($_POST['password']);
    $uid=($_POST['cn']);
    $ou=($_POST['ou']);
    
    $opcions = [
        'host' => 'zend-paancl.fjeclot.net',
        'username' => "cn=admin,$domini",
        'password' => $password,
        'bindRequiresDn' => true,
        'accountDomainName' => 'fjeclot.net',
        'baseDn' => 'dc=fjeclot,dc=net',
    ];
    
    $ldap = new Ldap($opcions);
    echo 'Resultats cerca uid='.$uid. ' i ou='.$ou.'<br>';
    try{
        $ldap->bind();
        $usuari=$ldap->getEntry('uid=' .$uid.',ou=' .$ou.',dc=fjeclot,dc=net');
        if($usuari==true){
            echo"<b><u>".$usuari["dn"]."</b></u><br>";
            foreach ($usuari as $atribut => $dada) {
                if ($atribut != "dn") echo $atribut.": ".$dada[0].'<br>';
        }
        }else{
            echo 'El usuari introduït no existeix';
        }
    
        
        
        
        
    }
    catch(exception $e){
        echo "Error de connexió i autenticació<br>";
    }
?>