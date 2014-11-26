<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 26/11/14
 * Time: 20:22
 */

namespace Chencha\Pspell\Requests;


class CheckWordIsValid extends IsAPspellRequest
{
    function run()
    {
        $this->response = pspell_suggest(
            $this->dictionary->getDictionary(),
            $this->word
        );;
    }
}