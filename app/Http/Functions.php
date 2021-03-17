<?php 

function urlCDN(){
    return 'https://cdn.ingelmec.smartappshn.com/platform/';
}

function readjson($json, $key){
    if ($json == null) {
        
    } else {
        $json = $json;
        $json = json_decode($json, true);
        if (array_key_exists($key, $json)) {
           return $json[$key];
        }else{
            return null;
        }
    }
    
}


function getRoleUserKey($mode, $id){
    if ($id == 1) {
        return 'Administrador';
    } else {
        return 'Usuario corriente';
    }
    
}

function getStatusUserKey($mode, $id){
    if ($id == 0) {
        return 'Registrado';
    }
    if($id == 1) {
        return 'Habilitado';
    }
    if($id == 100) {
        return 'Inhabilitado';
    }
}


