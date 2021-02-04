<?php
/* SIEMPRE TRABAJAR DENTRO DE UN TRY CATCH*/
try{
    include "_conexion.php";

    //0. recibimos el nombre del articulo buscado
    $nom = $_GET["nom"];

    // 1. creamos la consulta SQL
    $sql = 'SELECT * FROM productos WHERE nombre LIKE %?% ';
    
    //2. almacenamos el objeto statement que nos retorna la funcion prepare()
    $stmt = $con->prepare($sql);

    //3. ejecutamos la consulta con la funcion execute() del obj statement
    //le pasamos a la funcion un array con los datos a reemplazar en la consulta
    $stmt->execute(array($nom));
    //4_a. creo un array para ir almacenando los datos de la busqueda
    $array=[];
    $i=0;
    //4_b . obtenemos la fila de resultados con la funcion fetch del obj statement
    //con el parametro pasado a la funcion fetch logramos que nos devuelva un array asociativo
    while($c = $stmt->fetch(PDO::FETCH_ASSOC)){
       $obj=new stdClass();
        $obj->id=$c["id"];
        $obj->nombre=$c["nombre"];
        $obj->stock=$c["stock"];
        $array[$i]=$obj;
        $i++;
    }

    echo json_encode($array);
    
}catch(Exception $e){
    echo "Error: ".$e->getMessage();
}

?>