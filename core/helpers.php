<?php

function view($name, $data = [])
{
    extract($data);

    require __DIR__ . "/../app/Views/{$name}.view.php";
}
