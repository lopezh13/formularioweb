<?php
function renderForm($fields, $controller) {
    echo '<form id="formulario" method="POST">';
    echo '<h2>Formulario de registro</h2>';

    foreach ($fields as $index => $field) {
        $fieldId = 'field-' . $index; // ID único para cada campo

        echo '<div class="mb-3">';
        echo '<label class="form-label">' . $field['name'];
        
        if ($field['name'] === 'Direccion') {
            echo ' <input type="checkbox" class="toggle-required" data-target="#' . $fieldId . '" checked> Requerido';
        }

        echo '</label>';

        if ($field['type'] === 'text') {
            echo '<input type="text" id="' . $fieldId . '" class="form-control" name="' . $field['name'] . '" required>';
        } elseif ($field['type'] === 'textarea') {
            echo '<textarea id="' . $fieldId . '" class="form-control" name="' . $field['name'] . '" required></textarea>';
        } elseif ($field['type'] === 'select') {
            echo '<select id="' . $fieldId . '" class="form-control" name="' . $field['name'] . '" required>';
            echo '<option value="">Seleccione ' . strtolower($field['name']) . '</option>';

            if (isset($field['options'])) {
                foreach ($field['options'] as $option) {
                    echo '<option value="' . $option . '">' . $option . '</option>';
                }
            } elseif (isset($field['optionsApi'])) {
                $apiOptions = $controller->getApiOptions('https://' . $field['optionsApi']);
                foreach ($apiOptions as $option) {
                    echo '<option value="' . $option['name'] . '">' . $option['name'] . '</option>';
                }
            }
            echo '</select>';
        }

        echo '</div>';
    }

    echo '<button type="submit" class="btn btn-primary">Registrar</button>';
    echo '</form>';
}
?>
