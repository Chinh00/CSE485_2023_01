<?php

    function handleImageForFrontend ($url) {
        $url = explode("/", $url);
        array_splice($url, 0, 2);
        $url = implode("/", $url);
        return $url;
    }

    function SplitStringByWord($string, $limit)
    {
        $string = explode(" ", $string, $limit);
        array_splice($string, count($string) - 1, count($string) - 1);
        $string = implode(" ", $string);
        return $string . " ...";
    }

?>