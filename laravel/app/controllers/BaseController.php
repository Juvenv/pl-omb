<?php

class BaseController extends Controller {

  protected $model;
  protected $modelName;

  public function __construct(){
    // Main Name das classes filhas (Modelos e Validadores)
    // Ex: Com ClaimantController, será instanciado o modelo Claimant e o validador ClaimantValidator
    $name = str_replace("Controller", "", get_class($this));

    // Seta o modelo e seu nome (OBRIGATORIAMENTE)
    $this->model = new $name;
    $this->modelName = $name;

    // Seta a classe validadora, caso exista
    $validatorClass = "{$name}Validator";
    if(class_exists($validatorClass)){
      $this->validator = new $validatorClass($this);
    } else {
      throw new Exception("Classe validadora $validatorClass não foi encontrada.");
    }

    // Seta o filtro de acordo com a valor passado no construtor do pai que o chamou
    $trace = debug_backtrace();
    $caller = $trace[1]['object'];
    // print_r(strtolower(str_replace('Controller', '' ,$caller['object']->name)));
    // exit;

    // FIXME: Verificar sobre a utilização correta dos filtros aqui!
    try{
      $lastFilter = $caller->validator->getFilter();
      $this->validator->prependFilter($lastFilter);
    }catch(Exception $ignored){}

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

      if(strpos($filter, '.')){
        $subfilters = explode('.', $filter);

        $requests = Request::only($filter);
        foreach ($subfilters as $sub) {
          $requests = $requests[$sub];
        }

      }else{
        $requests = Request::only($filter)[$filter];
      }

		}else{
			$requests = Request::all();
		}

		if(!empty($requests)){
			$formattedValues = FormatterHelper::toUpperCase($requests);
		}else{
			throw new OutOfBoundsException("Chave '$filter' não encontrada na lista (array) de dados de " . $this->modelName);
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
		return Request::has($filter);
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
