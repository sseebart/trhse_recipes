<html>
<head>
  <title>
    A Recipe Application
  </title>
  <link type="text/css" rel="stylesheet" href="../css/reset.css">
  <link type="text/css" rel="stylesheet" href="../css/entry.css">
  <link href="https://fonts.googleapis.com/css2?family=Padauk&display=swap" rel="stylesheet">
</head>

<body>
  <header>
    <h1>Enter a new recipe</h1>
  </header>

  <nav>
    <ul>
      <li>View Recipes</li>
    </ul>
  </nav>

  <main>
    <label for="title">Recipe Title</label>
    <input type="text" id="recipe-name" placeholder="Put a unique title here">

    <label for="build-item">Ingredient</label>
    <div id="build-item">
      <select id="amount" class="item-group">
        <option>&frac18;</option>
        <option>&frac14;</option>
        <option>&frac13;</option>
        <option>&frac12;</option>
        <option>&frac23;</option>
        <option>&frac34;</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
      </select>
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
        <option>whole</option>
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
