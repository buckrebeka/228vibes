
var user = document.getElementById("myUserModal");
var profil = document.getElementById("myUser");
var span = document.getElementById("clore");
profil.addEventListener( "click",function(){
    user.style.display = "block";
    console.log(user);
  })
// profil.addEventListener(onclick)
span.addEventListener( "click",function() {
  user.style.display = "none";
})
window.addEventListener("click",function() {
    user.style.display = "none";
  }
 )