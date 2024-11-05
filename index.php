<?php

require __DIR__ . '/vendor/autoload.php';

use SerasaExperian\SerasaExperianFacade;
use SerasaExperian\Parameters\ParametersInPF;
use SerasaExperian\Parameters\RetornoPF;
use SerasaExperian\Models\PessoaFisica;
use SerasaExperian\Models\SituacaoCadastralPessoaFisica;
use SerasaExperian\Models\AtividadeConsumo;
use SerasaExperian\Models\SocioEmpresa;
use SerasaExperian\Models\Ccf;
use SerasaExperian\Models\CodIbge;
use SerasaExperian\Models\RepresentanteLegal;

$object = new PessoaFisica;

$object->cpf = '00090826892';
$object->nome = '';
$object->dataNascimento = new DateTime;
$object->idade = 0;
$object->signo = '';
$object->sexo = '';
$object->nomeMae = '';
$object->situacaoCadastral = new SituacaoCadastralPessoaFisica;
$object->situacaoCadastral->nome = 'Nome';
$object->situacaoCadastral->dataConsulta = new DateTime;
$object->renda = '';
$object->triagemRisco = '';
$object->atividadeConsumo = new AtividadeConsumo;
$object->sociosEmpresa = array(new SocioEmpresa);
$object->profissao = '';
$object->estadoCivil = '';
$object->escolaridade = '';
$object->bolsaFamilia = false;
$object->mosaic = '';
$object->classeSocial = '';
$object->afinidadeCartaoCredito = false;
$object->afinidadeCreditoPessoal = false;
$object->afinidadeArtigosLuxo = false;
$object->afinidadePacotesTurismo = false;
$object->afinidadeCelularPosPago = false;
$object->afinidadeImobiliario = false;
$object->afinidadeTvAssinatura = false;
$object->afinidadeBandaLarga = false;
$object->afinidadeEcommerce = false;
$object->afinidadeClientePremium = false;
$object->afinidadeSmartphone = false;
$object->ccf = new Ccf;
$object->codIbge = new CodIbge;
$object->facesClasseMedia = '';
$object->latitude = '';
$object->longitude = '';
$object->nis = '';
$object->rg = '';
$object->servidorPublicoFederal = false;
$object->houseHoldID = '';
$object->houseHoldRenda = '';
$object->houseHoldQtdPessoa = '';
$object->representanteLegal = array(new RepresentanteLegal);
$object->inibir = 1;
$object->mensagem = '';


$array = $object->toArray();
$pfArray = new PessoaFisica;
$pfArray->fill($array);

die();


$username = '';
$password = '';

$parameters = new ParametersInPF;

$retorno = new RetornoPF();
$retorno->cpf = true;
$retorno->nome = true;
$retorno->endereco = true;
$retorno->dataNascimento = true;


$parameters->cpf = '00090826892';
$parameters->RetornoPF = $retorno;

$facade = new SerasaExperianFacade($username, $password, true);

$response = $facade->consultarPessoaFisica($parameters);

$result = $response->getResult();

echo "<strong>CPF: </strong>" . $result->cpf . "<br>";
echo "<strong>Nome: </strong>" . $result->nome . "<br>";
echo "<strong>Nascimento: </strong>" . DateTime::createFromFormat('Y-m-d\Th:i:s.000-03:00', $result->dataNascimento)->format('d/m/Y') . "<br>";
echo "<strong>Idade: </strong>" . $result->idade . " anos <br>";
echo "<strong>Signo: </strong>" . $result->signo . "<br>";
echo "<strong>Endereços: </strong><br>";

foreach ($result->enderecos->endereco as $endereco) {
    
    echo "<ul>";
    echo "<li><strong>Logradouro: </strong>" 
        . $endereco->logradouro->Tipo . " " 
        . $endereco->logradouro->Nome . ", " 
        . $endereco->logradouro->Numero .  "</li>";
    
    echo "<li><strong>Bairro: </strong>" . $endereco->bairro .  "</li>";
    echo "<li><strong>Cidade: </strong>" 
        . $endereco->cidade . " - " 
        . $endereco->uf . "<br>";
    
    echo "<li><strong>CEP: </strong>" . $endereco->cep .  "</li>";
    echo "</ul>";
}