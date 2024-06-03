    ---COMO ROOT
create database SIBW;

create user 'Jorgesnchz'@'%' identified by 'jorgesnchz';
grant all privileges on SIBW.* to 'Jorgesnchz'@'%';
flush privileges;

    ---COMO JORGESNCHZ
use SIBW;

create table imagenes(
    id int primary key auto_increment,
    actividad_id int,
    direccion varchar(255)
);

create table hashtags(
    id int primary key auto_increment,
    actividad_id int,
    hashtag varchar(255)
);

create table actividades(
    id int primary key auto_increment,
    nombre varchar(255),
    descripcion text,
    precio varchar(255),
    fecha varchar(255),
    enlace varchar(255),
    actividad_id int,
    direccion varchar(255)
);

insert into imagenes(actividad_id, direccion) values(1, 'images/actividades/senderismo.jpg');
insert into imagenes(actividad_id, direccion) values(1, 'images/actividades/senderismo2.jpg');
insert into imagenes(actividad_id, direccion) values(1, 'images/actividades/senderismo3.jpeg');

insert into hashtags(actividad_id, hashtag) values(1, '#MonteRainier');
insert into hashtags(actividad_id, hashtag) values(1, '#Senderismo');
insert into hashtags(actividad_id, hashtag) values(1, '#Aventura');

insert into actividades(nombre, descripcion, precio, fecha, enlace) values('Senderismo en el Monte Rainier', 
                    '<p>¡Descubre la majestuosidad del Monte Rainier a través del senderismo! 
                    Esta actividad te sumerge en la belleza natural de uno de los picos 
                    más imponentes de América del Norte.
                    Desde praderas alpinas hasta glaciares centelleantes, cada paso te 
                    acerca a la grandeza de este icónico volcán.</p>
                    
                    <p>Para disfrutar plenamente de esta experiencia, asegúrate de llevar 
                    el equipo adecuado. Necesitarás botas de senderismo resistentes para 
                    enfrentar terrenos variados, especialmente en las partes más 
                    escarpadas del camino. Una mochila cómoda y espaciosa es esencial
                    para transportar agua, alimentos, un mapa y una brújula. La ropa de 
                    capas te protegerá del impredecible clima de montaña, 
                    incluyendo chaquetas impermeables y prendas térmicas.</p>

                    <p>Además, no olvides el equipo de seguridad, como un botiquín de 
                    primeros auxilios, linterna, silbato y protección solar. 
                    Dependiendo de la temporada, puede ser necesario llevar crampones 
                    y piolets para navegar por terrenos nevados o glaciar. Un bastón de 
                    trekking puede proporcionar estabilidad adicional en terrenos irregulares.</p>
                    
                    <p>Recuerda siempre investigar las condiciones del camino y la previsión 
                    meteorológica antes de embarcarte en tu aventura. El Monte Rainier 
                    ofrece senderos para todos los niveles, desde caminatas suaves hasta 
                    ascensos técnicos. Sea cual sea tu elección, prepárate para ser testigo de 
                    la grandeza natural que solo la montaña puede ofrecer. ¡Emprende tu 
                    viaje y deja que el Monte Rainier te inspire!</p>', 
                    '100$', 
                    'Todo el año',
                    'actividad.php?id=1');

insert into imagenes(actividad_id, direccion) values(2, 'images/actividades/escalada.jpg');
insert into imagenes(actividad_id, direccion) values(2, 'images/actividades/escalada2.jpg');
insert into imagenes(actividad_id, direccion) values(2, 'images/actividades/escalada3.jpg');

insert into hashtags(actividad_id, hashtag) values(2, '#Leavenworth');
insert into hashtags(actividad_id, hashtag) values(2, '#Escalada');
insert into hashtags(actividad_id, hashtag) values(2, '#Aventura');

