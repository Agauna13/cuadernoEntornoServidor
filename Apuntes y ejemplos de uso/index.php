<!-- Arrays-->

<!-- En PHP son todos dinámicos, se agranda el array a medida que le metemos información-->

<!--inicialización y estructura general-->
<?php

//Array indexado, clasico array al que accedemos a través de un indice autoincremental

$numerico = array(3, 8, 1223, "rojo", 1.45, true, null); //Sí, podemos meterle el tipo de dato que nos de la gana, como en js
//IMPORTANTE true y null, si lo imprimimos con echo nos da respectivamente 1 y un espacio vacio, si lo hacemos con var_dump nos imprime todo tal cual indicando el tipo de dato.
//segun los apuntes, los float los redondea hacia abajo -> 1'9 == 1.


//Asociativos, pares clave=>valor

$miAsociativo = array("altura" => 1.8, "peso" => 83); //Ésta es la sintaxis de un array asociativo


//Arrays multidimensionales

$ArrayMultidimensional = array(
    0 => array(0 => 2, 1 => 4),
    1 => array(0 => 1, 1 => 3)
); //con la sintaxis clasica

$ArrayMultidimensionalSintaxisModerna = [
    0 => [0 => 2, 1 => 4],
    1 => [0 => 1, 1 => 3]
];

//para imprimir arrays y y las variables globales (SESSION, POST...) Se utiliza el método var_dump($miarray);
echo "<br>";

echo 'array indexado de toda la vida ' . var_dump($numerico);

echo "<br>";


//Para recorrer los arrays tenemos el foreach típico

foreach ($numerico as $valor) { //Para el típico array
    echo $valor;
    echo ', ';
}


echo "<br>";

foreach ($miAsociativo as $clave => $valor) {
    echo 'clave: ' . $clave . ', valor: ' . $valor;
    echo "<br>";
}


//como en otros lenguajes, para apuntar a un elemento específico del array utilizaremos $nombreArray[indice/clave]
echo "<br>";
echo $numerico[2];
echo "<br>";
echo $miAsociativo["altura"];

if (isset($miAsociativo["altura"])) { //de esta manera comprobamos que existe o no una clave dentro del array
    echo "m";
} else {
    echo "esta mierda no va";
}



//String

//Pueden tener cualquier longitud, sin más límite que la memoria disponible. No tienen índice, pero sí posición. Pueden ir encerradas entre comillas simples('') o dobles.("").


//si utilizamos comillas simples ('') php lo interpretará como un literal y no podremos meterle funciones

$miString = "Alan";
$fraseChorraDePrueba = 'Mi nombre ($miString), no se va a ver por pantalla a pesar de estar guardado en la variable';
echo "<br>" . $fraseChorraDePrueba;

$fraseChorraDePrueba2 = "Mi nombre ($miString), ahora si porque uso comillas dobles";
echo "<br>" . $fraseChorraDePrueba2;

$multilinea = "Esto es una cadena
multilínea, aunque si usas un IDE, tenderá a
provocar una concatenación por línea.
Pruébalo en tu IDE.";
echo "<br>" . $multilinea;


/*Hay muchas funciones para tratar cadenas, aqui un pequeña lista de ejemplo:
strtolower  -> convierte cadenas de texto a minúsculas Hola -> hola
strtoupper  -> Lo mismo pero a mayúsculas Hola -> HOLA
trim    -> dados 2 parametros, nos 'limpia la string de espacios delante y detrás y nos elimina lo que le pasemos por paámetro ...Hola mundo... -> trim("...Hola mundo...", ".") -> Hola mundo.
ucfirst -> Convierte la primera letra de la cadena a mayuscula
ucwords -> ucwords convierte la primera letra DE CADA PALABRA a mayusculas
str_repeat -> repite una cadena un numero determinado de veces-> str_repeat("alan", 3) -> alanalanalan
strlen -> IMPORTANTE: nos da la longitud de la cadena -> strelen("alan") -> 5
strstr -> devuelve la parte de la cadena que toma desde el 2do argumento hasta el final -> strstr("juancarlos chupapija, te voy a matar cuando vengas", te)-> te voy a matar cuando vengas 
str_replace -> Remplaza el primer parametro, por el segundo en el tercer parametro -> str_replace("juancarlos", "rafel", "juancarlos chupapija") -> rafel chupapija
substr ->  devuelve la parte del primer parametro delimitado de inicio a fin por los otros 2 parametros, si se deja el 2º parametro vacio, devuelve el resto substr("juancarlos chupapija", 0, 9) -> juancarlos
strpos -> nos devuelve el valor de la primera posición donde aparece el 2 parametro en el primero, false si no lo encuentra-> strpos("juancarlo chupapija", "chupapija")-> 11;
*/

//Como en todos los lenguajes, podemos recorrer la string con un for, cuidado que hay que restarle 1 a la longitud de la cadena Para que no nos de un out of bounds

$str = "Hoy es 16 de noviembre de 2024";

for ($i = 0; $i <= strlen($str) - 1; $i++) {
    echo "<br> " . $str[$i]; //acdeso a un caracter especifico de la cadena
}


echo "<br>" . $str[10];



//La declaracion de constantes en php (variables que no se pueden alterar) es así: DEFINE('PI', '3.141592'); y utilizaríamos PI para obtener el valor asociado

DEFINE('PI', '3.141592');
$radius = 10;
$area = 2 * PI * pow($radius, 2);

echo "<br>" . $area;


//Supervariables: son variables que estan siempre disponibles de manera global en todos los ambitos.

/*
$_GET -> almacena todos los valores transmitidos mediante el protocolo http usando el metodo GET
$_POST -> igual que get solo que cambiamos el método GET por POST. Más utilizado por motivos de seguridad
$_REQUEST -> array asociativo que guarda los datos de GET POST y COOKIE
$_SESSION -> Para almacenar y recuperar la información entre diferentes páginas durante una sesion de usuario
Flujo típico de una sesión ($_SESSION):
El usuario visita tu página, PHP genera un identificador de sesión (almacenado en la cookie PHPSESSID).
En cada página subsecuente que visite el usuario, PHP utiliza el identificador de sesión para acceder a las variables de sesión asociadas.
Cuando el usuario cierra el navegador, o si se destruye la sesión con session_destroy(), la sesión termina y las variables asociadas ya no estarán disponibles.


$_COOKIE ->  para almacenar preferencias del usuario o información que necesita persistir entre diferentes sesiones o visitas a la página.
$_ENV -> para guardar las variables del entorno

*/



/* IMPORTANTE A LA HORA DE TRABAJAR CON $_SESSION 

	hacerse un pequeño esquema mental de qué variables de sesion vamos a querer usar y cómo, desde donde hacia adonde necesitamos que se envíen o se usen y para qué ANTES de empezar a escribir el código. Por ejemplo, si necesitamos que el nombre de usuario Sea el parámetro de referencia para mostrar uno u otro contenido.



*/
?>