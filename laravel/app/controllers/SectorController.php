<?php

class SectorController extends \BaseController {

  private $sectorsToSave;
  private $associatedUnit;

  public function __construct($sectorsToSave = null, $associatedUnit = null)
  {
    Parent::__construct();
    $this->sectorsToSave = $sectorsToSave;
    $this->associatedUnit = $associatedUnit;
  }

	public function store()
	{
    if($this->associatedUnit !== null) { // Se vem pelo cadastro de unidade
      foreach ($this->sectorsToSave as $sector) {
        $validatedData = $this->validator->validateFromData($sector);

        $this->model = new Sector;
        $this->model->fill($validatedData);
        $this->model->unit()->associate($this->associatedUnit);
        $this->model->save();

        if (isset($validatedData['subjects']) || array_key_exists('subjects', $validatedData)) {
          $subjects = $validatedData['subjects'];
          $subjectController = new SubjectController($subjects, $this->model);
          $subjectController->store();
        }else{
          // TODO: Não possibilitar o usuário de cadsatrar um setor sem assunto
        }

      }
    } else { // Se vier pela adição de um novo setor numa unidade já existente
      $sector = $this->getRequestData('sector');
      $unitID = $sector['unit'];
      $validatedData = $this->validator->validateFromData($sector);

      $this->model->fill($validatedData);
      $this->model->unit()->associate(Unit::findOrFail($unitID));
      $this->model->save();

      if (isset($validatedData['subjects']) || array_key_exists('subjects', $validatedData)) {
        $subjects = $validatedData['subjects'];
        $subjectController = new SubjectController($subjects, $this->model);
        $subjectController->store();
      }else{
        // TODO: Não possibilitar o usuário de cadsatrar um setor sem assunto
      }
    }
    return $this->model;
	}

}
