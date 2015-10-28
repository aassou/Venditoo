<?php
//Cette fonction génère, sauvegarde et retourne un token
//Vous pouvez lui passer en paramètre optionnel un nom pour différencier les formulaires
function generer_token($nom = '')
{
    $token = uniqid(rand(), true);
    $_SESSION[$nom.'_token'] = $token;
    $_SESSION[$nom.'_token_time'] = time();
    return $token;
}
//**************************************************************************//
//**************************************************************************//
//**************************************************************************//
//Cette fonction vérifie le token
//Vous passez en argument le temps de validité (en secondes)
//Le referer attendu (adresse absolue, rappelez-vous :D)
//Le nom optionnel si vous en avez défini un lors de la création du token
function verifier_token($temps, $referer, $nom = '')
{
if(isset($_SESSION[$nom.'_token']) && isset($_SESSION[$nom.'_token_time']) && isset($_POST['token']))
    if($_SESSION[$nom.'_token'] == $_POST['token'])
        if($_SESSION[$nom.'_token_time'] >= (time() - $temps))
            if($_SERVER['HTTP_REFERER'] == $referer)
                return true;
return false;
}
?>