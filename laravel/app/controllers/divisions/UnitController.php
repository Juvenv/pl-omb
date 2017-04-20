<?php // TODO: Necessita Transaction

class UnitController extends \BaseController {

    public function index() { return Unit::all()->load('sectors', 'sectors.subjects', 'sectors.subjects.subjectdeadline'); }

    public function store() {
        DB::beginTransaction();
        $validatedData = $this->validator->validate(Input::all());
        $unit = new Unit($validatedData);
        $unit->save();
        
        foreach ($validatedData['sectors'] as $sector) {
            $sector = new Sector($sector);
            $sector->unit()->associate($unit);
            $sector->save();
        }
        DB::commit();
    }

    public function changeName($id) {
        $unit = Unit::findOrFail($id);
        $unit->name = Input::get('name');
        $unit->save();
    }

    public function deleteOrRestore($id){ 
        $unit = Unit::withTrashed()->findOrFail($id);
        if ($unit->trashed()) {
            $unit->restore();    
        } else {
            $unit->delete(); 
        }

        // TODO: Enviar para a página de unidades ou mostrar erro
    }

    public function addSector($id){
        // TODO: Validar para não permitir a criação de um setor com o mesmo nome
        $unit = Unit::findOrFail($id);
        $sector = new Sector(Input::all());
        $sector->unit()->associate($unit);
        $sector->save();
    }

    public function removeSector($sectorId){
        Sector::findOrFail($sectorId)->delete();
    }

}