insert into actividades(nombre, descripcion, precio, fecha, enlace) values('Escalada en Leavenworth',
                    '<p>¡Desafía tus límites con la escalada en Leavenworth! 
                    Esta actividad te lleva a las alturas de las majestuosas 
                    montañas de Washington, donde la roca y el cielo se encuentran 
                    en un desafío de habilidad y resistencia.</p>
                    
                    <p>Para disfrutar plenamente de esta experiencia, asegúrate de 
                    tener el equipo adecuado. Necesitarás arneses, cascos, cuerdas 
                    y mosquetones para escalar con seguridad. Los zapatos de escalada 
                    proporcionan agarre en las superficies rocosas, mientras que la 
                    magnesia mantiene tus manos secas y libres de sudor. Un casco 
                    protege tu cabeza de caídas y rocas sueltas, mientras que los 
                    guantes te protegen de las abrasiones y cortes.</p>
                    
                    <p>Además, no olvides el equipo de seguridad, como un botiquín de 
                    primeros auxilios, linterna, silbato y protección solar. Dependiendo 
                    de la temporada, puede ser necesario llevar crampones y piolets 
                    para navegar por terrenos nevados o glaciar. Un bastón de trekking 
                    puede proporcionar estabilidad adicional en terrenos irregulares.</p>
                    
                    <p>Recuerda siempre investigar las condiciones del camino y la previsión 
                    meteorológica antes de embarcarte en tu aventura. Leavenworth ofrece 
                    rutas de escalada para todos los niveles, desde principiantes hasta 
                    expertos. Sea cual sea tu elección, prepárate para desafiar tus límites 
                    y alcanzar nuevas alturas. ¡Emprende tu viaje y deja que Leavenworth 
                    te eleve!</p>', 
                    '150$', 
                    'Primavera y verano',
                    'actividad.php?id=2');

insert into imagenes(actividad_id, direccion) values(3, 'images/actividades/observatorio.jpg');
insert into imagenes(actividad_id, direccion) values(3, 'images/actividades/observatorio2.png');
insert into imagenes(actividad_id, direccion) values(3, 'images/actividades/observatorio3.jpeg');

insert into hashtags(actividad_id, hashtag) values(3, '#Goldendale');
insert into hashtags(actividad_id, hashtag) values(3, '#Observatorio');
insert into hashtags(actividad_id, hashtag) values(3, '#Astronomía');

insert into actividades(nombre, descripcion, precio, fecha, enlace) values('Observatorio Goldendale',
                    '<p>¡Explora los misterios del universo en el Observatorio Goldendale! 
                    Esta actividad te sumerge en el fascinante mundo de la astronomía, 
                    donde las estrellas, planetas y galaxias se convierten en tus guías 
                    a través del cosmos.</p>
                    
                    <p>Para disfrutar plenamente de esta experiencia, asegúrate de llevar 
                    el equipo adecuado. Un telescopio portátil te permitirá observar los 
                    astros con claridad y detalle, mientras que una linterna roja protege 
                    tu visión nocturna. Un cuaderno de observación te permite registrar 
                    tus descubrimientos y reflexiones, mientras que una guía de campo 
                    te ayuda a identificar las constelaciones y planetas.</p>
                    
                    <p>Además, no olvides el equipo de seguridad, como un botiquín de 
                    primeros auxilios, linterna, silbato y protección solar. Dependiendo 
                    de la temporada, puede ser necesario llevar ropa de abrigo y mantas 
                    para mantenerte caliente durante las noches frías. Una silla plegable 
                    y una mesa portátil te proporcionan comodidad mientras observas el 
                    cielo estrellado.</p>
                    
                    <p>Recuerda siempre investigar las condiciones del cielo y la previsión 
                    meteorológica antes de embarcarte en tu aventura. El Observatorio 
                    Goldendale ofrece noches de observación para todos los niveles, desde 
                    principiantes hasta expertos. Sea cual sea tu elección, prepárate para 
                    maravillarte con la belleza del universo. ¡Emprende tu viaje y deja que 
                    el Observatorio Goldendale te inspire!</p>', 
                    '50$', 
                    'Todo el año', 
                    'actividad.php?id=3');

insert into imagenes(actividad_id, direccion) values(4, 'images/actividades/kayak.jpeg');
insert into imagenes(actividad_id, direccion) values(4, 'images/actividades/kayak2.jpg');
insert into imagenes(actividad_id, direccion) values(4, 'images/actividades/kayak3.jpg');

insert into hashtags(actividad_id, hashtag) values(4, '#LagoDiablo');
insert into hashtags(actividad_id, hashtag) values(4, '#Kayak');
insert into hashtags(actividad_id, hashtag) values(4, '#Aventura');

