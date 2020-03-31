<?php

class Store
{
  public static function store_recipe($db, $recipe)
  {
    try {
      $title  = $recipe -> getTitle();
      $yield  = $recipe -> getYield();
      $source = $recipe -> getSource();

      $sql    =  "INSERT INTO recipe_names (name, yield, source) VALUES (?, ?, ?)";
      $result =  $db -> prepare($sql);
      $result -> bindParam(1, $title, PDO::PARAM_STR);
      $result -> bindParam(2, $yield, PDO::PARAM_STR);
      $result -> bindParam(3, $source, PDO::PARAM_STR);
      $result -> execute();
    } catch (Exception $e) {
      echo ("That's a bad query. Database not updated\n");
      echo $e -> getMessage();
      exit;
    }
    $recipe_id  = $db -> lastInsertId();
    $success    = self::store_ingredients($db, $recipe_id, $recipe -> getIngredients());
    $success    = self::store_instructions($db, $recipe_id, $recipe -> getInstructions());
    $success    = self::store_tags($db, $recipe_id, $recipe -> getTags());
    return $success;
  }

  //takes the database object, recipe id and ingredients array.
  //disassembles the associative array and adds each item to the ingredients table.
  private function store_ingredients ($db, $recipe_id, $ingredients)
  {
    foreach ($ingredients as $ing) {
      $amount       = $ing['amount'];
      $measure      = $ing['measure'];
      $ingredient   = $ing['item'];
      $note         = $ing['note'];
      try {
        $sql  = "INSERT INTO ingredients (
                  name_id,
                  amount,
                  measure,
                  ingredient,
                  note)
                VALUES (?, ?, ?, ?, ?)";
        $result =  $db -> prepare($sql);
        $result -> bindParam(1, $recipe_id, PDO::PARAM_INT);
        $result -> bindParam(2, $amount, PDO::PARAM_STR);
        $result -> bindParam(3, $measure, PDO::PARAM_STR);
        $result -> bindParam(4, $ingredient, PDO::PARAM_STR);
        $result -> bindParam(5, $note, PDO::PARAM_STR);
        $result -> execute();
      } catch (Exception $e) {
        echo ("That's a bad store_ingredients query.");
        echo $e -> getMessage();
        return false;
      }
    }
    return true;
  }

  //takes the database object, recipe id and instruction array
  //then adds these values to the instructions table
  private function store_instructions($db, $recipe_id, $instruction)
  {
    $size=count($instruction);
    for ($i=0; $i<$size; $i++) {
      try {
        $sql  = "INSERT INTO instructions (
                  recipe_id,
                  instruction)
                VALUES
                  (?, ?)";
        $result   =  $db -> prepare($sql);
        $result   -> bindParam(1, $recipe_id, PDO::PARAM_INT);
        $result   -> bindParam(2, $instruction[$i], PDO::PARAM_STR);
        $result   -> execute();
      } catch (Exception $e) {
        echo ("That's a bad store_instructions query!");
        echo $e -> getMessage();
        return false;
      }
    }
    return true;
  }

  //takes the database object, recipe id and tags array
  //looks to see if the tag already exists in the tags table
  //if so, updates the tag_link table to tie the existing tag to the recipe id.
  //if not, adds the tag to the tags table and inserts a corresponding item in the link table.
  private function store_tags ($db, $recipe_id, $tags) {
    try {
      $size     = count($tags);
      for ($i=0; $i<$size; $i++) {
        $sql    = "SELECT tag_id FROM tags WHERE tag = '$tags[$i]'";
        $sth = $db -> prepare($sql);
        $sth -> execute();
        $count = $sth -> rowCount();
        //echo "<br>" . $count . "<br>";
        if ($count > 0) {
          $t_id     =  $sth -> fetch(PDO::FETCH_ASSOC);
          $tag_id   =  $t_id['tag_id'];
          $sql      =  "INSERT INTO tag_link (tag_id, recipe_id) VALUES (?, ?)";
          $result   =  $db -> prepare($sql);
          $result   -> bindParam(1, $tag_id, PDO::PARAM_INT);
          $result   -> bindParam(2, $recipe_id, PDO::PARAM_INT);
          $result   -> execute();
        } else {
          $sql      =  "INSERT INTO tags (tag) VALUES (?)";
          $result   =  $db -> prepare($sql);
          $result   -> bindParam(1, $tags[$i], PDO::PARAM_STR);
          $result   -> execute();
          $tag_id   =  $db -> lastInsertId();
          $sql      =  "INSERT INTO tag_link (tag_id, recipe_id) VALUES (?, ?)";
          $result   =  $db -> prepare($sql);
          $result   -> bindParam(1, $tag_id, PDO::PARAM_INT);
          $result   -> bindParam(2, $recipe_id, PDO::PARAM_INT);
          $result   -> execute();
        }
      }

    } catch (Exception $e) {
      echo ("That's a bad store_tags query!");
      echo ($e -> getMessage());
    }
  }

}


?>
