<?php
class Core{
    public function run() {
        $url = '/';
        if (isset($_GET['url'])){
            $url .= $_GET['url'];
        }
        $params = array();

        if (!empty($url) && $url != '/') {
            $url = explode('/', $url);
            array_shift($url);    //remove o primeiro do array
            $currentController = $url[0].'Controller';
            array_shift($url);    //remove o primeiro do array, pois já pegamos o controller
            if(isset($url[0]) && !empty($url[0])){
                $currentAction = $url[0];
                array_shift($url);    //remove o primeiro do array, daí só sobra os parâmetros
            }else{
                $currentAction = 'index';
            }
            if (count($url) > 0){
                $params = $url;
            }

        }else{
            $currentController = 'homeController';
            $currentAction = 'index';
        }
        $c = new $currentController();
        call_user_func_array(array($c,$currentAction), $params);


        /*
        echo '<hr/>';
        echo "CONTROLLER : ".$currentController."<br/>";
        echo "ACTION :".$currentAction."<br/>";
        echo "PARAMS :".print_r($params, true)."br/>";
        */
    }
}


