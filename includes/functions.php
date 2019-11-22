<?php

function login_errors() {
    if (isset($_SESSION["login_errors"])) {
        $output = "<div class=\"alert alert-danger\">";
        $output .= "<ul>";
        $output .= "<li>";
        $output .= htmlentities($_SESSION["login_errors"]);
        $output .= "</li>";
        $output .= "</ul>";
        $output .= "</div>";

        // Clear error after use
        $_SESSION["login_errors"] = null;

        return $output;
    }
}

function form_errors($errors = array()) {
    $output = "";

    if (!empty($errors)) {
        $output .= "<div class=\"alert alert-danger\">";
        $output .= "<ul>";
        foreach ($errors as $key => $error) {
            $output .= "<li>";
            $output .= htmlentities($error);
            $output .= "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    return $output;
}

function messages() {
    if (isset($_SESSION["messages"])) {
        $output = "<div class=\"alert alert-success\">";
        $output .= "<ul>";
        $output .= "<li>";
        $output .= htmlentities($_SESSION["messages"]);
        $output .= "</li>";
        $output .= "</ul>";
        $output .= "</div>";

        // Clear error after use
        $_SESSION["messages"] = null;

        return $output;
    }
}

function strip_zeroes_from_date($marked_string = "") {

    // first remove the marked zeroes
    $no_zeroes = str_replace('*0', '', $marked_string);

    // then remove any remaining marks
    $cleaned_string = str_replace('*', '', $no_zeroes);

    return $cleaned_string;
}

function redirect_to($location = null) {
    if ($location != null) {
        header("Location: {$location}");
        exit;
    }
}

 function output_message($message = "") {
     if (!empty($message)) {
         return "<div class = \"alert alert-success\">{$message}</div>";
     } else {
         return "";
     }
 }

 function output_error($error = "") {
     if (!empty($error)) {
         return "<div class = \"alert alert-danger\">{$error}</div>";
     } else {
         return "";
     }
 }

function __autoload($class_name) {
    $class_name = strtolower($class_name);
    $path       = LIB_PATH . DS . "{$class_name}.php";
    if (file_exists($path)) {
        require_once($path);
    } else {
        die("The file {$class_name}.php could not be found.");
    }
}

function include_layout_template($template = "") {
    include(SITE_ROOT . DS . 'layouts' . DS . $template);
}

function log_action($action, $user = "") {
    $logfile = dirname(SITE_ROOT) . DS . 'logs' . DS . 'log.txt';
    $new     = file_exists($logfile) ? false : true;
    if ($handle = fopen($logfile, 'a')) {
        // append
        $time = strftime("%H:%M:%S");
        $date = strftime("%Y-%m-%d");
        // $content = "{$action} | {$user} | {$time} | {$date}\n";


        $content = [
            "action" => $action,
            "user"   => $user,
            "time"   => $time,
            "date"   => $date,
        ];

        $encrypted = serialize($content) . "\n";

        fwrite($handle, $encrypted);
        fclose($handle);
        if ($new) {
            chmod($logfile, 0755);
        }
    } else {
        echo "Could not open log file for writing.";
    }
}

/**
 * Debug dump and die
 */
function dd() {
    echo "<pre>";
    foreach (func_get_args() as $arg) {
        var_dump($arg);
    }
    echo "</pre>";
    exit();
}


?>