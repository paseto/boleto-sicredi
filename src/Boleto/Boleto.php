<?php

namespace Boleto;

use Boleto\Util\Modulo;
use Boleto\Util\Data;
use Boleto\Util\Numero;

class Boleto
{
    /**
     * @var Banco
     */
    private $banco;

    /**
     * @var Cedente
     */
    private $cedente;
    /**
     * @var Sacado
     */
    private $sacado;
    /**
     * @var Avalista
     */
    private $avalista;
    /**
     * @var string
     */
    private $nossoNumero;
    /**
     * @var string
     */
    private $numeroDocumento;
    /**
     * @var \DateTime
     */
    private $dataVencimento;
    /**
     * @var \DateTime
     */
    private $dataDocumento;
    /**
     * @var \DateTime
     */
    private $dataProcessamento;
    /**
     * @var float
     */
    private $valorBoleto;
    /**
     * @var int
     */
    private $numeroMoeda;

    /**
     * @param int $numeroMoeda
     */
    public function setNumeroMoeda($numeroMoeda)
    {
        $this->numeroMoeda = $numeroMoeda;
    }

    /**
     * @return int
     */
    public function getNumeroMoeda()
    {
        return $this->numeroMoeda;
    }

    /**
     * @var array
     */
    private $demonstrativos = array();

    /**
     * @var array
     */
    private $instrucoes = array();

    /**
     * @param Banco $banco
     */
    public function setBanco(Banco $banco)
    {
        $this->banco = $banco;
    }

    /**
     * @return Banco
     */
    public function getBanco()
    {
        return $this->banco;
    }

    /**
     * @param \DateTime $dataDocumento
     */
    public function setDataDocumento(\DateTime $dataDocumento)
    {
        $this->dataDocumento = $dataDocumento;
    }

    /**
     * @return \DateTime
     */
    public function getDataDocumento()
    {
        return $this->dataDocumento;
    }

    /**
     * @param \DateTime $dataProcessamento
     */
    public function setDataProcessamento(\DateTime $dataProcessamento)
    {
        $this->dataProcessamento = $dataProcessamento;
    }

    /**
     * @return \DateTime
     */
    public function getDataProcessamento()
    {
        return $this->dataProcessamento;
    }

    /**
     * @param \DateTime $dataVencimento
     */
    public function setDataVencimento(\DateTime $dataVencimento)
    {
        $this->dataVencimento = $dataVencimento;
    }

    /**
     * @return \DateTime
     */
    public function getDataVencimento()
    {
        return $this->dataVencimento;
    }

    /**
     * @param array $demonstrativos
     */
    public function setDemonstrativos($demonstrativos)
    {
        $this->demonstrativos = $demonstrativos;
    }

    public function addDemonstrativo($demonstrativo)
    {
        $this->demonstrativos[] = $demonstrativo;
    }

    /**
     * @return array
     */
    public function getDemonstrativos()
    {
        return $this->demonstrativos;
    }

    /**
     * @param Cedente $cedente
     */
    public function setCedente($cedente)
    {
        $this->cedente = $cedente;
    }

    /**
     * @return Cedente
     */
    public function getCedente()
    {
        return $this->cedente;
    }

    /**
     * @param array $instrucoes
     */
    public function setInstrucoes($instrucoes)
    {
        $this->instrucoes = $instrucoes;
    }

    public function addInstrucao($instrucao)
    {
        $this->instrucoes[] = $instrucao;
    }

    /**
     * @return array
     */
    public function getInstrucoes()
    {
        return $this->instrucoes;
    }

    /**
     * @param mixed $nossoNumero
     */
    public function setNossoNumero($nossoNumero)
    {
        $this->nossoNumero = $nossoNumero;
    }

    /**
     * @return string
     */
    public function getNossoNumero()
    {
        return $this->nossoNumero;
    }

    /**
     * @param mixed $numeroDocumento
     */
    public function setNumeroDocumento($numeroDocumento)
    {
        $this->numeroDocumento = $numeroDocumento;
    }

    /**
     * @return mixed
     */
    public function getNumeroDocumento()
    {
        return $this->numeroDocumento;
    }

    /**
     * @param Sacado $sacado
     */
    public function setSacado($sacado)
    {
        $this->sacado = $sacado;
    }

    /**
     * @return Sacado
     */
    public function getSacado()
    {
        return $this->sacado;
    }

    /**
     * @param Avalista $avalista
     */
    public function setAvalista($avalista)
    {
        $this->avalista = $avalista;
    }

