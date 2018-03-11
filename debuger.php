<?php
    function debug($note, $str) {
        echo $note ." ";
        echo '<b>Type: </b><i>'.gettype($str).':</i>';
        echo '<b> name: </b>'. print_var_name($str). '<br>  ';
        if ( is_array($str) || (is_object($str))) {
            echo "<pre>";
            print_r($str);
            echo "</pre>";
        }else {
            echo $str;
        }  
    }

    function print_var_name($var) {
        foreach($GLOBALS as $var_name => $value) {
            if ($value === $var) {
                return $var_name;
            }
        }
    
        return false;
    }
?>