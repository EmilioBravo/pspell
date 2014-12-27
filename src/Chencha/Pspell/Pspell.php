<?php
namespace Chencha\Pspell;
use Chencha\Pspell\Dictionary;
use Chencha\Pspell\Requests\CheckWordIsValid;
use Chencha\Pspell\Requests\RetreiveWordSuggestions;
use Chencha\Pspell\Container;
use Chencha\Pspell\Validators\CheckPspellIsInstalled;

class Pspell
{

    protected $dictionary;


    function __construct(Config $config)
    {
        new CheckPspellIsInstalled();

        $container = new Container($config);

        $this->dictionary = $container->getContainer()->get(Dictionary::class);
         var_dump($this->dictionary);die();



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