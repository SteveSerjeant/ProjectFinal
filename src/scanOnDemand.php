<?php

if (file_exists("C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultDevices.xml")) {
    $forDelete = "C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultDevices.xml";
    unlink ($forDelete);
}

if (file_exists("C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultDevices.xml")) {
    $forDelete1 = "C:\Program Files\Ampps\www\Security_Dashboard\src\scanResultOS.xml";
    unlink($forDelete1);
}

exec("C:\Program Files\Ampps\www\ProjectFinal\src\scanOnDemand.bat");

filesExist();

function filesExist(){
    if (strpos(file_get_contents("C:\Program Files\Ampps\www\projectVersionTwo\src\scanResultOS.xml"),"</nmaprun>")){
        echo "files exist!";
        sleep(5);
        header('Location: saveScans.php');
    }

    else {
        sleep(60);
        filesExist();
    }

}

?>
