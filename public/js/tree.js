var toggler = document.getElementsByClassName("category-caret");
var i;

for (i = 0; i < toggler.length; i++) {
  toggler[i].addEventListener("click", function() {
     //this.parentElement.querySelector(".nested-tree").classList.toggle("active-tree");
    //this.classList.toggle("caret-down");
  });
}
