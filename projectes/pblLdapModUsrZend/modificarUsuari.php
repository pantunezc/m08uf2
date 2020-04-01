<?php
    require 'vendor/autoload.php';
    use Laminas\Ldap\Ldap;
    use Laminas\Ldap\Attribute;
    $domini = 'dc=fjeclot,dc=net';
    
    $uid=($_POST['cn']);
    $ou=($_POST['ou']);
    $op=($_POST['opcions']);
    $mod=($_POST['mod']);

    $opcions = [
        'host' => 'zend-paancl.fjeclot.net',
        'username' => "cn=admin,$domini",
        'password' => 'fjeclot',
        'bindRequiresDn' => true,
        'accountDomainName' => 'fjeclot.net',
        'baseDn' => 'dc=fjeclot,dc=net',
    ];
    
    $ldap = new Ldap($opcions);
    echo 'Usuari a modificar amb uid='.$uid.'<br>';
    try{
        $ldap->bind();
        $usuari=$ldap->getEntry('uid=' .$uid.',ou=' .$ou.',dc=fjeclot,dc=net');
        if($usuari==true){
            if ($op=="mobile"){
                Attribute::setAttribute($usuari, 'mobile', $mod);
                $ldap->update('uid=' .$uid.',ou=' .$ou.',dc=fjeclot,dc=net',$usuari);
                echo "Mobile actualitzat amb éxit <br>";
                echo"<b><u>".$usuari["dn"]."</b></u><br>";
                foreach ($usuari as $atribut => $dada) {
                if ($atribut != "dn") echo $atribut.": ".$dada[0].'<br>';
                }
            }
            if ($op=="telephoneNumber"){
                Attribute::setAttribute($usuari, 'telephonenumber', $mod);
                $ldap->update('uid=' .$uid.',ou=' .$ou.',dc=fjeclot,dc=net',$usuari);
                echo "TelephoneNumber actualitzat amb éxit <br>";
                echo"<b><u>".$usuari["dn"]."</b></u><br>";
                foreach ($usuari as $atribut => $dada) {
                if ($atribut != "dn") echo $atribut.": ".$dada[0].'<br>';
                }
                }
            if ($op=="postalAddress"){
                Attribute::setAttribute($usuari, 'postaladdress', $mod);
                $ldap->update('uid=' .$uid.',ou=' .$ou.',dc=fjeclot,dc=net',$usuari);
                echo "PostalAddress actualitzat amb éxit <br>";
                echo"<b><u>".$usuari["dn"]."</b></u><br>";
                foreach ($usuari as $atribut => $dada) {
                if ($atribut != "dn") echo $atribut.": ".$dada[0].'<br>';
                }
                }
            
            
        }
        else{
            echo 'El usuari introduït no existeix';
        }
    }
    catch(exception $e){
        echo "Error de connexió i autenticació<br>";
    }
    
        
        
        
        
    
?>