//Al hacer click en el boton de valoraciones se muestra el panel de valoraciones y el formulario de valoraciones o se oculta si ya esta visible
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
        setTimeout(function() {
            quitarDifuminado();;
        }, 500);
    }
}

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

//Difumina el resto de elementos de la pagina
function difumina() {
    //Se aplicara a todos los elementos hijos del contenedor de informacion
    var elements = document.querySelectorAll('.contenedor_informacion > *'); 
    for (var i = 0; i < elements.length; i++) {
        //Difumina los elementos que no sean el panel de valoraciones ni el formulario de valoraciones ni el dialogo modal
        if (window.getComputedStyle(elements[i]).zIndex !== '1'  && window.getComputedStyle(elements[i]).zIndex !== '3') {
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
        
        // Y sale de la funcion sin añadir la valoracion
        return; 
    }

    //Comprueba que el email se valido
    var correo = /^[a-z0-9._]+@[a-z]+\.[a-z.]{2,}$/;
    if (correo.test(email)) {
            // Crea una nueva valoracion
            var valoracion = document.createElement('div');
            valoracion.classList.add('valoracion');

            // Crea el nombre 
            var nombreElemento = document.createElement('h5');
            nombreElemento.textContent = nombre;

            // Crea el comentario 
            var comentarioElemento = document.createElement('p');
            comentarioElemento.style.wordWrap = 'break-word';
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
            //Espera 2 segundo y desaparece el mensaje de error
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

// Comprueba si el comentario contiene palabras restringidas y las censura
function compruebaPalabras( palabrasProhibidas) {
    var comentario = document.getElementById('comentario').value;

    // Comprueba si el comentario contiene palabras restringidas, si las tiene las censura
    for (var i = 0; i < palabrasProhibidas.length; i++) {
        var palabra = palabrasProhibidas[i];
        
        // 'gi' para que sea insensible a mayúsculas y minúsculas
        var prohibidas = new RegExp(palabra, 'gi');
        
        if (prohibidas.test(comentario)) {
            comentario = comentario.replace(prohibidas, '*'.repeat(palabra.length));
        }
    }
    // Actualiza el valor del comentario
    document.getElementById('comentario').value = comentario;
}


//Aparece el formulario de manera gradual
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

