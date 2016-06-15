<?php
/**
 * Flash helper function
 *
 * @param null $title
 * @param null $message
 *
 * @return \SmoDav\Flash\Flash
 */
function flash($title = null, $message = null)
{
    $flash = new SmoDav\Flash\Flash();
    
    if (func_num_args() == 0) {
        return $flash;
    }

    return $flash->info($title, $message);
}