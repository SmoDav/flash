<?php
/**
 * @category PHP
 * @author   David Mjomba <smodavprivate@gmail.com>
 */

namespace SmoDav\Flash;

interface SessionStore
{
    /**
     * Flash a message to the session.
     *
     * @param $key
     * @param $value
     */
    public function flash($key, $value);

    /**
     * Check if a key exists in the session.
     *
     * @param $key
     */
    public function has($key);
}
