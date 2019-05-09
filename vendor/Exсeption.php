<?php
/**
 * Created by andrii
 * Date: 08.05.19
 * Time: 16:44
 */

namespace app;

use Throwable;

class Exсeption extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}