//Aparece un elemento de forma gradual
function aparece(element) {
    element.style.opacity = 0;
    var tick = function () {
        //Aumenta la opacidad del elemento, en 100 pasos
        element.style.opacity = +element.style.opacity + 0.01;
        if (+element.style.opacity < 1) {
            (window.requestAnimationFrame && requestAnimationFrame(tick)) || setTimeout(tick, 16);
        }
    };
    tick();
}

//Desaparece un elemento de forma gradual
function desaparece(element) {
    element.style.opacity = 1;
    var tick = function () {
        //Disminuye la opacidad del elemento, en 100 pasos
        element.style.opacity = +element.style.opacity - 0.01;
        if (+element.style.opacity > 0) {
            (window.requestAnimationFrame && requestAnimationFrame(tick)) || setTimeout(tick, 16);
        } else {
            element.style.display = 'none';
        }
    };
    tick();
}

//Función para mostrar el formulario de edición de un usuario
function FormularioLogIn(){
    var formularioLogIn = document.getElementById('formulario_login');

    if (window.getComputedStyle(formularioLogIn).display === 'none'){
        formularioLogIn.style.display = 'block';
        aparece(formularioLogIn);
        
        //Se aplicara a todos los elementos hijos del contenedor de informacion
        var elements = document.querySelectorAll('.contenido > *'); 
        for (var i = 0; i < elements.length; i++) {
            //Difumina los elementos que no sean el panel de valoraciones ni el formulario de valoraciones ni el dialogo modal
            if ( window.getComputedStyle(elements[i]).zIndex !== '5') {
                elements[i].classList.add('blur');
            }
        }
        
    }
    else{
        var elements = document.querySelectorAll('.contenido > *');
        for (var i = 0; i < elements.length; i++) {
            elements[i].classList.remove('blur');
        }
        desaparece(formularioLogIn);
        setTimeout(function() {
            formularioLogIn.style.display = 'none';
        }, 500);

    }
    
}