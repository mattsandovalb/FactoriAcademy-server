<?php
    session_start();
    include_once "config.php";
    //Damos valor a 2 variables para el proceso siguiente
    //Outgoing le damos el id del usuario actualmente conectado
    $outgoing_id = $_SESSION['unique_id'];
    //SearchTerm le damos la información de busqueda
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    //Creamos una variable con la comanda sql el cual revisa el nombre tanto de Apellido como de 1ª Nombre
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%') ";
    $output = "";
    //Unimos todo en 1
    $query = mysqli_query($conn, $sql);
    //Hacemos el condicionante para ver si existe tal objeto
    if(mysqli_num_rows($query) > 0){
        //Si existe o tiene alguna variable que concuerte se muestra
        include_once "data.php";
    }else{
        //Si no existe o no tiene alguna variable que concuerte se muestra
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>