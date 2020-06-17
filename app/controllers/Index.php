<?php

class Index extends Controller{
    
    function __construct($method,$parameters){

        if (is_callable(array($this,$method))) {
            $this->$method($parameters);
        }else{
            JSONmensaje(show_method_error(get_class($this),$method));
        }

    }

    private function main(){
        echo "ApiPhp Index invocado satisfactoriamente";
    }

    private function example(){
        $commonModel = $this->model(get_class($this),'common');

        $example = $commonModel->showExample();
        
        imprimirJSON($example);
    }

}

?>