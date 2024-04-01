//Al clicak en el boton de valoraciones se muestra el panel de valoraciones y el formulario de valoraciones
function mostrarValoraciones() {
    var panelValoraciones = document.getElementById('panel_valoraciones');
    var formularioValoracion = document.getElementById('formulario_valoracion');
    
    //Si el panel de valoraciones no esta visible se muestra
    if (window.getComputedStyle(panelValoraciones).display === 'none') {
        //Hace visible el panel de valoraciones y el formulario de valoraciones
        panelValoraciones.style.display = 'block';
        aparece(panelValoraciones);
        formularioValoracion.style.display = 'block';
        aparece(formularioValoracion);
        
        //Difumina el resto de elementos
        difumina();
    } 
    //Si el panel de valoraciones esta visible se oculta
    else{
        //Desaparece el panel de valoraciones y el formulario de valoraciones
        desaparece(formularioValoracion);
        desaparece(panelValoraciones);
        //Quita el difuminado
        quitarDifuminado();
    }
}

//Aparece un elemento de forma gradual
function aparece(element) {
    element.style.opacity = 0;
    var tick = function () {
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
        element.style.opacity = +element.style.opacity - 0.01;
        if (+element.style.opacity > 0) {
            (window.requestAnimationFrame && requestAnimationFrame(tick)) || setTimeout(tick, 16);
        } else {
            element.style.display = 'none';
        }
    };
    tick();
}

//Difumina el resto de elementos de la pagina
function difumina() {
    var elements = document.querySelectorAll('.contenedor_informacion > *'); 
    for (var i = 0; i < elements.length; i++) {
        if (window.getComputedStyle(elements[i]).zIndex < '1' ) {
            elements[i].classList.add('blur');
        }
    }
}

//Quita el difuminado de los elementos de la pagina
function quitarDifuminado() {
    var elements = document.querySelectorAll('.contenedor_informacion > *');
    for (var i = 0; i < elements.length; i++) {
        elements[i].classList.remove('blur');
    }
}

//Añade una valoracion al panel 
function aniadeValoracion(){

    // Obtiene los valores de los campos del formulario
    var nombre = document.getElementById('nombre').value;
    var email = document.getElementById('email').value;
    var comentario = document.getElementById('comentario').value;
    var dialogoModal = document.getElementById('dialogo_modal');
    
    // Comprueba que los campos no esten vacios
    if (nombre.trim() === '' || email.trim() === '' || comentario.trim() === '') {
        
        // Si alguno de los campos está vacío, muestra un mensaje de error
        dialogoModal.textContent = 'Por favor, completa todos los campos.';
        dialogoModal.style.display = 'block';
        
        aparece(dialogoModal);
        //Espera 2 segundo y desaparece el mensaje de error
        setTimeout(function() {
            desaparece(dialogoModal);
        }, 2000);
        
        // Y sale de la funcion sin continuar
        return; 
    }

    //Comprueba que el email se valido
    var regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (regex.test(email)) {
            // Crea una nueva valoracion
            var valoracion = document.createElement('div');
            valoracion.classList.add('valoracion');

            // Crea el nombre 
            var nombreElemento = document.createElement('h5');
            nombreElemento.textContent = nombre;

            // Crea el comentario 
            var comentarioElemento = document.createElement('p');
            comentarioElemento.textContent = comentario;

            // Añade la fecha y hora de cuando se envía
            var fechaHora = new Date();
            var fechaHoraElemento = document.createElement('h5');
            fechaHoraElemento.textContent = fechaHora.toLocaleString();

            // Añade los elementos a la valoracion
            valoracion.appendChild(nombreElemento);
            valoracion.appendChild(comentarioElemento);
            valoracion.appendChild(fechaHoraElemento);

            // Añade el div al panel de valoraciones
            var panelValoraciones = document.getElementById('panel_valoraciones');
            panelValoraciones.appendChild(valoracion);
    
            // Limpia los campos del formulario
            document.getElementById('nombre').value = '';
            document.getElementById('email').value = '';
            document.getElementById('comentario').value = '';

            // Muestra un mensaje de confirmacion al usuario
            dialogoModal.textContent = 'Gracias por tu valoración';
            dialogoModal.style.display = 'block';
            
            aparece(dialogoModal);
            //Espera 1 segundo y desaparece el mensaje de error
            setTimeout(function() {
                desaparece(dialogoModal);
            }, 2000);
    } else {
        // Si no es valido se informa al usuario y no se añade la valoracion
        dialogoModal.textContent = 'Dirección de correo no válida';
        dialogoModal.style.display = 'block';
        
        aparece(dialogoModal);
        //Espera 2 segundo y desaparece el mensaje de error
        setTimeout(function() {
            desaparece(dialogoModal);
        }, 2000);
        return; // Sale de la funcion sin continuar
    }
}

//Comprueba si el comentario contiene palabras restringidas y las censura
function compruebaPalabras() {
    var palabrasRestringidas = ["Estafa", "Robo", "Atraco", "Fraude", "Engaño", "Mentira", "Estafador", "Ladron", "Timo"];
    var comentario = document.getElementById('comentario').value;

    // Comprueba si el comentario contiene palabras restringidas, si las tiene las censura
    for (var i = 0; i < palabrasRestringidas.length; i++) {
        var palabraRestringida = palabrasRestringidas[i];
        
        // 'gi' para búsqueda global e insensible a mayúsculas/minúsculas, 
        //para evitar censurar palabras que contengan la palabra restringida
        //solo se censuran las palabras sueltas, no seguidas por otra letra
        var regex = new RegExp("\\b" + palabraRestringida + " ", 'gi'); 
        
        if (regex.test(comentario)) {
            comentario = comentario.replace(regex, '*'.repeat(palabraRestringida.length));
        }
    }

    // Actualiza el valor del comentario
    document.getElementById('comentario').value = comentario;
}
