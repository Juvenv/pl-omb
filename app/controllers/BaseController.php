<?php

class BaseController extends Controller {

  protected $model;

  public function __construct(){
    // Main Name das classes filhas (Modelos e Validadores)
    // Ex: Com ClaimantController, será instanciado o modelo Claimant e o validador ClaimantValidator
    $name = str_replace("Controller", "", get_class($this));

    // Seta o modelo (OBRIGATORIAMENTE)
    $this->model = new $name;
    // Seta a classe validadora, caso exista
    try {
      $validatorClass = "{$name}Validator";
      $this->validator = new $validatorClass($this);
      throw new Exception($validatorClass);
    } catch (Exception $ignored) {} // TODO: Adicione um Throw caso seja obrigatório haver
	}

  /**
  * Retorna todos os resultados do modelo no banco
  * @return Collection : Coleção com os modelos
  **/
  public function index()
  {
    return $this->model->all();
  }

	/**
	* Retorna os valores do request com os resultados em maiúsculo
	* @param String $filter : Serve para filtrar os valores do Request
	* @return Array : Valores do Request filtrados e em maiúsculo, caso não
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

		if(!empty($requests)){
			$formattedValues = FormatterHelper::toUpperCase($requests);
		}else{
			throw new OutOfBoundsException("Chave '$filter' não encontrada na lista (array) de dados");
		}

		return $formattedValues;
	}

  /**
  * Verifica se o array do request contém a chave solicitada
  * @param String $filter : Chave que será vericicada a existência
  * @return Boolean : true caso exista, false caso contrário
  **/
	public function hasRequestData($filter)
	{
		$requests = Request::only($filter)[$filter];
		return !empty($request);
	}

  /**
  * Cria um Response de acordo com o tipo de exceção recebida
  * @param Exception $exception : Exceção que foi lançada
  * @return Response : Array seguindo o padrão:
  * "error" => [
  *   "message" => "mensagem de erro",
  *   // outros parâmetros caso existam, sejam eles arrays ou não
  * ]
  **/
  public function throwException($exception)
  {
    $message = $exception->getMessage();

    if(!is_array($message)){
      $response['message'] = $message;
    }else{
      $response = $message;
    }

    return Response::make(['error' => $response]);
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
