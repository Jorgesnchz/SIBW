
function PalabraAjax(value){
    palabra = value;
    lista = document.getElementById("listaBusqueda");
    
    if(value == "") {
        lista.style.display = "none";
        return;
    }
    else{
        lista.style.display = "block";
    }	
    
    $.ajax({
        data: {value},
        url: 'index.php',
        type: 'get',
        beforeSend: function () {
          $("#mensaje").show();
        
        },
        success: function(respuesta) {
          procesaRespuestaAjax(respuesta);
          $("#mensaje").hide();
        }
    });
    
}


function procesaRespuestaAjax(respuesta){
    lista.innerHTML = "";
    palabras = JSON.parse(respuesta);
    getPalabrasParecidas(palabras, palabra);
  
}

function getPalabrasParecidas(palabras, palabra){
  var add = true;
    for(i = 0; i < palabras.length; i++) {
          for(j = 0; j < palabra.length; j++){
              if(palabras[i].nombre[j] != palabra[j] && palabras[i].nombre[j].toLowerCase() != palabra[j] ){
                  add = false;
                  break;
              }
          }
          
          if(add == true){
              
            var elemento = document.createElement('li');
            var enlace = document.createElement('a');
            
            enlace.href = palabras[i].enlace;
            enlace.appendChild(elemento);

            elemento.textContent = palabras[i].nombre;

            lista.appendChild(enlace);  
            
          }
          
      add = true;
    }
} 