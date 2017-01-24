<?php
/**
 * Description of CompleteRange
 *
 * @author Antonio Espinoza
 */
class CompleteRange
{
    /**
     * Funcion que completa la coleccion de numeros enteros 
     * @param $arreglo
     * @return array
     */
    public function build($arreglo)
    {
        $max = max($arreglo);
        $min = min($arreglo);
        $respuesta = array();
        for($i=$min;$i<=$max;$i++)
            $respuesta[] = $i;
        return $respuesta;
    }

}
