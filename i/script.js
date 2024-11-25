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
        navVar.style.height = "auto";
        navVar.style.padding = "1%";
        navVar.style.fontSize = "medium";
    }

})

// info.php
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
            temp = "Esto es opcional, asegurate que el link permite la visualización.";
            break;
        case 4:
            temp = "Esto es opcional, el video se mostrara en los videos recientemente publicados.<br>Desactivarlo no evita que pueda ser encontrado, visto o sugerido.";
            break;
        case 5:
            temp = 'Ingresa el ID de tu video, da click en "Guía" para más información.';
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

    infoVar.innerHTML = temp;
    
}

// modal.php
let overlayVar = document.getElementById("overlay");
let mdboxVar = document.getElementById("mdbox");
let mdtltVar = document.getElementById("mdtlt");
let mdtxtVar = document.getElementById("mdtxt");
let mdbtnVar = document.getElementById("mdbtn");

function modal(value, title, text) {

    overlayVar.style.visibility = "visible";

    if (value == -1) {
        overlayVar.style.visibility = "hidden";
    }

    mdtltVar.textContent = title;
    mdtxtVar.innerHTML = text;

}

mdbtnVar.addEventListener('click', function () {
    modal(-1)
});

// registro.php
if (metaDescription.content == "Registrarse" ) {
    let continueModalVar = document.getElementById("continueModal");
    let submitVar = document.getElementById("submit");
    continueModalVar.addEventListener('click', function () {
        modal(0, "Aviso",
            "Al registrate se te asignara un ID unico a tu video. Este no puede ser modificado, además, solo tienes permitido realizar una modificación una vez es publicado.<br><br>"+
            "Para garantizar tu seguridad se vinculara esta ip con tu cuenta, eso significa que solo puedes acceder desde esta misma.<br>"+
            "La contraseña que introduzcas sera la asignada para tu cuenta y no puede ser modificada.<br><br>Para continuar, presiona Acceder."
        )
    });
    
}

// publicar.php
if (metaDescription.content == "Publicar un video" ) {
    let guidemodelVar = document.getElementById("guidemodel");
    guidemodelVar.addEventListener('click', function () {
        modal(0, "¿Cómo hacer tu presentación?",
            "Este pequeño texto te dara una idea general de cómo presentar tu ponencia.<br><br>"+
            "Se recomienda que tu video dure minimo 5 minutos, tenga buena iluminación y que se te escuche claramente.<br>"+
            "Si utilizaras diapositivas asegurate que sea visibles en el video, una recomendación es que uses un video super puesto con las diapostivas actuales.<br><br>"+
            "Para el formulario actual utiliza el titulo de tu ponencia, una descripción corta.<br>"+
            "El link de tu video de YouTube tiene el siguiente formato: <br><b>https://www.youtube.com/watch?v=01234567890</b><br>Para subir el video solo debes tomar el <b>01234567890</b> e introducirlo en el campo correspondiente.<br>"
        )
    });
    let prepublishVar = document.getElementById("pre-publish");
    prepublishVar.addEventListener('click', function () {
        modal(0, "Antes de publicar....",
            "Al publicar el video, todo el mundo podra verlo desde ese instante.<br>"+
            "Además, si deseas hacer una modificación solo podras hacerlo una vez.<br>"+
            "Verifica que todo la información sea correcta.<br><br>"+
            "Tu video puede ser reportado por otras personas, si recibe 10 reportes se inhabilitara tu cuenta y tu video no estara disponible de nuevo.<br><br>"+
            'Cuando estes listo, presiona "Publicar ahora" nuevamente.'
        )
        prepublishVar.style.display = "none";
        document.getElementById("publish").style.display = "block";
    });
}
