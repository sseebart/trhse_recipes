<html>
<head>
  <title>
    A Recipe Application
  </title>
  <link type="text/css" rel="stylesheet" href="../css/reset.css">
  <link type="text/css" rel="stylesheet" href="../css/entry.css">
</head>

<body>
  <header>
    <h1>Enter a new recipe</h1>
    <nav>
      <ul>
        <li>View Recipes</li>
      </ul>
  </header>

  <main>
    <label for="title">Recipe Title</label>
    <input type="text" id="recipe-name" placeholder="Put a unique title here">

    <label for="build-item">Ingredient</label>
    <div id="build-item">
      <input type="text" id="amount" placeholder="amt." class="item-group">
      <select id="measure" class="item-group">
        <option>Select...</option>
        <option>tablespoon</option>
        <option>teaspoon</option>
        <option>cup</option>
        <option>quart</option>
        <option>gallon</option>
        <option>dram</option>
        <option>ounce</option>
        <option>gram</option>
        <option>milliliter</option>
        <option>liter</option>
      </select>
      <input type="text" id="item" class="item-group"   placeholder="Ingredient">
      <button id="add-item-button">Add Item</button>
    </div>

    <label for="instruction">Instructions</label>
    <textarea id="instruction" placeholder="Type out the instructions one at a time."></textarea>
  </main>

  <aside>
    <div id="title-echo"></div>
    <div id="ingredients"></div>
    <div id="instructions"></div>

  </aside>

  <footer>
    &copy; <span id="curr_year"></span> Seebart Computer Consulting
  </footer>
  <script type="text/javascript" src="../js/entry.js"></script>
</body>
