<?php

class CompanyController extends \BaseController {

	public function store()
	{
    $validatedData = $this->validator->validate();
    $this->model->fill($validatedData);
    return $this->model;
	}

	public function destroy($id)
	{
		//
	}

}
