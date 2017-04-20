<?php // TODO: Necessita Transaction

class ClaimantController extends \BaseController {

    public function store($data) {
        $validatedData = $this->validator->validate($data);

        // Dados pessoais
        $claimant = Claimant::create($validatedData);
        $this->saveOrUpdatePersonType($claimant, $validatedData);
        $this->saveOrUpdateContact($claimant, $data['contact']);
        
        return $claimant;
    }

    public function update($claimant, $data){
        $validatedData = $this->validator->validate($data);        
        $claimant->fill($validatedData)->update();
        $this->saveOrUpdatePersonType($claimant, $validatedData);
        $this->saveOrUpdateContact($claimant, $data['contact']);
        
        return $claimant;
    }

    /* Verifica a existencia do contribuinte e encaminha para o método correto */
    public function storeOrUpdate($data) {
        $claimant = null;
        
        if(isset($data['individual'])) {
            $claimant = Individual::where(['cpf' => $data['individual']['cpf']])->first();
        }

        if(isset($data['company'])) {
            $claimant = Company::where(['cnpj' => $data['company']['cnpj']])->first();
        }

        if($claimant === null) {
            $this->store($data);
        } else {
            $this->update($claimant, $data);
        }
    }

    /* Cria ou atualiza o tipo de pessoa do contribuinte */
    public function saveOrUpdatePersonType($claimant, $data) {
        if($data['personType'] == 'individual'){
            $individual = Individual::firstOrNew(['cpf' => $data['cpf']]);
            $individual->cpf = $data['cpf'];
            $individual->claimant()->associate($claimant);
            $individual->save();
        } else {
            $company = Company::firstOrNew(['cnpj' => $data['cnpj']]);
            $company->cnpj = $data['cnpj'];
            $company->contact_name = $data['contact_name'];
            $company->claimant()->associate($claimant);
            $company->save();
        }
    }

    /* Cria ou altera o contato */
    public function saveOrUpdateContact($claimant, $data) {
        $answerType = Answer::getAnswerType($data['answer']);
        if($answerType == 'address') {
            $address = Address::firstOrNew(['claimant_id' => $claimant->id]);
            $address->claimant()->associate($claimant);
            $address->fill($data)->save();
        }

        if($answerType == 'email') {
            $email = Email::firstOrNew(['claimant_id' => $claimant->id]);
            $email->claimant()->associate($claimant);
            $email->fill($data)->save();
        }

        if($answerType == 'telephone') {
            $telephone = Telephone::firstOrNew(['claimant_id' => $claimant->id]);
            $telephone->claimant()->associate($claimant);
            $telephone->fill($data)->save();
        }
    }
}
