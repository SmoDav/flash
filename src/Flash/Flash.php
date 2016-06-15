<?php
/**
 * @category PHP
 * @author   David Mjomba <smodavprivate@gmail.com>
 */

namespace SmoDav\Flash;

use Illuminate\Support\Facades\Facade;

/**
 * Class Flash
 *
 * @category PHP
 * @package  SmoDav\Flash
 * @author   David Mjomba <smodavprivate@gmail.com>
 */
class Flash extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'flash';
    }
}
