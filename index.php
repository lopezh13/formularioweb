<?php
require_once 'models/FormModel.php';
require_once 'controllers/FormController.php';
require_once 'views/formView.php';
require_once 'views/tableView.php';

// Crear el modelo y controlador
$model = new FormModel('data.json');
$controller = new FormController($model);

// Procesar el envío del formulario
$controller->handleFormSubmission($_POST);

// Obtener los campos del formulario y los datos registrados
$formFields = $controller->getFormFields();
$registeredData = $controller->getRegisteredData();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Dinámico</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <?php renderForm($formFields, $controller); ?>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <?php renderTable($registeredData); ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>
