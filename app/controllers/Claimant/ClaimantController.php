<?php

class ClaimantController extends \BaseController {

	public function __construct(){
		$this->validator = new ClaimantValidator($this);
	}

	public function index(){
		return Claimant::all();
	}

	public function create(){}

		public function store(){
			$message = [];
			try{
				$this->validator->store();
				$claimant = new Claimant;




				// $claimant->save();
				// return $claimant;
				return $this->getRequestData('answer');
			}catch (ValidationFailException $e){
				return $this->validator->validationFails;
			}catch (Exception $e) {
				return Response::make(['error' =>  'Não foi possível cadastrar o Status', 'cause' => $e->getMessage()]);
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