insert into actividades(nombre, descripcion, precio, fecha, enlace) values('Kayak en el lago Diablo',
                    '<p>¡Sumérgete en la belleza del lago Diablo con el kayak! 
                    Esta actividad te lleva a las aguas cristalinas de uno de los 
                    lagos más impresionantes de Washington, donde la naturaleza 
                    salvaje y la tranquilidad se encuentran en perfecta armonía.</p>
                    
                    <p>Para disfrutar plenamente de esta experiencia, asegúrate de 
                    tener el equipo adecuado. Necesitarás un kayak estable y resistente 
                    para navegar por las aguas del lago, así como un remo de calidad 
                    para impulsarte con facilidad. Un chaleco salvavidas te protege en 
                    caso de caídas al agua, mientras que una bolsa estanca mantiene tus 
                    pertenencias secas y seguras.</p>
                    
                    <p>Además, no olvides el equipo de seguridad, como un botiquín de 
                    primeros auxilios, linterna, silbato y protección solar. Dependiendo 
                    de la temporada, puede ser necesario llevar ropa de abrigo y mantas 
                    para mantenerte caliente durante las noches frías. Una silla plegable 
                    y una mesa portátil te proporcionan comodidad mientras disfrutas de 
                    un picnic en la orilla del lago.</p>
                    
                    <p>Recuerda siempre investigar las condiciones del lago y la previsión 
                    meteorológica antes de embarcarte en tu aventura. El lago Diablo 
                    ofrece aguas tranquilas y paisajes impresionantes para todos los 
                    niveles de kayakistas, desde principiantes hasta expertos. Sea cual 
                    sea tu elección, prepárate para sumergirte en la belleza natural de 
                    Washington. ¡Emprende tu viaje y deja que el lago Diablo te sorprenda!</p>', 
                    '75$', 
                    'Primavera y verano',
                    'actividad.php?id=4');

insert into imagenes(actividad_id, direccion) values(5, 'images/actividades/esqui.jpg');
insert into imagenes(actividad_id, direccion) values(5, 'images/actividades/esqui2.jpg');
insert into imagenes(actividad_id, direccion) values(5, 'images/actividades/esqui3.jpg');

insert into hashtags(actividad_id, hashtag) values(5, '#CrystalMountain');
insert into hashtags(actividad_id, hashtag) values(5, '#Esquí');
insert into hashtags(actividad_id, hashtag) values(5, '#Aventura');

insert into actividades(nombre, descripcion, precio, fecha, enlace) values('Esquí en Crystal Mountain',
                    '<p>¡Deslízate por las laderas de Crystal Mountain con el esquí! 
                    Esta actividad te lleva a las alturas de las montañas de Washington, 
                    donde la nieve fresca y el aire puro te esperan para una aventura 
                    inolvidable.</p>
                    
                    <p>Para disfrutar plenamente de esta experiencia, asegúrate de 
                    tener el equipo adecuado. Necesitarás esquís o una tabla de snowboard 
                    de calidad para deslizarte con facilidad por las pistas, así como 
                    botas resistentes y cómodas para mantener tus pies calientes y secos. 
                    Un casco te protege de caídas y lesiones, mientras que las gafas de 
                    sol protegen tus ojos de los reflejos del sol en la nieve.</p>
                    
                    <p>Además, no olvides el equipo de seguridad, como un botiquín de 
                    primeros auxilios, linterna, silbato y protección solar. Dependiendo 
                    de la temporada, puede ser necesario llevar ropa de abrigo y mantas 
                    para mantenerte caliente durante las noches frías. Una silla plegable 
                    y una mesa portátil te proporcionan comodidad mientras disfrutas de 
                    un picnic en la cima de la montaña.</p>
                    
                    <p>Recuerda siempre investigar las condiciones de la montaña y la 
                    previsión meteorológica antes de embarcarte en tu aventura. Crystal 
                    Mountain ofrece pistas para todos los niveles, desde principiantes 
                    hasta expertos. Sea cual sea tu elección, prepárate para deslizarte 
                    por la nieve fresca y disfrutar de la emoción del esquí. ¡Emprende 
                    tu viaje y deja que Crystal Mountain te emocione!</p>', 
                    '120$', 
                    'Invierno',
                    'actividad.php?id=5');

insert into imagenes(actividad_id, direccion) values(6, 'images/actividades/rafting.jpg');
insert into imagenes(actividad_id, direccion) values(6, 'images/actividades/rafting2.jpg');
insert into imagenes(actividad_id, direccion) values(6, 'images/actividades/rafting3.jpeg');

insert into hashtags(actividad_id, hashtag) values(6, '#RíoWenatchee');
insert into hashtags(actividad_id, hashtag) values(6, '#Rafting');
insert into hashtags(actividad_id, hashtag) values(6, '#Aventura');

