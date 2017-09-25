<?php

namespace Boleto;

use Boleto\Util\Modulo;

abstract class Banco
{
    /**
     * @var int Código do Banco
     */
    private $codigo;

    /**
     * @var int Dígito Verificador Banco
     */
    private $digitoVerificador;

    /**
     * @var string Especie
     */
    private $especie;

    /**
     * @var string Especie Documento
     */
    private $especieDocumento;

    /**
     * @var string Nome
     */
    private $nome;

    /**
     * @var string Logomarca
     */
    private $logomarca;

    /**
     * @var string Carteira
     */
    private $carteira;

    /**
     * @var int Modalidade da carteira 1-Registrada/2-Sem Registro
     */
    private $carteiraModalidade;

    /**
     * @var string Local Pagamento
     */
    private $localPagamento;

    /**
     * @var string A (Aceite) ou N (Não Aceite
     */
    private $aceite;
    /**
     * @var int
     */
    private $tipoImpressao = 4;

    /**
     * @var string
     */
    private $layoutCarne;

    /**
     * @var string
     */
    private $posto;

    /**
     * @var string
     */
    private $byte;

    public function __construct()
    {
        $this->init();
    }

    abstract protected function init();

    /**
     * @return int Código
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param int $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    /**
     * @return int
     */
    public function getDigitoVerificador()
    {
        return $this->digitoVerificador;
    }

    /**
     * @param int $digitoVerificador
     */
    public function setDigitoVerificador($digitoVerificador)
    {
        $this->digitoVerificador = $digitoVerificador;
    }

    /**
     * @return string
     */
    public function getEspecie()
    {
        return $this->especie;
    }

    /**
     * @param string $especie
     */
    public function setEspecie($especie)
    {
        $this->especie = $especie;
    }

    /**
     * @return string
     */
    public function getEspecieDocumento()
    {
        return $this->especieDocumento;
    }

    /**
     * @param string $especieDocumento
     */
    public function setEspecieDocumento($especieDocumento)
    {
        $this->especieDocumento = $especieDocumento;
    }

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
    public function getLogomarca()
    {
        return $this->logomarca;
    }

    /**
     * @param string $logomarca
     */
    public function setLogomarca($logomarca)
    {
        $this->logomarca = $logomarca;
    }

    /**
     * @return string
     */
    public function getCarteira()
    {
        return $this->carteira;
    }

    /**
     * @param string $carteira
     */
    public function setCarteira($carteira)
    {
        $this->carteira = $carteira;
    }

    /**
     * @return int
     */
    public function getCarteiraModalidade()
    {
        return $this->carteiraModalidade;
    }

    /**
     * @param int $carteiraModalidade
     */
    public function setCarteiraModalidade($carteiraModalidade)
    {
        $this->carteiraModalidade = $carteiraModalidade;
    }

    /**
     * @return string
     */
    public function getLocalPagamento()
    {
        return $this->localPagamento;
    }

    /**
     * @param string $localPagamento
     */
    public function setLocalPagamento($localPagamento)
    {
        $this->localPagamento = $localPagamento;
    }

    /**
     * @return string
     */
    public function getAceite()
    {
        return $this->aceite;
    }

    /**
     * @param string $aceite
     */
    public function setAceite($aceite)
    {
        $this->aceite = $aceite;
    }

    /**
     * @return int
     */
    public function getTipoImpressao()
    {
        return $this->tipoImpressao;
    }

    /**
     * @param int $tipoImpressao
     */
    public function setTipoImpressao($tipoImpressao)
    {
        $this->tipoImpressao = $tipoImpressao;
    }

    /**
     * @return string
     */
    public function getCodigoComDigitoVerificador()
    {
        return $this->geraCodigoBanco();
    }

    public function geraCodigoBanco()
    {
        $parte1 = substr($this->codigo, 0, 3);
        $parte2 = Modulo::modulo11($parte1);
        if (!empty($this->getDigitoVerificador())) {
            $parte2 = $this->getDigitoVerificador();
        }

        return $parte1.'-'.$parte2;
    }

    public function getCarteiraFormatada()
    {
        return 2 == $this->getCarteiraModalidade() ? 'SR' : 'RG';
    }

    /**
     * @return string
     */
    public function getLayoutCarne()
    {
        return $this->layoutCarne;
    }

    /**
     * @param string $layoutCarne
     */
    public function setLayoutCarne($layoutCarne)
    {
        $this->layoutCarne = $layoutCarne;
    }

    public function getPosto()
    {
        return $this->posto;
    }

    public function getByte()
    {
        return $this->byte;
    }

    public function setPosto($posto)
    {
        $this->posto = $posto;
    }

    public function setByte($byte)
    {
        $this->byte = $byte;
    }

    /**
     * @param Boleto $boleto
     *
     * @return int|string
     */
    abstract public function getNossoNumeroComDigitoVerificador(Boleto $boleto);

    /**
     * @param Boleto $boleto
     *
     * @return string
     */
    abstract public function getNossoNumeroSemDigitoVerificador(Boleto $boleto);

    /**
     * @param Boleto $boleto
     *
     * @return string
     */
    abstract public function getCarteiraENossoNumeroComDigitoVerificador(Boleto $boleto);

    /**
     * @param Boleto $boleto
     *
     * @return mixed
     */
    abstract public function getDigitoVerificadorCodigoBarras(Boleto $boleto);

    /**
     * @param $numero
     *
     * @return mixed
     */
    abstract public function digitoVerificadorNossonumero($numero);

    /**
     * @param Boleto $boleto
     *
     * @return mixed
     */
    abstract public function getLinha(Boleto $boleto);
}
