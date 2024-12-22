<?php
function renderTable($data) {
    if (!empty($data)) {
        echo '<div class="table-responsive">';
        echo '<table id="registrosTable" class="table table-striped table-hover">';
        echo '<thead><tr>';
        echo '<th>Nombres</th>';
        echo '<th>Apellidos</th>';
        echo '<th>Dirección</th>';
        echo '<th>Género</th>';
        echo '<th>Departamento</th>';
        echo '</tr></thead>';
        echo '<tbody>';
        foreach ($data as $row) {
            echo '<tr>';
            foreach ($row as $value) {
                echo '<td>' . htmlspecialchars($value) . '</td>';
            }
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    }
}
?>
