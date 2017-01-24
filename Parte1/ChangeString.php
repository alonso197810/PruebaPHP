<?php
/**
 * Description of ChangeString
 *
 * @author Antonio Espinoza
 */
class ChangeString
{
    /**
     * Funcion que modifica las letras de una expresion 
     * @param $texto
     * @return string
     */
    public function build($texto)
    {
        $abecedario = array(
            "a",
            "b",
            "c",
            "d",
            "e",
            "f",
            "g",
            "h",
            "i",
            "j",
            "k",
            "l",
            "m",
            "n",
            "ñ",
            "o",
            "p",
            "q",
            "r",
            "s",
            "t",
            "u",
            "v",
            "w",
            "x",
            "y",
            "z"
        );
        $arrayTexto = preg_split('//u', $texto, -1, PREG_SPLIT_NO_EMPTY);
        $respuesta = '';
        $es_mayuscula = false;
        foreach($arrayTexto as $caracter)
        {
            if(ctype_alpha($caracter))
            {
                if(ctype_upper($caracter))
                    $es_mayuscula = true;
                if($es_mayuscula)
                    $caracter = strtolower($caracter);                
                $clave = array_search($caracter, $abecedario);
                if($clave == 26)
                    $siguienteClave = 0;
                else
                    $siguienteClave = $clave + 1;
                $siguiente = $abecedario[$siguienteClave];
                if($es_mayuscula)
                    $respuesta.=strtoupper($siguiente);
                else
                    $respuesta.=$siguiente;
                $es_mayuscula = false;                
            } elseif($caracter == 'ñ' || $caracter == 'Ñ') {
                if($caracter == 'ñ')
                    $respuesta .= 'o';
                if($caracter == 'Ñ')
                    $respuesta .= 'O';
            } else {
                $respuesta .= $caracter;
            }
        }
        return $respuesta;
    }

}
