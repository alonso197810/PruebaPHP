<?php
/**
 * Description of ClearPar
 *
 * @author Antonio Espinoza
 */
class ClearPar
{
    /**
     * Funcion que elimina los parentesis que no tienen pareja
     * @param $texto
     * @return string
     */
    public function build($texto)
    {
        $arrayTexto = str_split($texto);
        $respuesta = "";
        $longitud = count($arrayTexto);
        for($i=0;$i<$longitud-1;$i++)
        {
            if($arrayTexto[$i]=='('&&$arrayTexto[$i+1]==')')
                $respuesta.="()";
        }
        return $respuesta;
    }

}
