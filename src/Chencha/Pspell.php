<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 26/11/14
 * Time: 20:27
 */

namespace Chencha\Pspell;

use Chencha\Pspell\Dictionary;
use Chencha\Pspell\Requests\CheckWordIsValid;
use Chencha\Pspell\Requests\RetreiveWordSuggestions;

class Pspell
{

    protected $dictionary;


    function __construct(Config $config)
    {
        $container = new Container($config);
        $this->dictionary = $container->getContainer()->get(Dictionary::class);

    }

    function getSuggestions($word)
    {
        $request = new RetreiveWordSuggestions($word, $this->dictionary);
        return $request->getResponse();

    }

    function check($word)
    {
        $request = new CheckWordIsValid($word, $this->dictionary);
        return $request->getResponse();
    }
} 