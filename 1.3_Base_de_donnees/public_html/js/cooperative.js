var joueur = 1;
var jeu = 0;
var scorej1 = 0;
var scorej2 = 0;
var grille = new Array(0,0,0,0,0,0,0,0,0);

function bonjour()
{
    var msg="Bienvenue à la Coopérative";
    alert(msg);
    score()
}

function ChangeCouleur(color)
{
    document.body.style.backgroundColor = color;
 
}

function couleurtitre()
{   var h1 = document.querySelector("h1");
    if ( h1.style.background == "red")
    {
        h1.style.background = "blue";
    }
    else 
    {
        h1.style.background = "red";
    }
}

