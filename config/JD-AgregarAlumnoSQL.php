<?php
include("bd.php");//conexion
  
 $nom=$_POST['Nombre'];
 $rfc=$_POST['RFC'];
 $semestres=$_POST['semestres'];

 $sentenciaSQL1 = $conexion->prepare("INSERT INTO `usuario`(`IdUser`, `Nombre`, `Password`, `TipoUser`,cambio) VALUES (:rfc,:nombre,'123456','Alumno','1')" );  
 $sentenciaSQL1->bindParam(':nombre',$nom);
 $sentenciaSQL1->bindParam(':rfc',$rfc);
 $sentenciaSQL1->execute();

 $sentenciaSQL2 = $conexion->prepare("INSERT INTO `tutorados`(`IdTutorado`, `NombreTutorado`, `Semestres`) VALUES (:rfc,:nombre,:semestres)" );  
 $sentenciaSQL2->bindParam(':nombre',$nom);
 $sentenciaSQL2->bindParam(':rfc',$rfc);
 $sentenciaSQL2->bindParam(':semestres',$semestres);
 $sentenciaSQL2->execute();

 $sentenciaSQL3 = $conexion->prepare("INSERT INTO `reporte`(`IdTutorado`,NombreTutorado,Estatus) VALUES (:rfc,:nombre ,'Seleccionar estatus')" );  
 $sentenciaSQL3->bindParam(':nombre',$nom);
 $sentenciaSQL3->bindParam(':rfc',$rfc);
 $sentenciaSQL3->execute();
 //INSERT INTO `reporte`(`IdTutorado`) VALUES ()

if( $sentenciaSQL1 And $sentenciaSQL2){   

   echo "<script> alert('Agregado');
    location.href = '../JD-AgregarAlumno.php';
   </script>";

}else{
    echo "<script> alert('incorrecto');
    location.href = '../JD-AgregarAlumno.php';
    </script>";
}

?>