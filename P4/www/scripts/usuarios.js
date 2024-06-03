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
function FormularioEditarUsuario(id){
    var formulariousuarios = document.getElementById('formulario_editar_usuario' + id);

    if (window.getComputedStyle(formulariousuarios).display === 'none'){
        formulariousuarios.style.display = 'block';
        aparece(formulariousuarios);
        
    }
    else{

        desaparece(formulariousuarios);
        setTimeout(function() {
            formulariousuarios.style.display = 'none';
        }, 500);

    }
    
}