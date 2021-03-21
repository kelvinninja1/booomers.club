

var currentPage = "admin/dashboard";
console.log("Current Page Should be: "+currentPage);

$(document).ready(function(){
  // loadCurrentPage();
  // ReactDOM.render(
  //     <Dashboard name="Admin"/>,
  //     document.getElementById('pages-area'));
});


function gotoPage(page){
  console.log("Current Page Should be: "+page);
  currentPage = page;
  renderPage(page);

}

function renderPage(page){
  if (page == "admin/dashboard") {

    ReactDOM.render(
        <AdminDashboard value="Admin"/>,
        document.getElementById('pages-area'));

  } else if (page == "admin/addRestaurants") {

    ReactDOM.render(
        <AdminDashboard value="Admin"/>,
        document.getElementById('pages-area'));

  } else if (page == "admin/approvalsRestaurant") {

    ReactDOM.render(
        <AdminDashboard value="Approvals/>,
        document.getElementById('pages-area'));

  } else if (page == "admin/manageRestaurants") {

    ReactDOM.render(
        <AdminDashboard value="Restaurants"/>,
        document.getElementById('pages-area'));

  } else if (page == "admin/reportsRestaurants") {

    ReactDOM.render(
        <AdminDashboard value="Reports"/>,
        document.getElementById('pages-area'));

  } else {

    ReactDOM.render(
        <AdminDashboard value="404"/>,
        document.getElementById('pages-area'));

  }
}

function loadCurrentPage(){
  // console.log("Current Page Should be: "+page);
  // page = currentPage;
  console.log("Current Page Should be: "+currentPage);

}

function fetchJSON(linkHead, file) {
  var linkHead = linkHead;
  var file = file;
  var link = linkHead+file;
  var ourRequest = new XMLHttpRequest();
  ourRequest.open('GET', link);
  ourRequest.onload = function(){
    var ourData = ourRequest.responseText;
    var ourData = JSON.parse(ourRequest.responseText);
    console.log(ourData);
    renderHTML(ourData);
  };
  ourRequest.send();
}
