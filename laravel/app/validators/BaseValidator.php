<?php

Class BaseValidator {

    public function validate($data, $rules = 'store'){
        $validator = Validator::make($data, $rules());
        
        if($validator->fails()){
            $messages = $validator->errors()->all();
            Session::push('validation_fails', $messages);
        }
    }

}
