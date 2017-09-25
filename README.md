# Gerador de Boletos Sicredi

Gera boletos Sicredi em PDF padrão CNAB 400.

### Setup

```sh
$ composer require paseto/boletos
```

### Usage

Install the dependencies and devDependencies and start the server.

```sh
require './vendor/autoload.php';

use Boletos\Boleto\Boleto;
use Boletos\Boleto\Cedente;
use Boletos\Boleto\Sacado;
use Boletos\Boleto\GeradorBoleto;
use Boletos\Boleto\Banco\Sicredi;

$Boleto = new Boleto();

//Configurações do banco
$Sicredi = new Sicredi();
$Sicredi->setCarteira('A');//C - Sem registro | A - Com Registro
$Sicredi->setPosto("04");
$Sicredi->setByte("2");

//Dados do Boleto
$Boleto->setBanco($Sicredi);
$Boleto->setNumeroMoeda("9");
$Boleto->setDataVencimento(DateTime::createFromFormat('d/m/Y', "10/10/2017"));
$Boleto->setDataDocumento(DateTime::createFromFormat('d/m/Y', "22/05/2017"));
$Boleto->setDataProcessamento(DateTime::createFromFormat('d/m/Y', "22/05/2017"));
$Boleto->addInstrucao("- Sr. Caixa, não receber após o vencimento");
$Boleto->addInstrucao("- Após o vencimento cobrar mora diária de 0,33%");
$Boleto->setValorBoleto("90,00");
$Boleto->setNossoNumero("01085");

//Dados do Cendente
$Cedente = new Cedente();
$Cedente->setNome("Global Components");
$Cedente->setAgencia("2217");
$Cedente->setDvAgencia("0");
$Cedente->setConta("11448");
$Cedente->setDvConta("9");
$Cedente->setEndereco("Rua Carlos Castro, N&ordm; 245, Centro");
$Cedente->setCidade("Pinheiros");
$Cedente->setUf("SC");
$Cedente->setCpfCnpj("51.246.337/0001-14");
$Cedente->setCodigoCedente("11448");
$Boleto->setCedente($Cedente);

//Dados do Sacado
$Sacado = new Sacado();
$Sacado->setNome("Marcos da Silva");
$Sacado->setTipoLogradouro("Rua");
$Sacado->setEnderecoLogradouro("Av Prefeiro Jose Da Silva");
$Sacado->setNumeroLogradouro("100");
$Sacado->setCidade("São Vicente");
$Sacado->setUf("SP");
$Sacado->setCep("11380-000");
$Boleto->setSacado($Sacado);

//Gera boleto em PDF
$GeradorBoleto = new GeradorBoleto();
$GeradorBoleto->gerar($Boleto)->Output('boleto.pdf', 'I');

```

### Impressão em lote

Instance PDF class
```sh
$pdf = new \fpdf\FPDF();
...
foreach ($array as $key => $value){
    ...
    $stream = base64_encode($GeradorBoleto->gerar($Boleto)->Output('doc.pdf','S'));
    $GeradorBoleto->gerar($Boleto, $pdf); 
}
 $pdf->Output('doc.pdf', 'I');
```

## Contributing
 
1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Submit a pull request :D

## History
 
Version 0.1 (2017-09-25) - first release
 
## License
 
The MIT License (MIT)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.