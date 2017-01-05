<?php
// NOTE: Os métodos store() e update() devem receber o parâmetro "deadline" no JSON do Request
//       Para a criação do SubjectDeadLine.

class SubjectController extends \BaseController {

  private $subjectsToSave;
  private $associatedSector;

  public function __construct($subjectsToSave = null, $associatedSector = null)
  {
    Parent::__construct();
    $this->subjectsToSave = $subjectsToSave;
    $this->associatedSector = $associatedSector;
  }

  public function index() { return Subject::all()->load('subjectdeadline'); }

  /**
  *
  **/
	public function store()
	{
    if($this->associatedSector !== null) { // Se vem pelo cadastro de setor
      foreach ($this->subjectsToSave as $subject) {
        $validatedData = $this->validator->validateFromData($subject);

        $this->model = new Subject;
        $this->model->fill($validatedData);
        $this->model->sector()->associate($this->associatedSector);
        $this->setDeadLine($validatedData['deadline']);

        $this->model->save();
      }
    } else { // Se vier pela adição de um novo assunto num setor já existente
      $subject = $this->getRequestData('subject');
      $sectorID = $subject['sector'];
      $validatedData = $this->validator->validateFromData($subject);

      $this->model->fill($validatedData);
      $this->model->sector()->associate(Sector::findOrFail($sectorID));
      $this->setDeadLine($validatedData['deadline']);

      $this->model->save();
    }

    return $this->model;
	}

  public function setDeadLine($days) {
    $validator = Validator::make(['days' => $days],['days' => 'required|numeric|min:0']);

    if($validator->fails()){
      throw new Exception('O valor informado no prazo do assunto é invalido');
    }

    $deadLine = SubjectDeadLine::create(['days' => $days]);
    $this->model->subjectDeadLine()->associate($deadLine);
  }

}