insert into actividades(nombre, descripcion, precio, fecha, enlace) values('Rafting en el río Wenatchee',
                    '<p>¡Embárcate en una emocionante aventura de rafting en el río Wenatchee! 
                    Esta actividad te lleva a las aguas turbulentas de uno de los ríos más 
                    emocionantes de Washington, donde la adrenalina y la diversión te esperan 
                    en cada curva y ráfaga.</p>
                    
                    <p>Para disfrutar plenamente de esta experiencia, asegúrate de tener 
                    el equipo adecuado. Necesitarás un bote inflable resistente y maniobrable 
                    para navegar por las aguas rápidas y turbulentas del río, así como remos 
                    de calidad para impulsarte con fuerza y precisión. Un casco y un chaleco 
                    salvavidas te protegen en caso de caídas al agua, mientras que una cuerda 
                    de rescate te proporciona seguridad adicional.</p>
                    
                    <p>Además, no olvides el equipo de seguridad, como un botiquín de primeros 
                    auxilios, linterna, silbato y protección solar. Dependiendo de la temporada, 
                    puede ser necesario llevar ropa de abrigo y mantas para mantenerte caliente 
                    durante las noches frías. Una silla plegable y una mesa portátil te proporcionan 
                    comodidad mientras disfrutas de un picnic en la orilla del río.</p>
                    
                    <p>Recuerda siempre investigar las condiciones del río y la previsión meteorológica 
                    antes de embarcarte en tu aventura. El río Wenatchee ofrece rápidos para todos 
                    los niveles, desde principiantes hasta expertos. Sea cual sea tu elección, 
                    prepárate para desafiar las aguas bravas y disfrutar de la emoción del rafting. 
                    ¡Emprende tu viaje y deja que el río Wenatchee te emocione!</p>', 
                    '90$', 
                    'Primavera y verano',
                    'actividad.php?id=6');

insert into imagenes(actividad_id, direccion) values(7, 'images/actividades/glaciar.jpg');
insert into imagenes(actividad_id, direccion) values(7, 'images/actividades/glaciar2.jpg');
insert into imagenes(actividad_id, direccion) values(7, 'images/actividades/glaciar3.jpg');

insert into hashtags(actividad_id, hashtag) values(7, '#GlaciarColeman');
insert into hashtags(actividad_id, hashtag) values(7, '#Excursión');
insert into hashtags(actividad_id, hashtag) values(7, '#Aventura');

insert into actividades(nombre, descripcion, precio, fecha, enlace) values('Excursión al glaciar Coleman',
                    '<p>¡Explora la majestuosidad del glaciar Coleman en una emoc
                    ionante excursión! Esta actividad te lleva a las alturas de las
                    montañas de Washington, donde el hielo y la nieve se convierten
                    en tu camino hacia la grandeza natural.</p>

                    <p>Para disfrutar plenamente de esta experiencia, asegúrate de
                    tener el equipo adecuado. Necesitarás crampones y piolets para
                    navegar por los terrenos nevados y glaciares del glaciar, así como
                    cuerdas y mosquetones para asegurar tu ascenso y descenso. Un
                    casco te protege de caídas y lesiones, mientras que las gafas de
                    sol protegen tus ojos de los reflejos del sol en la nieve.</p>

                    <p>Además, no olvides el equipo de seguridad, como un botiquín de
                    primeros auxilios, linterna, silbato y protección solar. Dependiendo
                    de la temporada, puede ser necesario llevar ropa de abrigo y mantas
                    para mantenerte caliente durante las noches frías. Una silla plegable
                    y una mesa portátil te proporcionan comodidad mientras disfrutas de
                    un picnic en la cima del glaciar.</p>

                    <p>Recuerda siempre investigar las condiciones del glaciar y la
                    previsión meteorológica antes de embarcarte en tu aventura. El glaciar
                    Coleman ofrece rutas para todos los niveles, desde principiantes hasta
                    expertos. Sea cual sea tu elección, prepárate para explorar la belleza
                    natural de Washington en su forma más pura. ¡Emprende tu viaje y deja
                    que el glaciar Coleman te asombre!</p>',
                    '200$',
                    'Primavera y verano',
                    'actividad.php?id=7');

insert into imagenes(actividad_id, direccion) values(8, 'images/actividades/observacion.jpg');
insert into imagenes(actividad_id, direccion) values(8, 'images/actividades/observacion2.jpg');
insert into imagenes(actividad_id, direccion) values(8, 'images/actividades/observacion3.jpg');

insert into hashtags(actividad_id, hashtag) values(8, '#NorthCascades');
insert into hashtags(actividad_id, hashtag) values(8, '#Observación');
insert into hashtags(actividad_id, hashtag) values(8, '#Astronomía');

