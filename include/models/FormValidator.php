<?php

  class validator{

    public static function sanitizeFormString($inputText){

      $inputText = strip_tags($inputText);
      $inputText = str_replace(" ", "", $inputText);
      $inputText = strtolower($inputText);
      $inputText = ucfirst($inputText); //Uppercase the first letter
      
      return $inputText;
  }

   
  public static function sanitizeFormUsername($inputText) {
      $inputText = strip_tags($inputText);
      $inputText = str_replace(" ", "", $inputText);
      return $inputText;
  }

  public static function sanitizeFormPassword($inputText) {
      $inputText = strip_tags($inputText);
      $inputText = str_replace(" ", "", $inputText);
      return $inputText;
  }

  public static function sanitizeFormEmail($inputText) {
      $inputText = strip_tags($inputText);
      $inputText = str_replace(" ", "", $inputText);
      return $inputText;
  }

    
    
}// end-of-classes




?>