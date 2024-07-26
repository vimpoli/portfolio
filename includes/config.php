<?php
$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], '/') + 1);

function base_url($slug)
{
    echo 'http://localhost/php-projects/portfolio/' . $slug;
}
