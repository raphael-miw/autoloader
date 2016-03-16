<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 14/03/16
 * Time: 22:22
 */

function inverser1($chaine) {
    $chaine_retour = "";
    for($i = 0;$i<strlen($chaine);$i++) {
        $chaine_retour = $chaine[$i].$chaine_retour;
    }
    return $chaine_retour;
}
function inverser2($chaine) {
    $chaine_retour = "";
    for($i = strlen($chaine);$i>0;$i--) {
        $chaine_retour .= $chaine[$i-1];
    }
    return $chaine_retour;
}
function inverser3($chaine) {
    $len = strlen($chaine);
    // chaine non vide, sinon il convertira en tableau
    $chaine_retour = " ";
    for($i = 0;$i<$len;$i++) {
        $chaine_retour[$len-$i-1] = $chaine[$i];
        // les deux marchent
        $chaine_retour{$len-$i-1} = $chaine[$i];
    }
    return $chaine_retour;
}



echo "<br> 1 - \"".inverser1("Esimed, c'est top").'"';
echo "<br> 1 - \"".inverser2("Esimed, c'est top").'"';
echo "<br> 1 - \"".inverser3("Esimed, c'est top").'"';
