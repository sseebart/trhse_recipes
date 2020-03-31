<?php

class Render
{
  public function __toString()
  {
    $output  = "";
    $output .= "The following  methods are available for ". __CLASS__ . " objects:\n";
    $output .= implode("\n", get_class_methods(__CLASS__));
    $output .= "\n";
    return $output;
  }

  public static function render_recipe ($db, $recipe_id)
  {
    //code to pull recipe from the database and return as object
  }

  public static function listIngredients($ingredients)
  {
    $output   = "";
    foreach ($ingredients as $ing) {
      $output .= $ing['amount'] . " " . $ing['measure'] . " " . $ing['item'] . " " . $ing['note'];
      $output .= "<br>\n";
    }
    return $output;
  }

  public static function displayRecipe($recipe)
  {
    $output  = "";
    $output .= "<br>\n<h2>";
    $output .= $recipe -> getTitle() . " by " . $recipe -> getSource();
    $output .= "</h2>\n";
    $output .= "Tags: " . implode(", ", $recipe -> getTags());
    $output .= "<br>\n<br>\n";
    $output .= self::listIngredients($recipe -> getIngredients());
    $output .= "<ol>\n<li>";
    $output .= implode("</li><li>\n", $recipe -> getInstructions());
    $output .= "</li></ol>\n<br>\n";
    $output .= "Yield: " . $recipe -> getYield();
    $output .= "<br>\n<br>\n";

    return $output;
  }
}

?>
