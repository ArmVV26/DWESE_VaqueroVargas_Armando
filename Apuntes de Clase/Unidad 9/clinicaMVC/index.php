<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
</head>
<body>
    <h1>Bienvenido a la Clinica Dolores</h1>
    <?php
        require_once 'autoloader.php';

        use Models\Doctor;
        use Models\Paciente;

        $supaciente = new Paciente('2', 'Jose', 'Paco', 'uno@uno.com', '1234');
        $nombrepaciente = $supaciente->getNombre();

        $sudoctor = new Doctor('4', 'Ricardo', 'Solano Perez', '958453243', 'reumatología');
        $nombredoctor = $sudoctor->getNombre();

        echo "El paciente se llama $nombrepaciente <br>";
        echo "Es paciente del doctor $nombredoctor <br>";

    ?>
    <?php
        require_once 'config/conexion.php';

    ?>
</body>
</html>