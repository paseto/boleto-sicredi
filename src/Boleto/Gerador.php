<?php

namespace Boleto;

abstract class Gerador
{
    public static function getDirImages()
    {
        return __DIR__.'/Resources/imgs/';
    }
}
