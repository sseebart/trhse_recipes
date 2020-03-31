<?php

class Recipe
{
  private  $yield;
  private  $title;
  private  $ingredients   = array();
  private  $source        = 'Steve Seebart';
  private  $instructions  = array();
  private  $tag           = array();

  public function __construct($title = null)
  {
    $this -> setTitle($title);
  }

  public function __toString()
  {
    $output  = "You are calling a " . __CLASS__;
    $output .= " object with the title \"" . $this -> getTitle() . "\"\n";
    $output .= "It is stored in " . basename(__FILE__) . " at " . __DIR__ . ".\n";
    $output .= "This display is from line " . __LINE__ . " in method " . __METHOD__ . ".\n" ;
    $output .= "The following  methods are available for objects of this class: \n";
    $output .= implode("\n", get_class_methods(__CLASS__));
    $output .= "\n";
    return $output;
  }

  public function setTitle($title)
  {
    if (empty($title)) {
      $this -> title = "Unnamed Recipe";
    } else {
      $this->title   = ucwords($title);
    }
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function addIngredient($item, $amount = null, $measure = null, $note = null)
  {
    //test whether or not the incoming value is in the right format.
    //Need to change to accept html special characters for fractions
    if ($item == null && $note == null) {
      exit("Both item and note cannot be left blank");
    }
    //test if the incoming measure is valid
    if ($amount != null) {
      $amount  = $this -> clean_measure($amount);
    }
    $this -> ingredients[] = array(
      "item"    => strtolower($item),
      "amount"  => $amount,
      "measure" => strtolower($measure),
      "note"    => $note
    );
  }

  public function getIngredients()
  {
    return $this->ingredients;
  }

  public function addInstruction($string)
  {
    $this -> instructions[]   = $string;
  }

  public function getInstructions()
  {
    return $this -> instructions;
  }

  public function addTag($tag)
  {
    $this -> tags[]   = strtolower($tag);
  }

  public function getTags()
  {
    return $this -> tags;
  }

  public function setYield ($yield)
  {
    $this -> yield = $yield;
  }

  public function getYield()
  {
    return $this -> yield;
  }

  public function setSource($source)
  {
    $this -> source   = ucwords($source);
  }

  public function getSource() {
    return $this -> source;
  }

  //changes decimals to fractions where possible
  //accepts the amount, separates the decimal from the whole number
  //then converts the decimal to a display fraction and reassembles both.
  private function clean_measure ($amount)
  {
    $whole  = 0;
    if ($amount > 1) {
      $amount   = strval($amount);
      $dot      = strpos($amount, ".");
      $whole    = substr($amount, 0, $dot);
      $frac     = substr($amount, $dot);
    } else {
      $frac     = strval($amount);
    }

    switch ($frac) {
      case .5:
        $amount = self::assembleMeasure($whole, "&#189;");
        break;
      case .25:
        $amount = self::assembleMeasure($whole, "&#188;");
        break;
      case .75:
        $amount = self::assembleMeasure($whole, "&#190;");
        break;
      case .3:
        $amount = self::assembleMeasure($whole, "&#8531");
        break;
      case .33:
        $amount = self::assembleMeasure($whole, "&#8531");
        break;
      case 0.6:
        $amount = self::assembleMeasure($whole, "&#8532;");
        break;
      case 0.66:
        $amount = self::assembleMeasure($whole, "&#8532;");
    }

    return $amount;
  }

  //helper function to keep the switch statement in clean_measure() from getting too complex.
  private static function assembleMeasure ($w, $f)
  {
    if ($w == 0) {
      return $f;
    } else {
      return ($w . $f);
    }
  }
}
?>
