<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcial 2</title>
</head>
<body>


<fieldset>
    <legend><h1>NOTAS DE ESTUDIANTES</h1></legend>
    
        <form action="Validation.php" method="POST">
            <p>
                Asistencia.
                <select name="asistencias">
                    <option value=''>Asistencias</option>
                    <?php
                    //Array container
                    $uf = array('01','02','03');

                    $container = count($uf);
                    // :v
                    while($container > 0){
                        $container--;
                        echo "<option value='".$uf[$container]."'>".$uf[$container]."</option>";
                    }
                    ?>

                </select>
                <p />

                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required />

                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" required>
                <br /><br />

                <label for="cedula">Cedula:</label>
                     <input type="text" name="cedula" required />
                     <br /><br />

                <label for="parcial1">Parcial1:</label>
                <input type="number" name="parcial1" required />

                <label for="parcial2">Parcial2:</label>
                <input type="number" name="parcial2" required />
                <br /><br />

                <label for="parcial3">Parcial3:</label>
                <input type="number" name="parcial3" required />
                <br /><br />

                <label for="proyectos1">Proyectos 1: </label>
                <input type="number" name="proyectos1" required />
                <br /><br />
                
                <label for="proyectos2">Proyectos 2: </label>
                <input type="number" name="proyectos2" required />
                
                <label for="examen"></label>
                    Examen: <input type="number" name="examen" required />
                <br /><br />
            
            <input type="submit" name="submit" value="Calcular"/>
            <input type="reset" value="Limpiar"/>

        </form> 
        
</fieldset>
</p>
<fieldset>
                <legend><h1>
                    Recibiendo datos por medio POST
                </h1></legend>

                <h3>
                    Estos son los datos introducidos:
                </h3>


                
                <?php //Validation

                main();
                    
                function parcial($parcial1, $parcial2, $parcial3, $porcentaje){
                    $SumParcial = $parcial1 + $parcial2 + $parcial3;
                    $promedio = $SumParcial / 3;
                    return $promedio * ($porcentaje / 100);
                }

                function proyecto($proyecto1, $proyecto2, $porcentaje){
                    $SumProyecto = $proyecto1 + $proyecto2;
                    $promedio = $SumProyecto / 2;
                    return $promedio * ($porcentaje / 100);
                }

                function examen($examen, $porcentaje){
                    $promedio = $examen;
                    return $promedio * ($porcentaje / 100);
                }
                function totalFinal($parcial, $proyecto, $examen, $asistencia){
                    return $parcial + $proyecto + $examen + $asistencia;
                }

                
                function main(){
                    if (isset($_POST['submit'])){

                        $asistencia =$_POST['asistencias'];
                        $nombres = $_POST['nombre'];
                        $apellidos = $_POST['apellido'];
                        $cedula = $_POST['cedula'];
                        $Parcial1 = $_POST['parcial1'];
                        $Parcial2 = $_POST['parcial2'];
                        $Parcial3 = $_POST['parcial3'];
                        $proyecto1 = $_POST['proyectos1'];
                        $proyecto2 = $_POST['proyectos2'];
                        $examen = $_POST['examen'];

                        $parcialPor = parcial($Parcial1, $Parcial2, $Parcial3, 30);
                        $proyectoPor = proyecto($proyecto1, $proyecto2, 30);
                        $examenPor = examen($examen, 35);
                        $total = totalFinal($parcialPor, $proyectoPor, $examenPor, 5);


                        echo "<h4>Su Nombre Completo es: $nombres "." $apellidos</h4>";
                        echo "<h4>Las veces que asistio es: $asistencia"." </h4>";
                        echo "<h4>Su Cedula es: $cedula</h4>";
                        echo "<h4>La nota del parcial es: $parcialPor"."</h4>";
                        echo "<h4>La nota del proyecto es : $proyectoPor</h4>";
                        echo "<h4>La nota de su Examen es: $examenPor</h4>";
                        echo "<h4>La nota total es: $total</h4>";

                    }
                }
                ?> 
</fieldset>

</body>
</html>