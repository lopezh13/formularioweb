<?php
class FormModel {
    private $formConfig;

    public function __construct($configPath) {
        $this->formConfig = json_decode(file_get_contents($configPath), true);
    }

    public function getFormFields() {
        return $this->formConfig['fields'];
    }

    public function fetchApiData($url) {
        $response = file_get_contents($url);
        return json_decode($response, true);
    }
}
?>
