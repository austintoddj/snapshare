<?php

$errors = array();

function fieldname_as_text($fieldname) {
    $fieldname = str_replace("_", " ", $fieldname);
    $fieldname = ucfirst($fieldname);
    return $fieldname;
}

function has_presence($value) {
    return isset($value) && $value !== "";
}

function validate_presences($required_fields) {
    global $errors;

    foreach ($required_fields as $field) {
        $value = trim($_POST[$field]);
        if (!has_presence($value)) {
            $errors[$field] = fieldname_as_text($field) . " is required";
        }
    }
}

