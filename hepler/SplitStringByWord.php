<?php
    function SplitStringByWord($string, $limit) {
        $string = explode(" ", $string, $limit);
        array_splice($string, count($string) - 1, count($string) - 1);
        $string = implode(" ", $string);
        return $string . " ...";
    }
?>