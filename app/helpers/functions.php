<?php

namespace app\helpers;

    function dd($params = [], $die = true)
    {
        echo '<pre>';
        print_r($params);
        echo '</pre>';
        if ($die) {
            die();
        }
    }