insert into actividades(nombre, descripcion, precio, fecha, enlace) values('Observación en North Cascades',
                    '<p>¡Maravíllate con la belleza de North Cascades en una emocionante
                    excursión de observación! Esta actividad te lleva a las alturas de las
                    montañas de Washington, donde la naturaleza salvaje y la tranquilidad
                    se encuentran en perfecta armonía.</p>

                    <p>Para disfrutar plenamente de esta experiencia, asegúrate de tener
                    el equipo adecuado. Un telescopio portátil te permitirá observar los
                    astros con claridad y detalle, mientras que una linterna roja protege
                    tu visión nocturna. Un cuaderno de observación te permite registrar tus
                    descubrimientos y reflexiones, mientras que una guía de campo te ayuda
                    a identificar las constelaciones y planetas.</p>

                    <p>Además, no olvides el equipo de seguridad, como un botiquín de primeros
                    auxilios, linterna, silbato y protección solar. Dependiendo de la temporada,
                    puede ser necesario llevar ropa de abrigo y mantas para mantenerte caliente
                    durante las noches frías. Una silla plegable y una mesa portátil te proporcionan
                    comodidad mientras observas el cielo estrellado.</p>

                    <p>Recuerda siempre investigar las condiciones del cielo y la previsión
                    meteorológica antes de embarcarte en tu aventura. North Cascades ofrece noches
                    de observación para todos los niveles, desde principiantes hasta expertos. Sea
                    cual sea tu elección, prepárate para maravillarte con la belleza del universo.
                    ¡Emprende tu viaje y deja que North Cascades te inspire!</p>',
                    '75$',
                    'Todo el año',
                    'actividad.php?id=8');

insert into imagenes(actividad_id, direccion) values(9, 'images/actividades/pesca.jpg');
insert into imagenes(actividad_id, direccion) values(9, 'images/actividades/pesca2.png');
insert into imagenes(actividad_id, direccion) values(9, 'images/actividades/pesca3.jpg');

insert into hashtags(actividad_id, hashtag) values(9, '#RíoSkagit');
insert into hashtags(actividad_id, hashtag) values(9, '#Pesca');
insert into hashtags(actividad_id, hashtag) values(9, '#Aventura');

insert into actividades(nombre, descripcion, precio, fecha, enlace) values('Pesca en el río Skagit',
                    '<p>¡Disfruta de un día de pesca en el río Skagit! Esta actividad te
                    lleva a las aguas cristalinas de uno de los ríos más ricos en vida
                    silvestre de Washington, donde la paciencia y la destreza te llevan
                    a la captura perfecta.</p>

                    <p>Para disfrutar plenamente de esta experiencia, asegúrate de tener
                    el equipo adecuado. Necesitarás una caña de pescar resistente y flexible
                    para lanzar el anzuelo con precisión, así como un carrete de calidad para
                    recoger la línea con facilidad. Se recomienda llevar una caja de aparejos
                    con una variedad de anzuelos, plomos y señuelos para adaptarse a las
                    condiciones del río.</p>

                    <p>Además, no olvides el equipo de seguridad, como un botiquín de primeros
                    auxilios, linterna, silbato y protección solar. Dependiendo de la temporada,
                    puede ser necesario llevar ropa de abrigo y mantas para mantenerte caliente
                    durante las noches frías. Una silla plegable y una mesa portátil te proporcionan
                    comodidad mientras disfrutas de un picnic en la orilla del río.</p>

                    <p>Recuerda siempre investigar las condiciones del río y la previsión
                    meteorológica antes de embarcarte en tu aventura. El río Skagit ofrece
                    aguas ricas en truchas, salmones y otros peces, lo que lo convierte en
                    un destino popular para los pescadores. Sea cual sea tu elección, prepárate
                    para disfrutar de un día de pesca en la naturaleza salvaje de Washington.
                    ¡Emprende tu viaje y deja que el río Skagit te sorprenda!</p>',
                    '50$',
                    'Primavera y verano',
                    'actividad.php?id=9');

create table valoraciones(
    id int primary key auto_increment,
    actividad_id int,
    nombre varchar(255),
    comentario text,
    fecha varchar(255),
    correo varchar(255)
);

