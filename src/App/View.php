<?php

namespace Mizz\StudentCrud\App;

class View
{
    public static function render(string $view, $model)
    {
        require __DIR__ . "/../View/" . $view . ".php";
    }

    public static function redirect(string $path)
    {
        header("Location: $path");
    }
}
