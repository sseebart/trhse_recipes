//alert ('it works!');

const new_date        = new Date();
const current_year    = new_date.getFullYear();
const copyright_year  = document.getElementById('curr_year');

copyright_year.innerText = current_year;
