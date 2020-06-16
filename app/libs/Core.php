<?php

/*Mapear la URL ingresada en el navegador
  1- controlador
  2- metodo
  3- parametro
*/

class Core{
  protected $actualController = 'Index';
  protected $actualMethod = 'main';
  protected $parameters = [];


  public function __construct(){
    $url=$this->getUrl();

        //primero reviso si la url[0] existe

        if (isset($url[0])) {
          //buscar en controladores si el controlador existe
          if (file_exists('../app/controllers/'.ucwords($url[0]).'.php')) {
              // setea el controlador actual
              $this->actualController=ucwords($url[0]);
              unset($url[0]);
          }else{
            // setea el controlador actual
            $this->actualController="Error404";
            unset($url[0]);
          }
        }


          //aca trae la pagina
          require_once('../app/controllers/'.$this->actualController.'.php');

          //aca invoca la clase
          //$this->actualController = new $this->actualController;

        //chequear la segunda parte que seria el metodo
        if (isset($url[1])) {
          //if (method_exists($this->actualController,$url[1])) {
              //chequeamos el metodo
              $this->actualMethod = $url[1];
              //desmontar el metodo
              unset($url[1]);
          //}
        }
        //chequear parametros

        if ($url) {
          foreach (array_values($url) as $key => $value) {
            array_push($this->parameters,$value);
          }
        }

        //hacer callback con parametros array
        //echo $this->actualController;
        $this->actualController = new $this->actualController($this->actualMethod,$this->parameters);
  }

  public function getUrl(){
     if (isset($_GET['url'])) {
          $url = rtrim($_GET['url'],'/');
          $url = filter_var($url,FILTER_SANITIZE_URL);
          $url = explode('/',$url);
          return $url;
      }
  }

}

?>