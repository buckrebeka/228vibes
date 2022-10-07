
let del= document.getElementsByClassName("del");
    function sure(del) {
        if (confirm('Voulez vous supprimer?')) {
            window.location.href = "delet-category.php?Nom=" + myVar ;
        }
    }