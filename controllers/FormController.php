<?php
session_start();

class FormController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function handleFormSubmission($postData) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['registros'])) {
                $_SESSION['registros'] = [];
            }
            $_SESSION['registros'][] = $postData;
        }
    }

    public function getFormFields() {
        return $this->model->getFormFields();
    }

    public function getApiOptions($url) {
        return $this->model->fetchApiData($url);
    }

    public function getRegisteredData() {
        return isset($_SESSION['registros']) ? $_SESSION['registros'] : [];
    }
}
?>
