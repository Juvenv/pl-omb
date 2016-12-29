<?php
Class TranslatorHelper{
  /**
  * Assitente de tradução de campos com base em formField, para campos de
  * formulário ou AJAX
  * @param $fields: Array com conteúdo contendo campos (ou outras arrays) entre
  *                 chaves ("{}") que serão traduzidos, recursicamente, se
  *                 necessário.
  * @return array(): Retorna a mesma array com os valores traduzidos
  **/
  public static function translateFields($fields = []){
    $results = [];

    foreach ($fields as $key => $field) {
      if(is_array($field)){ // Caso seja uma array dentro, chama recursivamente
        $results[$key] = self::translateFields($field);
      }else{

        // O +1 serve para remover a chave da posição inicial, pois strpos
        // inicia em 0
        $start = strrpos($field, '{') + 1;
        $end = strrpos($field, '}') - $start;
        $toTranslate = substr($field, $start, $end );

        // Termo a ser traduzido da base formField de Lang
        $term = "formField.$toTranslate";

        // Traduz e remove as chaves
        $field = str_replace($toTranslate, Lang::get($term), $field);
        $field = str_replace('{', '', $field);
        $field = str_replace('}', '', $field);

        $results[$key] = $field;
      }
    }

    return $results;
  }
}
