<?php

namespace Boleto;

class Sacado
{
    /**
     * @var string
     */
    private $nome;

    /**
     * @var string Tipo Logradouro
     */
    private $tipoLogradouro;

    /**
     * @var string Endereço
     */
    private $enderecoLogradouro;

    /**
     * @var string Número
     */
    private $numeroLogradouro;

    /**
     * @var string Cidade
     */
    private $cidade;

    /**
     * @var string UF
     */
    private $uf;

    /**
     * @var string Cep
     */
    private $cep;

    /**
     * @var string CpfCnpj
     */
    private $cpfCnpj;

    /**
     * @var string Bairro
     */
    private $bairro;

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getTipoLogradouro()
    {
        return $this->tipoLogradouro;
    }

    /**
     * @param string $tipoLogradouro
     */
    public function setTipoLogradouro($tipoLogradouro)
    {
        $this->tipoLogradouro = $tipoLogradouro;
    }

    /**
     * @return string
     */
    public function getEnderecoLogradouro()
    {
        return $this->enderecoLogradouro;
    }

    /**
     * @param string $enderecoLogradouro
     */
    public function setEnderecoLogradouro($enderecoLogradouro)
    {
        $this->enderecoLogradouro = $enderecoLogradouro;
    }

    /**
     * @return string
     */
    public function getNumeroLogradouro()
    {
        return $this->numeroLogradouro;
    }

    /**
     * @param string $numeroLogradouro
     */
    public function setNumeroLogradouro($numeroLogradouro)
    {
        $this->numeroLogradouro = $numeroLogradouro;
    }

    /**
     * @return string
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param string $cidade
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    /**
     * @return string
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * @param string $uf
     */
    public function setUf($uf)
    {
        $this->uf = $uf;
    }

    /**
     * @return string
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param string $cep
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    /**
     * @return string
     */
    public function getCpfCnpj()
    {
        return $this->cpfCnpj;
    }

    /**
     * @param string $cpfCnpj
     */
    public function setCpfCnpj($cpfCnpj)
    {
        $this->cpfCnpj = $cpfCnpj;
    }

    /**
     * @return string
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param string $bairro
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }
}
