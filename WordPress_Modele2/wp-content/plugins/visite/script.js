var recto=document.getElementById("recto");
var verso=document.getElementById("verso");
var carte=document.getElementById("carte");

carte.addEventListener("click",function(){
    if(recto.getAttribute("class")=="colonne"){
        verso.setAttribute("class","colonne");
        recto.setAttribute("class","colonne invisible");
    }else{
        recto.setAttribute("class","colonne");
        verso.setAttribute("class","colonne invisible");
    }
    
});