<?php
class ValidationFailException extends Exception{

  public function __construct($filter, $fails, $code = 1000, Exception $previous = null) {
    $filter = Lang::get("validation.attributes.$filter");
    $message = $messsage = "As seguintes validações em $filter falharam: ";

    parent::__construct($message, $code, $previous);

    $this->setFails($fails);
  }

  public function setFails($failsData)
  {
    $this->message = ['message' => $this->message, 'fails' => $failsData];
  }

}