    /**
     * @return Avalista
     */
    public function getAvalista()
    {
        return $this->avalista;
    }

    /**
     * @param float $valorBoleto
     */
    public function setValorBoleto($valorBoleto)
    {
        $this->valorBoleto = $valorBoleto;
    }

    /**
     * @return float
     */
    public function getValorBoleto()
    {
        return $this->valorBoleto;
    }

    /**
     * @return int
     */
    public function getValorBoletoSemVirgula()
    {
        //valor tem 10 digitos, sem virgula
        return Numero::formataNumero($this->valorBoleto, 10, 0, 'valor');
    }

    public function getFatorVencimento()
    {
        $data = explode('/', $this->getDataVencimento()->format('d/m/Y'));
        $ano = $data[2];
        $mes = $data[1];
        $dia = $data[0];

        return abs((Data::dateToDays('1997', '10', '07')) - (Data::dateToDays($ano, $mes, $dia)));
    }

    /**
     * @return string
     */
    public function getDigitoVerificadorCodigoBarras()
    {
        return $this->getBanco()->getDigitoVerificadorCodigoBarras($this);
    }

    /**
     * @param $numero
     *
     * @return mixed
     */
    public function digitoVerificadorNossonumero($numero)
    {
        return $this->getBanco()->digitoVerificadorNossonumero($numero);
    }

    /**
     * @return string
     */
    public function getLinha()
    {
        return $this->getBanco()->getLinha($this);
    }

    public function gerarLinhaDigitavel()
    {
        $codigo = $this->getLinha();
        // Posição 	Conteúdo
        // 1 a 3    Número do banco
        // 4        Código da Moeda - 9 para Real
        // 5        Digito verificador do Código de Barras
        // 6 a 9   Fator de Vencimento
        // 10 a 19 Valor (8 inteiros e 2 decimais)
        // 20 a 44 Campo Livre definido por cada banco (25 caracteres)

        // 1. Campo - composto pelo código do banco, código da moéda, as cinco primeiras posições
        // do campo livre e DV (modulo10) deste campo
        $p1 = substr($codigo, 0, 4);
        $p2 = substr($codigo, 19, 5);
        $p3 = Modulo::modulo10("$p1$p2");
        $p4 = "$p1$p2$p3";
        $p5 = substr($p4, 0, 5);
        $p6 = substr($p4, 5);
        $campo1 = "$p5.$p6";

        // 2. Campo - composto pelas posiçoes 6 a 15 do campo livre
        // e livre e DV (modulo10) deste campo
        $p1 = substr($codigo, 24, 10);
        $p2 = Modulo::modulo10($p1);
        $p3 = "$p1$p2";
        $p4 = substr($p3, 0, 5);
        $p5 = substr($p3, 5);
        $campo2 = "$p4.$p5";

        // 3. Campo composto pelas posicoes 16 a 25 do campo livre
        // e livre e DV (modulo10) deste campo
        $p1 = substr($codigo, 34, 10);
        $p2 = Modulo::modulo10($p1);
        $p3 = "$p1$p2";
        $p4 = substr($p3, 0, 5);
        $p5 = substr($p3, 5);
        $campo3 = "$p4.$p5";

        // 4. Campo - digito verificador do codigo de barras
        $campo4 = substr($codigo, 4, 1);

        // 5. Campo composto pelo fator vencimento e valor nominal do documento, sem
        // indicacao de zeros a esquerda e sem edicao (sem ponto e virgula). Quando se
        // tratar de valor zerado, a representacao deve ser 000 (tres zeros).
        $p1 = substr($codigo, 5, 4);
        $p2 = substr($codigo, 9, 10);
        $campo5 = "$p1$p2";

        return "$campo1 $campo2 $campo3 $campo4 $campo5";
    }

    /**
     * @return mixed
     */
    public function getNossoNumeroSemDigitoVerificador()
    {
        return $this->getBanco()->getNossoNumeroSemDigitoVerificador($this);
    }

    /**
     * @return mixed
     */
    public function getDigitoVerificadorNossoNumero()
    {
        return $this->getBanco()->getDigitoVerificadorNossoNumero($this);
    }

    /**
     * @return mixed
     */
    public function getNossoNumeroComDigitoVerificador()
    {
        return $this->getBanco()->getNossoNumeroComDigitoVerificador($this);
    }

    /**
     * @return mixed
     */
    public function getCarteiraENossoNumeroComDigitoVerificador()
    {
        return $this->getBanco()->getCarteiraENossoNumeroComDigitoVerificador($this);
    }
}
