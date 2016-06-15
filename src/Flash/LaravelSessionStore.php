<?php
/**
 * @category PHP
 * @author   David Mjomba <smodavprivate@gmail.com>
 */

namespace SmoDav\Flash;

use Illuminate\Session\Store;

class LaravelSessionStore implements SessionStore
{
    /**
     * @var Store
     */
    private $session;

    /**
     * @param Store $session
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Implement a flash message to the session.
     *
     * @param $key
     * @param $value
     */
    public function flash($key, $value)
    {
        $this->session->flash($key, $value);
    }

    /**
     * Check if a key exists in the session.
     *
     * @param $key
     *
     * @return bool
     */
    public function has($key)
    {
        return $this->session->has($key);
    }


}
