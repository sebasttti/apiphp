<?php

function imprimirJSON($string){
    header('Content-type:application/json; charset=utf-8');
    echo json_encode($string, JSON_UNESCAPED_UNICODE);
}

function exitoFracaso($res){

    if ($res) {
      $aux = ['exito'=>'exito'];
    }else{
      $aux = ['fracaso'=>'fracaso'];
    }
  
    return $aux;
}

?>