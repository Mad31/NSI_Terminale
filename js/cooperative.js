var joueur = 1;
var jeu = 0;
var scorej1 = 0;
var scorej2 = 0;
var grille = new Array(0,0,0,0,0,0,0,0,0);

function bonjour()
{
    var msg="Bienvenue au jeu du morpion";
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

function score()
{
    document.getElementById("score1").innerHTML=scorej1;
    document.getElementById("score2").innerHTML=scorej2;
}
function raz()
{
    for (var pas = 1; pas < 10; pas++)
    {
    image = document.getElementById('img'+pas);
    image.setAttribute("src","images/vide.png");
    }

    jeu = 1;

    for(var i=0; i<grille.length; i++)
    {
        grille[i] = 0
    }

    alert("C'est parti, que le meilleur gagne")
}

function croixrond(numero) 
{
    if (jeu==1 && joueur==1 && grille[numero-1]==0)
    {   
        image = document.getElementById('img'+numero);
        image.setAttribute("src","images/rond.png");
        grille[numero-1]=1;
        joueur = 2
    }
    else if (jeu==1 && joueur==2 && grille[numero-1]==0)
    {
        image = document.getElementById('img'+numero);
        image.setAttribute("src","images/croix.png");
        grille[numero-1]=2
        joueur = 1;
    }

}