<?php

namespace Boleto;

use Picqer\Barcode\BarcodeGeneratorPNG;

/**
 * Class CodigoBarras.
 */
class CodigoBarras
{
    public function gerar(Boleto $boleto)
    {
        $generator = new BarcodeGeneratorPNG();
        echo $generator->getBarcode(
            $boleto->getLinha(),
            $generator::TYPE_INTERLEAVED_2_5,
            1,
            49.13
        );
    }
}
