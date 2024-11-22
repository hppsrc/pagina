// Global
let metaDescription = document.querySelector('meta[name="title"]');
document.title =  `${metaDescription.content} - CulturaTech`;

// header.php

let navVar = document.getElementById("nav");
let actionVar = document.getElementById("actions");

let temph = false;

actionVar.addEventListener('click', function() {
    
    if (temph) {
        temph = false;
        navVar.style.height = "0px";
        navVar.style.padding = "0px";
        navVar.style.fontSize = "0px";
    } else {
        temph = true;
        navVar.style.height = "5%";
        navVar.style.padding = "1%";
        navVar.style.fontSize = "medium";
    }

})

// inicio.php

let infoVar = document.getElementById("infobox");

function showInfo(value) {
    // Obtener la posición del ratón
    let x = event.clientX; // Horizontal
    let y = event.clientY; // Vertical
    let temp;

    infoVar.style.display = "block";

    switch (value) {
        case 0:
            temp = "Una lista de los videos mejor calificados de las últimas dos semanas.";
            break;
        case 1:
            temp = "Videos publicados recientemente.";
            break;
        case 2:
            temp = "Videos sugeridos.";
            break;
        case 3:
            temp = "Si no estas registrado esta sera tu contraseña.";
            break;
        default:
            temp = "";
            infoVar.style.display = "none";
            break;
    }
    
    infoVar.style.position = "absolute";
    infoVar.style.top = `${y + 10 + window.scrollY}px`; 
    infoVar.style.left = `${x + 10}px`;
    // infoVar.style.width = temp.length*5+"px";

    infoVar.textContent = temp;
    
}

