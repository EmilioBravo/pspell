<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 26/11/14
 * Time: 20:37
 */

namespace Chencha\Pspell;


use Chencha\Pspell\Mapping\LoadMapping;
use Chencha\Pspell\Mapping\PspellLoadMapping;
use Chencha\Pspell\Mapping\ConfigurationMapping;
use Chencha\Pspell\Mapping\PspellConfigurationMapping;
use Chencha\Pspell\Dictionary\Dictionary;
use Chencha\Pspell\Dictionary\PspellDictionary;

class Container
{

    /**
     * @var \DI\Container
     */
    public $container;
    /**
     * @var Config
     */
    protected $config;
    /**
     * @var Dictionary
     */
    protected $dictionary;

    public function __construct(Config $config)
    {

        $builder = new \DI\ContainerBuilder();
        $this->container = $builder->build();
        $this->config = $config;
        $this->_setConfig();
        $this->_setConfigurationMapping();
        $this->_setLoadMapping();
        $this->_setDictionary();
    }


    /**
     * @return \DI\Container
     */
    public function getContainer()
    {
        return $this->container;

    }

    protected function _setConfig()
    {
        $this->container->set("Chencha\Pspell\Config", $this->config);
    }

    protected function _setConfigurationMapping()
    {
        $this->container->set(
            "Chencha\Pspell\Mapping\ConfigurationMapping",
            new PspellConfigurationMapping()
        );
    }

    protected function _setLoadMapping()
    {
        $this->container->set(
            "Chencha\Pspell\Mapping\LoadMapping",
            $this->container->make("Chencha\Pspell\Mapping\PspellLoadMapping")
        );
    }

    protected function _setDictionary()
    {

        $this->dictionary = $this->container->make("Chencha\Pspell\Dictionary\PspellDictionary");

    }

    /**
     * @return mixed
     */
    public function getDictionary()
    {
        return $this->dictionary;
    }


}