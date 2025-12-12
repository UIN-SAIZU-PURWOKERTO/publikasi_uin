<?php
function is_active($url)
{
    $ci =& get_instance();
    return ($ci->uri->uri_string() == $url) ? "active" : "";
}