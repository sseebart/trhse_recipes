<?php
include "classes/cls_recipe.php";
include "classes/cls_render.php";
include "classes/cls_store.php";
include "inc/connection.php";

Echo "This is the page to add recipes";

$lemon_chicken = new Recipe("Italian Lemon Chicken");
$lemon_chicken->setTitle("Italian Lemon Chicken");
$lemon_chicken->addIngredient("Pasta", 1, "lb");
$lemon_chicken->addIngredient("Chicken Breast", 2, "lb");
$lemon_chicken->addIngredient("olive oil", .5, "Cup");
$lemon_chicken->addIngredient("garlic, chopped", 2, "tbsp");
$lemon_chicken->addIngredient("lemon juice", .25, "Cup");
$lemon_chicken->addIngredient("sugar", .5, "tsp");
$lemon_chicken->addIngredient("parsley", 2, "tsp");
$lemon_chicken->addIngredient("oregano", 2, "tsp");
$lemon_chicken->addIngredient("basil", 1, "tbsp");
$lemon_chicken->addIngredient("parmesian cheese", "", "", "To taste");

$lemon_chicken->addInstruction("Cook pasta according to package directions");
$lemon_chicken->addInstruction("In a large skillet on medium high heat, saute garlic in olive oil for 3 minutes. Cut chicken into bite sized pieces.");
$lemon_chicken->addInstruction("Add additional items to sauce pan and cover for 5 minutes or untill chicken is almost completely white.");
$lemon_chicken->addInstruction("Remove lid and cook until reduced to a thick sauce.");
$lemon_chicken->addInstruction("Serve over pasta with parmesian cheese to taste");

$lemon_chicken->setYield("6 Servings");
$lemon_chicken->addTag("Main Dish");
$lemon_chicken->addTag("Dinner");
$lemon_chicken->addTag("Italian");
$lemon_chicken->setSource("Alena Holligan (Treehouse)");

Store::store_recipe($db, $lemon_chicken);

echo "&#189; &#188; &#190; &#8531 &#8532; ";
echo "End of file";

?>
