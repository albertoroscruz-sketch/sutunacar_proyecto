<?php
include("con_db.php");
if(!isset($_POST["orden"])) 
    { 
        $_POST['orden'] = ""; 
    }
if(!isset($_POST["temas_buscar"]))
    {
        $_POST['temas_buscar'] = "";
    }
if(!isset($_POST["acuerdos_buscar"]))
    {
        $_POST['acuerdos_buscar'] = "";
    }
if(!isset($_POST["descripcion_buscar"]))
    {
        $_POST['descripcion_buscar'] = "";
    }
if(!isset($_POST["fecha_reunion_minuta_desde"]))
    {
        $_POST['fecha_reunion_minuta_desde'] = "";
    }
if(!isset($_POST["fecha_reunion_minuta_hasta"]))
    {
        $_POST['fecha_reunion_minuta_hasta'] = "";
    }


$query = "SELECT * FROM minutasprueba WHERE 1=1";

    if ($_POST["temas_buscar"] != '') 
        {
            $query .= " AND tema_minuta LIKE '%" . $_POST["temas_buscar"] . "%'";
        }
    if ($_POST["acuerdos_buscar"] != '') 
        {
            $query .= " AND acuerdos_minuta LIKE '%" . $_POST["acuerdos_buscar"] . "%'";
        }
    if ($_POST["descripcion_buscar"] != '') 
        {
            $query .= " AND descripcion_minuta LIKE '%" . $_POST["descripcion_buscar"] . "%'";
        }
    if ($_POST["fecha_reunion_minuta_desde"])
        {
            $query .= " AND fecha_reunion_minuta BETWEEN '".$_POST["fecha_reunion_minuta_desde"]."' AND '".$_POST["fecha_reunion_minuta_hasta"]."'";  
        }

    if($_POST["orden"] == '1')
        {
            $query .= " ORDER BY tema_minuta ASC";
        }
    if($_POST["orden"] == '2')
        {
            $query .= " ORDER BY acuerdos_minuta ASC";
        }
    if($_POST["orden"] == '3')
        {
            $query .= " ORDER BY descripcion_minuta ASC";
        }
    if($_POST["orden"] == '4')
        {
            $query .= " ORDER BY fecha_reunion_minuta_desde ASC";
        }
    if($_POST["orden"] == '5')
        {
            $query .= " ORDER BY fecha_reunion_minuta_hasta DESC";
        }


$sql = $conexion->query($query);
$numerosql = $sql->num_rows;
?>