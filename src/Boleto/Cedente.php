<?php

namespace Boleto;

use Boleto\Util\Numero;

class Cedente
{
    /**
     * @var string Nome
     */
    private $nome;

    /**
     * @var string Cpf/Cnpj
     */
    private $cpfCnpj;

    /**
     * @var string Endereço
     */
    private $endereco;

    /**
     * @var string Cidade
     */
    private $cidade;

    /**
     * @var string UF
     */
    private $uf;

    /**
     * @var string Agência
     */
    private $agencia;

    /**
     * @var string Dígito Verificador Agência
     */
    private $dvAgencia;

    /**
     * @var string
     */
    private $conta;

    /**
     * @var string Dígito Verificador Conta
     */
    private $dvConta;

    /**
     * @var string Código do Cedente
     */
    private $codigoCedente;

    /**
     * @param string $agencia
     */
    public function setAgencia($agencia)
    {
        $this->agencia = $agencia;
    }

    /**
     * @return string
     */
    public function getAgencia()
    {
        return $this->agencia;
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
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param string $conta
     */
    public function setConta($conta)
    {
        $this->conta = $conta;
    }

    /**
     * @return string
     */
    public function getConta()
    {
        return $this->conta;
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
    public function getCpfCnpj()
    {
        return $this->cpfCnpj;
    }

    /**
     * @param string $dvAgencia
     */
    public function setDvAgencia($dvAgencia)
    {
        $this->dvAgencia = $dvAgencia;
    }

    /**
     * @return string
     */
    public function getDvAgencia()
    {
        return $this->dvAgencia;
    }

    /**
     * @param string $dvConta
     */
    public function setDvConta($dvConta)
    {
        $this->dvConta = $dvConta;
    }

    /**
     * @return string
     */
    public function getDvConta()
    {
        return $this->dvConta;
    }

    /**
     * @param string $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    /**
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
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
    public function getNome()
    {
        return $this->nome;
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
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * @return string Agência com Dv
     */
    public function getAgenciaComDv()
    {
        return $this->agencia.'-'.$this->dvAgencia;
    }

    /**
     * @return string Conta com Dv
     */
    public function getContaComDv()
    {
        $conta = Numero::formataNumero($this->getConta(), 7, 0);
        $dv = Numero::formataNumero($this->dvConta, 1, 0);

        return $conta.'-'.$dv;
    }
    
    public function getCodigoCedente()
    {
        return $this->codigoCedente;
    }

    public function setCodigoCedente($codigoCedente)
    {
        $this->codigoCedente = $codigoCedente;
    }
}
