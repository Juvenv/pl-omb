<?php  // TODO: Necessita Transaction

class SectorController extends \BaseController {

    public function store() {
        $validatedData = $this->validator->validate(Input::all());
        $sector = new Sector($validatedData);
        
        foreach ($validatedData['subjects'] as $subject) {
            $subject = new Subject($subject);
            $subject->sector()->associate($sector);
            $subject->save();
        }
    }

    public function changeName($id) {
        $sector = Sector::findOrFail($id);
        $sector->name = Input::get('name');
        $sector->save();
    }

    public function addSubject($id) {
        // TODO: Necessário validar para não permitir a crião de um assunto com o mesmo nome
        $sector = Sector::findOrFail($id);
        $subject = new Subject(Input::all());
        $subject->sector()->associate($sector);
        $subject->save();
    }

    public function removeSubject($subjectId){
        Subject::findOrFail($subjectId)->delete();
    }

}
