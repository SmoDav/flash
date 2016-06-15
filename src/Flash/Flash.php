<?php
/**
 * @category PHP
 * @author   David Mjomba <smodavprivate@gmail.com>
 */

namespace SmoDav\Flash;

use SmoDav\Flash\Exceptions\InvalidFlashException;

/**
 * Class Flash
 *
 * @category PHP
 * @package  SmoDav\Flash
 * @author   David Mjomba <smodavprivate@gmail.com>
 */
class Flash
{
    /**
     * Flash a message of type info
     *
     * @param string $title
     * @param string $message
     *
     * @return Flash
     */
    public function info($title, $message)
    {
         return $this->create($title, $message, 'info');
    }

    /**
     * Flash a message of type success
     *
     * @param string $title
     * @param string $message
     *
     * @return Flash
     */
    public function success($title, $message)
    {
        return $this->create($title, $message, 'success');
    }

    /**
     * Flash a message of type warning
     *
     * @param string $title
     * @param string $message
     *
     * @return Flash
     */
    public function warning($title, $message)
    {
        return $this->create($title, $message, 'warning');
    }

    /**
     * Flash a message of type error
     *
     * @param string $title
     * @param string $message
     *
     * @return Flash
     */
    public function error($title, $message)
    {
        return $this->create($title, $message, 'error');
    }

    /**
     * Flash a message and persist it until dismissed
     *
     * @return $this
     * @throws InvalidFlashException
     */
    public function persist()
    {
        $this->validate();
        session()->flash('sf_persist', true);

        return $this;
    }

    /**
     * Flash a non-blocking notice
     *
     * @param string $message
     *
     * @return Flash
     */
    public function notice($message)
    {
        session()->flash('sf_notice', true);
        session()->flash('sf_notice_message', $message);
        session()->flash('sf_notice_level', 'success');

        return $this;
    }

    /**
     * Create the actual flash message
     *
     * @param string $title
     * @param string $message
     * @param string $level
     *
     * @return Flash
     */
    private function create($title, $message, $level)
    {
        session()->flash('sf_title', $title);
        session()->flash('sf_message', $message);
        session()->flash('sf_level', $level);

        return $this;
    }

    /**
     * Validate the flash instance before persisting it
     *
     * @throws InvalidFlashException
     */
    private function validate()
    {
        if (! session()->has('sf_title') || ! session()->has('sf_message') || ! session()->has('sf_level')) {
            throw new InvalidFlashException("Cannot persist an empty flash instance");
        }
    }
}
