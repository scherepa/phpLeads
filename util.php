<?php
function filter_post($_a, $_conn)
{
    $a = trim(filter_input(INPUT_POST, $_a, FILTER_SANITIZE_STRING));
    $a = mysqli_real_escape_string($_conn, $a);
    return $a;
}
function filter_get($_a, $_conn)
{
    $a = trim(filter_input(INPUT_GET, $_a, FILTER_SANITIZE_STRING));
    $a = mysqli_real_escape_string($_conn, $a);
    return $a;
}
