<?php

namespace Chencha\Autosuggest\Validators;


use Chencha\Pspell\Exceptions\PspellIsNotInstalled;

class CheckPspellIsInstalled {

    function __construct()
    {
        if(!function_exists('pspell_new')){
            throw new PspellIsNotInstalled;
        }
    }
}