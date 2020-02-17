<html>
<head>
  <title>
    A Recipe Application
  </title>
  <link type="text/css" rel="stylesheet" href="../css/entry.css">
  <link type="text/css" rel="stylesheet" href="../css/reset.css">
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
    <input type="text" id="title" placeholder="Put a catchy, unique title here">

    <label for="build-item">Ingredient</label>
    <div id="build-item">
      <input type="text" id="amount" placeholder="#">
      <select id="measure">
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
      <input type="text" id="item" placeholder="Ingredient">
    </div>

    <label for="instruction">Instructions</label>
    <textarea id="instruction" placeholder="Type out the instructions one at a time."></textarea>
  </main>

  <footer>
    &copy; <span id="curr_year"></span> Steven Ashly Consulting
  </footer>
  <script type="text/javascript" src="../js/entry.js"></script>
</body>
