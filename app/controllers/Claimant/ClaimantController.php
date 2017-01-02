<?php

class ClaimantController extends \BaseController {

  public function store(){
    try {
      $validatedData = $this->validator->validate();

      // TODO: Verificar a exceção do uso do fill
      $this->model->fill($validatedData);

      if($this->hasRequestData('individual'))
      {
        $individual = new Individual;
        $individual->fill($this->getRequestData('individual'));
        $this->model->individual()->associate($individual);
      }
      else if($this->hasRequestData('company'))
      {
        $company = new Company;
        $company->fill($this->getRequestData('company'));
        $this->model->company()->associate($company);
      }
      else if (!isset($this->getRequestData('claimant')['anonymous']))
      {
        throw new Exception('É necessário ser pessoa física, jurídica caso não seja anônimo');
      }

      $this->model->save();
      return $this->model;
    } catch (Exception $e) {
      return $this->throwException($e);
    }
  }


		/**
		* Display the specified resource.
		*
		* @param  int  $id
		* @return Response
		*/
		public function show($id)
		{
			//
		}


		/**
		* Show the form for editing the specified resource.
		*
		* @param  int  $id
		* @return Response
		*/
		public function edit($id)
		{
			//
		}


		/**
		* Update the specified resource in storage.
		*
		* @param  int  $id
		* @return Response
		*/
		public function update($id)
		{
			//
		}


		/**
		* Remove the specified resource from storage.
		*
		* @param  int  $id
		* @return Response
		*/
		public function destroy($id)
		{
			//
		}


	}
