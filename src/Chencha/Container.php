<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 26/11/14
 * Time: 20:37
 */

namespace Chencha\Pspell;


class Container {
    /**
     * @var \DI\Container
     */
    protected $container;
    /**
     * @return \DI\Container
     */
    public function getContainer()
    {
        return $this->container;

    }
} 