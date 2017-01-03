<?php
Class FormatterHelper {

  /**
  * Retorna todos os valores de uma array (ou valor único) em maíusculo de forma
  * recursiva ou seja, se houver arrays dentro da array, as mesmas também serão
  * convertidas
  * @param $value: array ou valor que será convertido
  **/
  public static function toUpperCase($value){
    $result = [];

    foreach ($value as $key => $value) {
      if (is_array($value)) { // Caso haja uma array dentro, chama recursivamente
        $result[$key] = self::toUpperCase($value);
      }else{
        $result[$key] = mb_strtoupper($value, 'UTF-8');
      }
    }

    return $result;
  }
}
