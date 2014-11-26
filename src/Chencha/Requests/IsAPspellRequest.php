<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 26/11/14
 * Time: 20:23
 */

namespace Chencha\Pspell\Requests;

use Chencha\Autosuggest\Validators\CheckValidWord;

abstract class IsAPspellRequest
{
    protected $response;
    protected $word;

    /**
     * @var Dictionary
     */
    protected $dictionary;
    use Chencha\Pspell\Dictionary;

    function __construct($word)
    {
        new CheckValidWord($word);
        $this->word = $word;
        $this->run();
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @Inject
     * @param Dictionary $dictionary
     */
    function setDictionary(Dictionary $dictionary){
        $this->dictionary=$dictionary;
    }

    abstract function run();

} 