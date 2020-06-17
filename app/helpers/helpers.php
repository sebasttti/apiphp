<?php

function imprimirJSON($array){
    header('Content-type:application/json; charset=utf-8');
    echo json_encode($array, JSON_UNESCAPED_UNICODE);
}

function exitoFracaso($res){

    if ($res) {
      $aux = ['exito'=>'exito'];
    }else{
      $aux = ['fracaso'=>'fracaso'];
    }
  
    return $aux;
}

function JSONmensaje($string){
  $auxArray = array();
  $auxArray['mensaje'] = $string;
  imprimirJSON($auxArray);
}

function show_class_error($class){
  return "La clase $class no pudo ser encontrada";
}

function show_method_error($class,$method){
  return "La clase $class no encontró el método $method";
}

function show_model_error($class, $section){
  return "El modelo asociado a la sección $section de la clase $class no existe";
}

?>