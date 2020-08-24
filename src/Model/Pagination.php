<?php


namespace App\Model;


use Symfony\Component\Routing\Generator\UrlGenerator;

class Pagination
{
    /**
     * @var string
     */
    public $first;

    /**
     * @var string
     */
    public $last;

    /**
     * @var string
     */
    public $prev;

    /**
     * @var string
     */
    public $next;
}