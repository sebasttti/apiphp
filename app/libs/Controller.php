<?php

//se encarga de poder cargar los modelos y las vistas

class Controller{
    //cargar controlador
    public function model($class,$section){

      $class = ucfirst($class);
      $section = ucfirst($section);  
       //
      $classPath = 'app/models/'.$class."/".$section.'.php';
    
        if (file_exists($classPath)) {
            require_once $classPath;
            //instanciar el modelo
            return new $section;
       }else{
      //   //si el archivo no existe imprima un error
         JSONmensaje(show_model_error($class, $section));
         die();
       }
    }
}

 ?>
