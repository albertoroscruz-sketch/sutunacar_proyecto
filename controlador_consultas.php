<?php
include("con_db.php");
if(!isset($_POST["orden"])) 
    { 
        $_POST['orden'] = ""; 
    }
if(!isset($_POST["nombres_buscar"]))
    {
        $_POST['nombres_buscar'] = "";
    }
if(!isset($_POST["apellidos_buscar"]))
    {
        $_POST['apellidos_buscar'] = "";
    }
if(!isset($_POST["curp_buscar"]))
    {
        $_POST['curp_buscar'] = "";
    }
if(!isset($_POST["num_emp_buscar"]))
    {
        $_POST['num_emp_buscar'] = "";
    }
if(!isset($_POST["telefono_buscar"]))
    {
        $_POST['telefono_buscar'] = "";
    }
if(!isset($_POST["correo_personal_buscar"]))
    {
        $_POST['correo_personal_buscar'] = "";
    }
if(!isset($_POST["fecha_desde"]))
    {
        $_POST['fecha_desde'] = "";
    }
if(!isset($_POST["fecha_hasta"]))
    {
        $_POST['fecha_hasta'] = "";
    }
if(!isset($_POST["id_area_buscar"]))
    {
        $_POST['id_area_buscar'] = "";
    }

$query = "SELECT sindicalizadosprueba.*, areasprueba.nombre_area 
          FROM sindicalizadosprueba, areasprueba
          WHERE sindicalizadosprueba.id_area = areasprueba.id_area";

if($_POST['nombres_buscar'] != '')
    {
        $aKeywords = explode(" ", $_POST['nombres_buscar']);

        $query .= " AND (nombres LIKE LOWER ('%".$aKeywords[0]."%') OR apellidos LIKE LOWER ('%".$aKeywords[0]."%'))";

        for($i = 1; $i < count($aKeywords); $i++) 
        {
            if(!empty($aKeywords[$i])) 
                {
                    $query .= " OR nombres LIKE '%".$aKeywords[$i]."%' OR apellidos LIKE '%".$aKeywords[$i]."%'";
                }
        }
    }
    if ($_POST["apellidos_buscar"] != '') 
        {
            $query .= " AND apellidos LIKE '%" . $_POST["apellidos_buscar"] . "%'";
        }
    if ($_POST["curp_buscar"] != '') 
        {
            $query .= " AND curp LIKE '%" . $_POST["curp_buscar"] . "%'";
        }
    if ($_POST["num_emp_buscar"] != '') 
        {
            $query .= " AND num_emp LIKE '%" . $_POST["num_emp_buscar"] . "%'";
        }
    if ($_POST["telefono_buscar"] != '') 
        {
            $query .= " AND telefono LIKE '%" . $_POST["telefono_buscar"] . "%'";
        }
    if ($_POST["correo_personal_buscar"] != '') 
        {
            $query .= " AND correo_personal LIKE '%" . $_POST["correo_personal_buscar"] . "%'";
        }
    if ($_POST["id_area_buscar"] != '') 
        {
            $query .= " AND sindicalizadosprueba.id_area = '".$_POST['id_area_buscar']."'";
        }
    if ($_POST["fecha_desde"])
        {
            $query .= " AND fecha_ingreso BETWEEN '".$_POST["fecha_desde"]."' AND '".$_POST["fecha_hasta"]."'";  
        }

    if($_POST["orden"] == '1')
        {
            $query .= " ORDER BY nombres ASC";
        }
    if($_POST["orden"] == '2')
        {
            $query .= " ORDER BY apellidos ASC";
        }
    if($_POST["orden"] == '3')
        {
            $query .= " ORDER BY curp ASC";
        }
    if($_POST["orden"] == '4')
        {
            $query .= " ORDER BY fecha_ingreso ASC";
        }
    if($_POST["orden"] == '5')
        {
            $query .= " ORDER BY fecha_ingreso DESC";
        }
    if($_POST["orden"] == '6')
        {
            $query .= " ORDER BY sindicalizadosprueba.id_area ASC";
        }
    if($_POST["orden"] == '7')
        {
            $query .= " ORDER BY num_emp DESC";
        }
    if($_POST["orden"] == '8')
        {
            $query .= " ORDER BY num_emp ASC";
        }
    if($_POST["orden"] == '9')
        {
            $query .= " ORDER BY telefono DESC";
        }
    if($_POST["orden"] == '10')
        {
            $query .= " ORDER BY telefono ASC";
        }
    if($_POST["orden"] == '11')
        {
            $query .= " ORDER BY correo_personal ASC";
        }
$sql = $conexion->query($query);

$numerosql = $sql->num_rows;
?>