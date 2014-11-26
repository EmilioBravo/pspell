<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 10/10/14
 * Time: 01:25
 */

namespace Chencha\Pspell\Dictionary;

use Chencha\Pspell\Config;
use Chencha\Pspell\Mapping;

class PspellDictionary implements Dictionary
{
    protected $dictionary;
    /**
     * @var Config
     */
    protected $config;

    /**
     * @param Config $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }

    /**
     * @var Mapping
     */
    protected $mapping;

    function __construct()
    {
        $this->_run();

    }

    protected function _run()
    {
        new CheckPspellIsInstalled();
        $this->_loadDictionary();
        $this->_loadConfiguration();
    }

    /**
     * @return mixed
     */
    public function getDictionary()
    {
        return $this->dictionary;
    }

    protected function _loadDictionary()
    {
        $dictionary_config = pspell_config_create(
            $this->config->get('language')

        );
        $this->dictionary = pspell_new_config($dictionary_config);
    }

    protected function _loadConfiguration()
    {
        $this->loadSetConfigurations->doMapping($this->dictionary_config);
    }

    /**
     * @Inject
     *
     * @return Mapping
     */
    public function getMapping()
    {
        return $this->mapping;
    }

    /**
     * @Inject
     *
     * @param Mapping $mapping
     */
    public function setMapping($mapping)
    {
        $this->mapping = $mapping;
    }


}