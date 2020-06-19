<?php

//error_reporting(0);

spl_autoload_register(function($className){
    
    // dove trovare le classi
    
    @include_once __DIR__.'/class/'.$className.'.php';
    @include_once __DIR__.'/'.$className.'.php';
    @include_once __DIR__.'/model/'.$className.'.php';

});
