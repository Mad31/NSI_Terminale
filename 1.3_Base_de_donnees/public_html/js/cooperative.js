
function bonjour()
{
    var msg="Bienvenue à la Coopérative";
    alert(msg);
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

