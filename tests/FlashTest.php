<?php

use Mockery as mocker;
use SmoDav\Flash\Exceptions\InvalidFlashException;
use SmoDav\Flash\Notifier;

class FlashTest extends PHPUnit_Framework_TestCase {

    protected $session;

    protected $flash;

    public function setUp()
    {
        $this->session = mocker::mock('SmoDav\Flash\SessionStore');
        $this->flash = new Notifier($this->session);
    }

    /** @test */
    public function it_displays_success_flash_alert()
    {
        $this->session->shouldReceive('flash')->with('sf_title', "Hi there");
        $this->session->shouldReceive('flash')->with('sf_message', "Run's like charm");
        $this->session->shouldReceive('flash')->with('sf_level', 'success');

        $this->flash->success("Hi there", "Run's like charm");
    }

    /** @test */
    public function it_displays_info_flash_alert()
    {
        $this->session->shouldReceive('flash')->with('sf_title', "Hi there");
        $this->session->shouldReceive('flash')->with('sf_message', "Run's like charm");
        $this->session->shouldReceive('flash')->with('sf_level', 'info');

        $this->flash->info("Hi there", "Run's like charm");
    }

    /** @test */
    public function it_displays_warning_flash_alert()
    {
        $this->session->shouldReceive('flash')->with('sf_title', "Hi there");
        $this->session->shouldReceive('flash')->with('sf_message', "Run's like charm");
        $this->session->shouldReceive('flash')->with('sf_level', 'warning');

        $this->flash->warning("Hi there", "Run's like charm");
    }

    /** @test */
    public function it_displays_error_flash_alert()
    {
        $this->session->shouldReceive('flash')->with('sf_title', "Hi there");
        $this->session->shouldReceive('flash')->with('sf_message', "Run's like charm");
        $this->session->shouldReceive('flash')->with('sf_level', 'error');

        $this->flash->error("Hi there", "Run's like charm");
    }
    
    /** @test */
    public function it_displays_a_flash_notice()
    {
        $this->session->shouldReceive('flash')->with('sf_notice', true);
        $this->session->shouldReceive('flash')->with('sf_notice_message', "Run's like charm");
        $this->session->shouldReceive('flash')->with('sf_notice_level', 'success');

        $this->flash->notice("Run's like charm");
    }

    /** @test */
    public function it_throws_exception_with_invalid_instance()
    {
        $this->expectException(InvalidFlashException::class);
        
        $this->session->shouldReceive('has')->with('sf_title');
        $this->session->shouldReceive('has')->with('sf_message');
        $this->session->shouldReceive('has')->with('sf_level');

        $this->flash->persist();
    }
}
