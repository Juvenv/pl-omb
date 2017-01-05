<?php

class UnitController extends \BaseController {

  public function index() { return Unit::all()->load('sectors', 'sectors.subjects', 'sectors.subjects.subjectdeadline'); }

	public function store()
	{
    // try {
      $validatedData = $this->validator->validate();
      $this->model->fill($validatedData);
      $this->model->save();

      // TODO: Colcoar o teste para ver se há alguma unidade a ser cadastrada, caso o contrário lançar uma exceção
      $sectors = $this->getRequestData('unit.sectors');
      $sectorController = new SectorController($sectors, $this->model);
      $sectorController->store();

      return $this->model;
    // } catch (Exception $e) {
    //   $this->model->delete();
    //   return $this->throwException($e);
    // }
	}

}
