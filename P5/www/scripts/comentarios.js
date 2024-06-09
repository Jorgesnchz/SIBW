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
function FormularioEditar(id){
    var formulariocomentarios = document.getElementById('formulario_editar' + id);

    if (window.getComputedStyle(formulariocomentarios).display === 'none'){
        formulariocomentarios.style.display = 'block';
        aparece(formulariocomentarios);
    }
    else{

        desaparece(formulariocomentarios);
        setTimeout(function() {
            formulariocomentarios.style.display = 'none';
        }, 500);
    }
    
}