insert into valoraciones(actividad_id, nombre, comentario, fecha, correo) values(1, 'Juan', '¡Una experiencia inolvidable! El Monte Rainier es un lugar mágico que te transporta a otro mundo. 
La caminata fue desafiante pero valió la pena por las vistas impresionantes que ofrece. Recomiendo llevar un buen equipo y prepararse para cualquier clima.', '2021-10-15, 16:43:16', 'juan@correo.si');
insert into valoraciones(actividad_id, nombre, comentario, fecha, correo) values(1, 'María', '¡Increíble! El Monte Rainier es un lugar único en el mundo que te deja sin aliento. La caminata 
fue desafiante pero gratificante, y las vistas panorámicas valieron cada paso. Recomiendo llevar suficiente agua y comida para disfrutar plenamente de la experiencia.', '2021-10-20, 16:43:16', 'maria@correo.si');
insert into valoraciones(actividad_id, nombre, comentario, fecha, correo) values(1, 'Pedro', '¡Una aventura inolvidable! El Monte Rainier es un lugar mágico que te invita a explorar su belleza natural.
La caminata fue desafiante pero emocionante, y las vistas panorámicas hicieron que cada paso valiera la pena. Recomiendo llevar un buen equipo y prepararse para cualquier clima.', '2021-10-25, 16:43:16', 'pedro@correo.si');

insert into valoraciones(actividad_id, nombre, comentario, fecha, correo) values(2, 'Ana', '¡Una experiencia emocionante! La escalada en Leavenworth es un desafío que pone a prueba tus habilidades y resistencia.
La ruta fue desafiante pero gratificante, y las vistas panorámicas desde la cima hicieron que cada esfuerzo valiera la pena. Recomiendo llevar un buen equipo y prepararse para cualquier terreno.', '2021-11-01, 16:43:16', 'ana@correo.si');
insert into valoraciones(actividad_id, nombre, comentario, fecha, correo) values(2, 'Luis', '¡Increíble! La escalada en Leavenworth es una experiencia única que te lleva a las alturas de las montañas de Washington.
La ruta fue desafiante pero emocionante, y las vistas panorámicas desde la cima hicieron que cada paso valiera la pena. Recomiendo llevar suficiente agua y comida para disfrutar plenamente de la experiencia.', '2021-11-05, 16:43:16', 'luis@correo.si');
insert into valoraciones(actividad_id, nombre, comentario, fecha, correo) values(2, 'Elena', '¡Una aventura inolvidable! La escalada en Leavenworth es un desafío que te invita a superar tus límites y alcanzar nuevas alturas.
La ruta fue desafiante pero emocionante, y las vistas panorámicas desde la cima hicieron que cada esfuerzo valiera la pena. Recomiendo llevar un buen equipo y prepararse para cualquier terreno.', '2021-11-10,  16:43:16', 'elena@correo.si');

insert into valoraciones(actividad_id, nombre, comentario, fecha, correo) values(3, 'Carlos', '¡Una experiencia fascinante! El Observatorio Goldendale es un lugar mágico que te invita a explorar los misterios del universo.
La noche de observación fue emocionante y educativa, y las vistas del cielo estrellado fueron impresionantes. Recomiendo llevar un telescopio portátil y una linterna roja para disfrutar plenamente de la experiencia.', '2021-11-15, 16:43:16', 'carlos@correo.si');
insert into valoraciones(actividad_id, nombre, comentario, fecha, correo) values(3, 'Sara', '¡Increíble! El Observatorio Goldendale es un lugar único en el mundo que te transporta a otro universo.
La noche de observación fue emocionante y educativa, y las vistas del cielo estrellado fueron impresionantes. Recomiendo llevar suficiente ropa de abrigo y mantas para mantenerte caliente durante la noche.', '2021-11-20, 16:43:16', 'sara@correo.si');
insert into valoraciones(actividad_id, nombre, comentario, fecha, correo) values(3, 'Pablo', '¡Una aventura inolvidable! El Observatorio Goldendale es un lugar fascinante que te invita a explorar los secretos del universo.
La noche de observación fue emocionante y educativa, y las vistas del cielo estrellado fueron impresionantes. Recomiendo llevar un telescopio portátil y una linterna roja para disfrutar plenamente de la experiencia.', '2021-11-25, 16:43:16', 'pablo@correo.si');

insert into valoraciones(actividad_id, nombre, comentario, fecha, correo) values(4, 'Laura', '¡Una experiencia relajante! El kayak en el lago Diablo es una actividad que te sumerge en la belleza natural de Washington.
La travesía fue tranquila y serena, y las vistas panorámicas del lago y las montañas fueron impresionantes. Recomiendo llevar un kayak estable y resistente para disfrutar plenamente de la experiencia.', '2021-12-01,  16:43:16', 'laura@correo.si');
insert into valoraciones(actividad_id, nombre, comentario, fecha, correo) values(4, 'Javier', '¡Increíble! El kayak en el lago Diablo es una experiencia única que te lleva a las aguas cristalinas de uno de los lagos más impresionantes de Washington.
La travesía fue tranquila y serena, y las vistas panorámicas del lago y las montañas fueron impresionantes. Recomiendo llevar suficiente agua y comida para disfrutar plenamente de la experiencia.', '2021-12-05, 16:43:16', 'javier@correo.si');
insert into valoraciones(actividad_id, nombre, comentario, fecha, correo) values(4, 'Isabel', '¡Una aventura inolvidable! El kayak en el lago Diablo es una actividad que te invita a explorar la belleza natural de Washington.
La travesía fue tranquila y serena, y las vistas panorámicas del lago y las montañas fueron impresionantes. Recomiendo llevar un kayak estable y resistente para disfrutar plenamente de la experiencia.', '2021-12-10, 16:43:16', 'isabel@correo.si');

insert into valoraciones(actividad_id, nombre, comentario, fecha, correo) values(5, 'Antonio', '¡Una experiencia emocionante! El esquí en Crystal Mountain es una actividad que te lleva a las alturas de las montañas de Washington.
La bajada fue desafiante pero gratificante, y las vistas panorámicas de la montaña y el valle fueron impresionantes. Recomiendo llevar un buen equipo y prepararse para cualquier terreno.', '2021-12-15, 16:43:16', 'antonio@correo.si');
insert into valoraciones(actividad_id, nombre, comentario, fecha, correo) values(5, 'Carmen', '¡Increíble! El esquí en Crystal Mountain es una experiencia única que te invita a deslizarte por las laderas de la montaña.
La bajada fue desafiante pero emocionante, y las vistas panorámicas de la montaña y el valle fueron impresionantes. Recomiendo llevar suficiente agua y comida para disfrutar plenamente de la experiencia.', '2021-12-20, 16:43:16', 'carmen@correo.si');
insert into valoraciones(actividad_id, nombre, comentario, fecha, correo) values(5, 'Manuel', '¡Una aventura inolvidable! El esquí en Crystal Mountain es una actividad que te transporta a un mundo de nieve y diversión.
La bajada fue desafiante pero emocionante, y las vistas panorámicas de la montaña y el valle fueron impresionantes. Recomiendo llevar un buen equipo y prepararse para cualquier terreno.', '2021-12-25, 16:43:16', 'manuel@correo.si');

insert into valoraciones(actividad_id, nombre, comentario, fecha, correo) values(6, 'Raquel', '¡Una experiencia emocionante! El rafting en el río Wenatchee es una actividad que te lleva a las aguas turbulentas de Washington.
La travesía fue desafiante pero gratificante, y las vistas panorámicas del río y el valle fueron impresionantes. Recomiendo llevar un buen equipo y prepararse para cualquier terreno.', '2022-01-01, 16:43:16', 'raquel@correo.si');
insert into valoraciones(actividad_id, nombre, comentario, fecha, correo) values(6, 'Jorge', '¡Increíble! El rafting en el río Wenatchee es una experiencia única que te invita a desafiar las aguas bravas.
La travesía fue desafiante pero emocionante, y las vistas panorámicas del río y el valle fueron impresionantes. Recomiendo llevar suficiente agua y comida para disfrutar plenamente de la experiencia.', '2022-01-05, 16:43:16', 'jorge@correo.si');
insert into valoraciones(actividad_id, nombre, comentario, fecha, correo) values(6, 'Marta', '¡Una aventura inolvidable! El rafting en el río Wenatchee es una actividad que te transporta a un mundo de emociones y diversión.
La travesía fue desafiante pero emocionante, y las vistas panorámicas del río y el valle fueron impresionantes. Recomiendo llevar un buen equipo y prepararse para cualquier terreno.', '2022-01-10, 16:43:16', 'marta@correo.si');

insert into valoraciones(actividad_id, nombre, comentario, fecha, correo) values(7, 'Roberto', '¡Una experiencia fascinante! La excursión al glaciar Coleman es una actividad que te lleva a las alturas de las montañas de Washington.
La caminata fue desafiante pero gratificante, y las vistas panorámicas del glaciar y el valle fueron impresionantes. Recomiendo llevar un buen equipo y prepararse para cualquier terreno.', '2022-01-15, 16:43:16', 'roberto@correo.si');
insert into valoraciones(actividad_id, nombre, comentario, fecha, correo) values(7, 'Patricia', '¡Increíble! La excursión al glaciar Coleman es una experiencia única que te invita a explorar la majestuosidad de la naturaleza.
La caminata fue desafiante pero emocionante, y las vistas panorámicas del glaciar y el valle fueron impresionantes. Recomiendo llevar suficiente agua y comida para disfrutar plenamente de la experiencia.', '2022-01-20, 16:43:16', 'patricia@correo.si');
insert into valoraciones(actividad_id, nombre, comentario, fecha, correo) values(7, 'Fernando', '¡Una aventura inolvidable! La excursión al glaciar Coleman es una actividad que te transporta a un mundo de hielo y nieve.
La caminata fue desafiante pero emocionante, y las vistas panorámicas del glaciar y el valle fueron impresionantes. Recomiendo llevar un buen equipo y prepararse para cualquier terreno.', '2022-01-25, 16:43:16', 'fernando@correo.si');

insert into valoraciones(actividad_id, nombre, comentario, fecha, correo) values(8, 'Cristina', '¡Una experiencia relajante! La observación en North Cascades es una actividad que te sumerge en la belleza natural de Washington.
La noche de observación fue tranquila y serena, y las vistas del cielo estrellado fueron impresionantes. Recomiendo llevar un telescopio portátil y una linterna roja para disfrutar plenamente de la experiencia.', '2022-02-01, 16:43:16', 'cristina@correo.si');
insert into valoraciones(actividad_id, nombre, comentario, fecha, correo) values(8, 'Francisco', '¡Increíble! La observación en North Cascades es una experiencia única que te lleva a explorar los misterios del universo.
La noche de observación fue tranquila y serena, y las vistas del cielo estrellado fueron impresionantes. Recomiendo llevar suficiente ropa de abrigo y mantas para mantenerte caliente durante la noche.', '2022-02-05, 16:43:16', 'francisco@correo.si');
insert into valoraciones(actividad_id, nombre, comentario, fecha, correo) values(8, 'Natalia', '¡Una aventura inolvidable! La observación en North Cascades es una actividad que te invita a maravillarte con la belleza del universo.
La noche de observación fue tranquila y serena, y las vistas del cielo estrellado fueron impresionantes. Recomiendo llevar un telescopio portátil y una linterna roja para disfrutar plenamente de la experiencia.', '2022-02-10, 16:43:16', 'natalia@correo.si');

insert into valoraciones(actividad_id, nombre, comentario, fecha, correo) values(9, 'Diego', '¡Una experiencia emocionante! La pesca en el río Skagit es una actividad que te lleva a las aguas cristalinas de Washington.
La jornada fue tranquila y relajante, y las vistas del río y el valle fueron impresionantes. Recomiendo llevar una caña de pescar resistente y flexible para disfrutar plenamente de la experiencia.', '2022-02-15, 16:43:16', 'diego@correo.si');
insert into valoraciones(actividad_id, nombre, comentario, fecha, correo) values(9, 'Eva', '¡Increíble! La pesca en el río Skagit es una experiencia única que te invita a disfrutar de la naturaleza salvaje de Washington.
La jornada fue tranquila y relajante, y las vistas del río y el valle fueron impresionantes. Recomiendo llevar suficiente agua y comida para disfrutar plenamente de la experiencia.', '2022-02-20, 16:43:16', 'eva@correo.si');
insert into valoraciones(actividad_id, nombre, comentario, fecha, correo) values(9, 'Hugo', '¡Una aventura inolvidable! La pesca en el río Skagit es una actividad que te transporta a un mundo de paz y tranquilidad.
La jornada fue tranquila y relajante, y las vistas del río y el valle fueron impresionantes. Recomiendo llevar una caña de pescar resistente y flexible para disfrutar plenamente de la experiencia.', '2022-02-25, 16:43:16', 'hugo@correo.si');

create table palabras_prohibidas(
    id int primary key auto_increment,
    palabra varchar(255)
);

insert into palabras_prohibidas(palabra) values('Estafa');
insert into palabras_prohibidas(palabra) values('Robo');
insert into palabras_prohibidas(palabra) values('Atraco');
insert into palabras_prohibidas(palabra) values('Fraude');
insert into palabras_prohibidas(palabra) values('Engaño');
insert into palabras_prohibidas(palabra) values('Mentira');
insert into palabras_prohibidas(palabra) values('Estafador');
insert into palabras_prohibidas(palabra) values('Ladron');
insert into palabras_prohibidas(palabra) values('Timo');


create table usuarios(
    id int primary key auto_increment,
    nombre varchar(255),
    usuario varchar(255),
    correo varchar(255),
    contrasena varchar(255),
    tipo varchar(255)
);

update usuarios set tipo = '3' where id = 1;