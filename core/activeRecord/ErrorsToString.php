<?php 
  namespace app\core\activeRecord;

trait ErrorsToString
  {
    public function getErrorsToString(): String
    {
      if(empty($this->getErrors())){
        return '';
      }

      $errorsList = [];

      foreach($this->getErrors() as $field => $errors){
        foreach($errors as $error){
          $errorsList[] = $error;
        }
      }

      $output = '<ul>';

      foreach ($errorsList as $error){
        $output .= "<li>{$error}</li>";
      }

      $output .= '</ul>';
      
      return $output;
    }
  }
?>