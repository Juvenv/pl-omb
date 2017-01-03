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

  public function __toString()
  {
      try {
        return (string) $this->code; // If it is possible, return a string value from object.
      } catch (Exception $e) {
        return get_class($this).'@'.spl_object_hash($this); // If it is not possible, return a preset string to identify instance of object, e.g.
      }
  }

}
