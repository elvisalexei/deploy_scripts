<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * File:   webhooks.php
 * Author: Elvis Fernández
 * Created on 29/08/2016
 * 
 * Variables: 
 * 
 * n = Nombre de la carpeta en www
 * u = Usuario de GitLab
 * rr = Nombre del  repositorio de GitLab
 * b = Branch
 * 
 */

$LOCAL_ROOT = "/var/www/html";
$SERVIDOR_GIT = "git@gitlab:8081";
$BASH_SCRIPT = "/var/www/git_deploy.sh";

if (isset($_GET['n']) && isset($_GET['u']) && isset($_GET['rr'])){
    $LOCAL_NAME = filter_input(INPUT_GET, 'n');
    $USUARIO = filter_input(INPUT_GET, 'u');
    $REMOTE_REPO_NAME = filter_input(INPUT_GET, 'rr');
    
    if (isset($_GET['b'])){        
        $BRANCH = filter_input(INPUT_GET, 'b');
    }else{
        $BRANCH = "master";
    }
        
    $REMOTE_REPO = $SERVIDOR_GIT . ":" . $USUARIO . "/" . $REMOTE_REPO_NAME .".git";
    
    if (file_exists($BASH_SCRIPT)){
        $EJECUTAR = $BASH_SCRIPT . " " . $REMOTE_REPO . " " . $LOCAL_ROOT . " " . $LOCAL_NAME;
        $SALIDA = shell_exec($EJECUTAR);
    }else{
        $SALIDA = "No existe la ruta de ejecución del Script Bash.";
    }

    die($SALIDA);
}

?>