<?php

// Parámetros de conexión a la BD
$server = "localhost";
$user = "root";
$pass= "";
$database = "bd_webs_wsn";


/*CONECTAMOS CON LA BASE DE DATOS. SE CREA UN OBJETO*/

$mysqli=new mysqli($server,$user,$pass,$database,'3306');
/*CONDICION PARA INDICAR SI NO SE HA PRODUCIDO LA CONEXION SAQUE UN SMS*/
if (mysqli_connect_errno()){
    echo "Connection error. Errorcode: ". mysqli_connect_error();
    exit();
}

// Función para obtener los datos de una tabla
function getArraySQL($sql,$mysqli){

    $rawdata = array();
    $i=0;
    if($result = $mysqli->query($sql)){

        while($row=$result->fetch_assoc()){
            $rawdata[$i] = $row;
            $i++;
        }
    }
    else {
        echo "Error en la SQL";
    }


    return $rawdata;
}


// Datos para la gráfica

$sql = "SELECT valor,Fecha FROM temperatura_t WHERE ID_Temperatura='356897836';";
//$rawdata = getArraySQL($sql,$mysqli);
$user = Temperatura::all(); //y luego cambiar rawdata por $user

//Ajustar tiempo
for ($i = 0; $i < count($user); $i++) {
    $time = $user[$i]["Fecha"];
    $rawdata[$i]["Fecha"] = strtotime($time) * 1000;
}

//Quitar el array asociativo

$data=array();
$i=0;
foreach ($user as $fila) {
    $data[$i][0] = $fila['Fecha'];
    $data[$i][1] = floatval($fila['valor']);
    $i++;

}

/*$data = [
    [
        1167609600000,
        0.7537
    ],
    [
        1167696000000,
        0.7537
    ],
    [
        1167782400000,
        0.7559
    ],
    [
        1167868800000,
        0.7631
    ],
    [
        1167955200000,
        0.7644
    ],
    [
        1168214400000,
        0.769
    ],
    [
        1168300800000,
        0.7683
    ],
    [
        1168387200000,
        0.77
    ],
    [
        1168473600000,
        0.7703
    ]];*/
header('Content-type: application/json');
echo json_encode($data); // solo devuelvo los datos no las strins NI FECHA NI VALOR NO SE PUEDE ARRAYS ASOCIATIVOS

?>
