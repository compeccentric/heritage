window.addEventListener("DOMContentLoaded", (event) => {
  // Toggle the side navigation
  const sidebarToggle = document.body.querySelector("#sidebarToggle");
  if (sidebarToggle) {
    // Uncomment Below to persist sidebar toggle between refreshes
    // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
    //     document.body.classList.toggle('sb-sidenav-toggled');
    // }
    sidebarToggle.addEventListener("click", (event) => {
      event.preventDefault();
      document.body.classList.toggle("sb-sidenav-toggled");
      localStorage.setItem(
        "sb|sidebar-toggle",
        document.body.classList.contains("sb-sidenav-toggled")
      );
    });
  }
});




// $("#load-screen")
//   .delay(400)
//   .fadeOut(300, function () {
//     $(this).remove();
//   });

// document.getElementById("selectAllBoxes").addEventListener("click",  myFunction);

// function myFunction() {
// let checkedStatus = document.querySelector("#selectAllBoxes").checked;
//   if (checkedStatus) {
//       var posts = document.getElementsByClassName("checkBoxes");
//       for (var i = 0; i < posts.length; i++) {
//         posts[i].checked = true;
//       }
//   } else {
//     var posts = document.getElementsByClassName("checkBoxes");
//     for (var i = 0; i < posts.length; i++) {
//       posts[i].checked = false;
//     }
//   }
// };

// function loadUsersOnline() {

//   $.get("../functions.php?onlineusers=result",  function (data){
//     $(".usersonline").text(data);
//   });
// }

// setInterval(function () {

//   loadUsersOnline();

// }, 500);
