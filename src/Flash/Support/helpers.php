<?php
if (! function_exists('flash')) {
    /**
     * Flash helper function
     *
     * @param null $title
     * @param null $message
     *
     * @return \SmoDav\Flash\Notifier
     */
    function flash($title = null, $message = null)
    {
        $flash = app('flash');

        if (func_num_args() == 0) {
            return $flash;
        }

        return $flash->info($title, $message);
    }
}
