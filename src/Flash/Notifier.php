<?php
/**
 * @category PHP
 * @author   David Mjomba <smodavprivate@gmail.com>
 */

namespace SmoDav\Flash;

use SmoDav\Flash\Exceptions\InvalidFlashException;

/**
 * Class Notifier
 *
 * @category PHP
 * @package  SmoDav\Flash
 * @author   David Mjomba <smodavprivate@gmail.com>
 */
class Notifier
{
    /**
     * @var SessionStore
     */
    protected $session;

    /**
     * Notifier constructor.
     *
     * @param SessionStore $session
     */
    public function __construct(SessionStore $session)
    {
        $this->session = $session;
    }

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
        $this->session->flash('sf_persist', true);

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
        $this->session->flash('sf_notice', true);
        $this->session->flash('sf_notice_message', $message);
        $this->session->flash('sf_notice_level', 'success');

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
        $this->session->flash('sf_title', $title);
        $this->session->flash('sf_message', $message);
        $this->session->flash('sf_level', $level);

        return $this;
    }

    /**
     * Validate the flash instance before persisting it
     *
     * @throws InvalidFlashException
     */
    private function validate()
    {
        if (! $this->session->has('sf_title') ||
            ! $this->session->has('sf_message') ||
            ! $this->session->has('sf_level')
        ) {
            throw new InvalidFlashException("Cannot persist an empty flash instance");
        }
    }
}
