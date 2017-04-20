<?php

Class BaseValidator {

    public function validate($data, $rules = 'store'){
        $validator = Validator::make($data, $this->$rules());
        
        if($validator->fails()){
            $messages = $validator->errors()->all();
            Session::push('validation_fails', $messages);
        }
        
        return $data;
    }

}
