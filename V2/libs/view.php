<?php

class View
{
    function __construct()
    {
        // echo "<p>Vista base</p>";
    }

    function render($name)
    {
        require 'views/' . $name . '.php';
    }
}
