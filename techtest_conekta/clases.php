<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Comando{

    public function validaComando($comando){
        $parametros = explode(" ",$comando);
        $tipo = "N";
        switch($parametros[0]){
            case "I":
                if(isset($parametros[1]) && ($parametros[1] != "") && (is_numeric($parametros[1])) && isset($parametros[2]) && ($parametros[2] != "") && (is_numeric($parametros[2]))){
                    if($parametros[2] <= 250){
                        $tipo = "I";
                    } else {
                        $tipo = "N";
                    }
                } else {
                    $tipo = "N";
                }
            break;
            case "C":
                $tipo = "C";
            break;
            case "L":
                if(isset($parametros[1]) && ($parametros[1] != "") && (is_numeric($parametros[1])) && isset($parametros[2]) && ($parametros[2] != "") && (is_numeric($parametros[2])) && isset($parametros[3]) && ($parametros[3] != "") && (!is_numeric($parametros[3]))){
                    $tipo = "L";
                } else {
                    $tipo = "N";
                }
            break;
            case "V":
                if(isset($parametros[1]) && ($parametros[1] != "") && (is_numeric($parametros[1])) && isset($parametros[2]) && ($parametros[2] != "") && (is_numeric($parametros[2])) && isset($parametros[3]) && ($parametros[3] != "") && (is_numeric($parametros[3])) && isset($parametros[4]) && ($parametros[4] != "") && (!is_numeric($parametros[4]))){
                    $tipo = "V";
                } else {
                    $tipo = "N";
                }
            break;
            case "H":
                if(isset($parametros[1]) && ($parametros[1] != "") && (is_numeric($parametros[1])) && isset($parametros[2]) && ($parametros[2] != "") && (is_numeric($parametros[2])) && isset($parametros[3]) && ($parametros[3] != "") && (is_numeric($parametros[3])) && isset($parametros[4]) && ($parametros[4] != "") && (!is_numeric($parametros[4]))){
                    $tipo = "H";
                } else {
                    $tipo = "N";
                }
            break;
            case "F":
                if(isset($parametros[1]) && ($parametros[1] != "") && (is_numeric($parametros[1])) && isset($parametros[2]) && ($parametros[2] != "") && (is_numeric($parametros[2])) && isset($parametros[3]) && ($parametros[3] != "") && (!is_numeric($parametros[3]))){
                    $tipo = "F";
                } else {
                    $tipo = "N";
                }
            break;
            case "S":
                $tipo = "S";
            break;
            case "X":
                $tipo = "X";
            break;
            default:
                $tipo = "N";
            break;
        }
        return $tipo;
    }

}

class Tabla {

    public function crearTabla($comando,$tabres){
        $parametros = explode(" ",$comando);
        $resultado = array();
        switch($parametros[0]){
            case "I":
                $resultado = array_fill(0, $parametros[2], array_fill(0, $parametros[1], "O"));
                $ultcol = $parametros[1] - 1;
                foreach($resultado as $key => $value)
                {
                    $resultado[$key][$ultcol] .= "<br>";
                }
            break;
            case "C":
                $narr = explode("<br>",$tabres);
                /*for ($i = 0; $i < sizeof($narr); $i++) {
                    for ($j = 0; $j < sizeof($narr[0]); $j++){
                        if ($narr[$i][$j] != "O"){
                            if(strpos($narr[$i][$j],"<br>") !== false){
                                $narr[$i][$j] = "O<br>";
                            } else {
                                $narr[$i][$j] = "O";
                            }
                        } else {
                            $narr[$i][$j] = "O";
                        }
                    }
                }
                $nax = implode("<br>",$narr);*/
                $resultado = $narr;
            break;
            case "L":
                $newX = $parametros[1] - 1;
                $newY = $parametros[2] - 1;
                $narr = explode("<br>",$tabres);
                $narr[$newY][$newX] = $parametros[3];
                $nax = implode(",,",$narr);
                $nax = str_replace(",,","<br>",$nax);
                $resultado = $nax;
            break;
            case "V":
                $resultado = "V";
            break;
            case "H":
                $resultado = "H";
            break;
            case "F":
                $resultado = "F";
            break;
            case "S":
                $tabres = str_replace("<br>,","<br>",$tabres);
                $resultado = $tabres;
            break;
            case "X":
                $resultado = "X";
            break;
            default:
                $resultado = "N";
            break;
        }
        //punto para retorno de valor
        return $resultado;
    }
}
?>