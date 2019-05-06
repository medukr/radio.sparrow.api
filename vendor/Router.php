<?php
/**
 * Created by andrii
 * Date: 06.05.19
 * Time: 17:59
 */

namespace vendor;


class Router
{
    private $uri;

    public function __construct($uri)
    {
        $this->uri = $uri;
    }
}