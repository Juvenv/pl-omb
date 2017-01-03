<?php

class StatusController extends \BaseController {

	public function __construct(){
		$this->validator = new StatusValidator($this);
	}

	public function index() {
		return Status::all();
	}

	public function create(){
	}

	public function store(){
		$status = new Status;

		try {
			return DB::transaction(function(){
				$this->validator->store();

				$teste = (new TesteController)->store();
				$status = new Status;
				$status->fill($this->getRequestData('status'));
				$status->teste()->associate($teste);
				$status->save();

				if (!$status || !$teste) {
					DB::rollback();
				}
				return $status;
		});
		}catch (ValidationFailException $e){
		return $this->validator->validationFails;
	}//catch (Exception $e) {
		// 	return Response::make(['error' =>  'Não foi possível cadastrar o Status', 'cause' => $e->getMessage()]);
		// }
	}

	public function show($id){
		try{
			return Status::findOrFail($id);
		}catch(Exception $e){
			return ['error' => 'Status não encontrado'];
		}
	}

	public function edit($id){
	}

	public function update($id){
		try{
			$this->validator->update();
			$status = Status::findOrFail($id);
			$status->fill(Request::all());
			$status->save();

			return $status;
		}catch(Exception $e){
			return ['error' => $e->getMessage()];
		}
	}

	public function destroy($id){
		try{
			$status = Status::findOrFail($id);
			$status->active = !$status->active;
			$status->save();
			if($status->active){
				return ['success' => 'Status ativado'];
			}else{
				return ['success' => 'Status desativado'];
			}
		}catch(Exception $e){
			return ['error' => 'Status não encontrado'];
		}
	}

}
