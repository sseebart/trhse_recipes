// Main javascript suppport for the recipe application entry page
// Author: Steve Seebart, 2020

// Functions
function echoTitle () {
     //alert(recipeName.value);
  const titleAside          = document.querySelector('#title-echo');
  if (titleAside.hasChildNodes()) {
    titleAside.innerHTML  = '';
  }
  const titlePara           = document.createElement('p');
  titlePara.innerText       = recipeName.value;
  //const titleAside          = document.querySelector('#title-echo');
  titleAside.appendChild(titlePara);
}

function addIngredient () {
  const ingAmount         = document.querySelector('#amount').value;
  const ingMeasure        = document.querySelector('#measure').value;
  const ingItem           = document.querySelector('#item').value;
  const newItem           = `${ingAmount} ${ingMeasure} ${ingItem}`;
  const ingDiv            = document.querySelector('#ingredients');
  const itemPara          = document.createElement('p');
  itemPara.innerText      = newItem;
//debugger;
  document.querySelector('#amount').value           = "";
  document.querySelector('#measure').selectedIndex  = 1;
  document.querySelector('#item').value             = "";

  ingDiv.appendChild(itemPara);
  document.querySelector('#amount').focus();
}

// Page initialization items
const new_date            = new Date();
const current_year        = new_date.getFullYear();
const copyright_year      = document.querySelector('#curr_year');
const recipeName          = document.querySelector('#recipe-name');
const addItemButton       = document.querySelector('#add-item-button')

recipeName.focus();
copyright_year.innerText  = current_year;

//console.log(recipeName);

// Event handlers
recipeName.addEventListener('blur', echoTitle);
addItemButton.addEventListener('click', addIngredient)
