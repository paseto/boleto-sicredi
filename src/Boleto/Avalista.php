<?php

namespace Boleto;

/**
 * Class Avalista.
 */
class Avalista
{
    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $cpfCnpj;

    /**
     * Avalista constructor.
     *
     * @param string $nome
     * @param string $cpfCnpj
     */
    public function __construct($nome, $cpfCnpj)
    {
        $this->nome = $nome;
        $this->cpfCnpj = $cpfCnpj;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return string
     */
    public function getCpfCnpj()
    {
        return $this->cpfCnpj;
    }
}
