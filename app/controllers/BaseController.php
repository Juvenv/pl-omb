<?php

class BaseController extends Controller {

	/**
	* Retorna os valores do request com os resultados em maiúsculo
	* @param $filter : Serve para filtrar os valores do Request
	* @return array() : Valores do Request filtrados e em maiúsculo, caso não
	* 									seja setado o filtro, a array de entrada é a mesma de saída,
	*										apenas formatando os resultados (para maiúsculo).
	**/
	public function getRequestData($filter = null)
	{
		$formattedValues = [];
		$requests = [];

		if($filter !== null){
			$requests = Request::only($filter)[$filter];
		}else{
			$requests = Request::all();
		}

		$formattedValues = FormatterHelper::toUpperCase($requests);

		return $formattedValues;
	}

	// Criado pelo Laravel
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
