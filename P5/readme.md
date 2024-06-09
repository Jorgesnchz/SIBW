# Practica 5

En esta documentación, se detalla la organización de archivos y se describe el diseño de las paginas web correspondientes a la quinta practica.

## Estructura de Archivos

- El codigo HTML se encuentra en la carpeta 'www/templates'.
  - Dentro de esta carpeta se encuentran las paginas HTML correspondientes al sitio web.
  - El código html esta implementado con la librería tiwg que permite el uso de plantillas, el archivo del cual heredan el resto es padre.html.
    - El archivo padre.html implementa una plantilla original a la que se le debe añadir los siguientes bloques: css, titulo, script, menu, contenido, pie_pagina.
  - El resto de archivos html son las páginas web que implementan los bloques necesarios de la plantilla.

- El codigo CSS esta ubicado en la carpeta 'www/styles'.
  - Dentro de esta carpeta se encuentran los estilos CSS utilizados para el sitio web.
  - Se han implementado 3 modelos de páginas web CSS.

- El codigo JavaScript esta ubicado en la carpteta 'www/scripts'
  - Dentro de esta carpeta se encuentra el codigo usado para el panel de comentarios de las actividades.

- En la carpeta 'www/sql' se encuentra el código sql para montar la base de datos.

- En la carpeta 'www/models' se encuentra el código correspondiente a las peticiones realizadas al la base de datos y la conexión a esta.

- En la carpeta 'www/images' encontramos todas las imágenes que usa nuestro servidor.
  - Dentro de esta carpeta esta la subcarpeta actividades, detro de la cual están las imagenes correspondientes a las actividades.
      - Dentro de esta a su vez encontramos la carpeta uploads que contiene las imagenes nuevas subidas mediante los fomularios. 

- Las páginas php las podemos encontrar en la carpeta 'www/' o las relacionadas directamente con eventos de formularios en la carpeta 'www/controllers'

- El código AJAX se encuentra en el archivo 'www/scripts/ajax.js'

## Ejecución

Para ejecutar el servidor es necesario el uso de la pila LAMP

Una vez que LAMP esté instalado, debes crear una base de datos con el nombre SIBW y seguir los pasos del archivo 'www/sql/SIBW.sql'
