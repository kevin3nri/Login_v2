<?php
   $conexion = mysqli_connect("localhost", "root", "", "proyecto");

   $idActividad = $_POST['idActividad'];
   $actNombre = $_POST['actNombre'];
   $actLimit = $_POST['actLimit'];
   $idPeriodo = $_POST['Periodo_idPeriodo'];
   $idcarrera = $_POST['carrera_idcarrera'];
   $matritea = $_POST['teachers_matritea'];
   
   // Luego, inserta la fila en la tabla inscripciones
   $sql = "UPDATE actividad SET actNombre = '$actNombre', actLimit = '$actLimit', Periodo_idPeriodo = '$idPeriodo', carrera_idcarrera = '$idcarrera', teachers_matritea = '$matritea' WHERE idActividad = '$idActividad'";
   
   $dato = mysqli_query($conexion, $sql);
   
   if($dato){
       echo '
       <script>
           alert("Limitacion de Actividad Complementaria Almacenado Exitosamente");
           window.location = "../../docente.php";
       </script>
   ';
   } else {
       echo '
       <script>
           alert("Intentalo de nuevo, Limitacion de Actividad Complementaria no almacenado");
           window.location = "../../docente.php";
       </script>
   ';
   }
?>