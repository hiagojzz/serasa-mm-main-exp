<?php

namespace SerasaExperian\Tests\Models;

use PHPUnit\Framework\TestCase;
use SerasaExperian\Models\PessoaFisica;
use SerasaExperian\Models\SituacaoCadastralPessoaFisica;
use SerasaExperian\Models\AtividadeConsumo;
use SerasaExperian\Models\SocioEmpresa;
use SerasaExperian\Models\Ccf;
use SerasaExperian\Models\CodIbge;
use SerasaExperian\Models\RepresentanteLegal;

class PessoaFisicaTest extends TestCase {

    /**
     * @var PessoaFisica
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new PessoaFisica;
        
        $this->object->cpf = '00090826892';
        $this->object->nome = '';
        $this->object->dataNascimento = new \DateTime;
        $this->object->idade = 0;
        $this->object->signo = '';
        $this->object->sexo = '';
        $this->object->nomeMae = '';
        $this->object->situacaoCadastral = new SituacaoCadastralPessoaFisica;
        $this->object->renda = '';
        $this->object->triagemRisco = '';
        $this->object->atividadeConsumo = new AtividadeConsumo;
        $this->object->sociosEmpresa = array(new SocioEmpresa);
        $this->object->profissao = '';
        $this->object->estadoCivil = '';
        $this->object->escolaridade = '';
        $this->object->bolsaFamilia = false;
        $this->object->mosaic = '';
        $this->object->classeSocial = '';
        $this->object->afinidadeCartaoCredito = false;
        $this->object->afinidadeCreditoPessoal = false;
        $this->object->afinidadeArtigosLuxo = false;
        $this->object->afinidadePacotesTurismo = false;
        $this->object->afinidadeCelularPosPago = false;
        $this->object->afinidadeImobiliario = false;
        $this->object->afinidadeTvAssinatura = false;
        $this->object->afinidadeBandaLarga = false;
        $this->object->afinidadeEcommerce = false;
        $this->object->afinidadeClientePremium = false;
        $this->object->afinidadeSmartphone = false;
        $this->object->ccf = new Ccf;
        $this->object->codIbge = new CodIbge;
        $this->object->facesClasseMedia = '';
        $this->object->latitude = '';
        $this->object->longitude = '';
        $this->object->nis = '';
        $this->object->rg = '';
        $this->object->servidorPublicoFederal = false;
        $this->object->houseHoldID = '';
        $this->object->houseHoldRenda = '';
        $this->object->houseHoldQtdPessoa = '';
        $this->object->representanteLegal = array(new RepresentanteLegal);
        $this->object->inibir = 1;
        $this->object->mensagem = '';
        
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }
    
    public function testToArray() {
        
        $array = $this->object->toArray();
        
        $this->assertInternalType('array', $array);
    }
    
    public function testFill() {
        $pfObject = new PessoaFisica;
        $pfObject->fill($this->object);
        $this->assertEquals('00090826892', $pfObject->cpf);
        $this->assertInternalType('array', $pfObject->sociosEmpresa);
        $this->assertInstanceOf('SerasaExperian\Models\SocioEmpresa', $pfObject->sociosEmpresa[0]);
        $this->assertInstanceOf('SerasaExperian\Models\SituacaoCadastralPessoaFisica', $pfObject->situacaoCadastral);
        $this->assertInstanceOf('SerasaExperian\Models\AtividadeConsumo', $pfObject->atividadeConsumo);
        $this->assertInstanceOf('SerasaExperian\Models\Ccf', $pfObject->ccf);
        $this->assertInstanceOf('SerasaExperian\Models\CodIbge', $pfObject->codIbge);
        $this->assertInternalType('array', $pfObject->representanteLegal);
        $this->assertInstanceOf('SerasaExperian\Models\RepresentanteLegal', $pfObject->representanteLegal[0]);
        
        $array = $this->object->toArray();
        $pfArray = new PessoaFisica;
        $pfArray->fill($array);
        $this->assertEquals('00090826892', $pfArray->cpf);
        $this->assertInternalType('array', $pfArray->sociosEmpresa);
        $this->assertInstanceOf('SerasaExperian\Models\SocioEmpresa', $pfArray->sociosEmpresa[0]);
        $this->assertInstanceOf('SerasaExperian\Models\SituacaoCadastralPessoaFisica', $pfArray->situacaoCadastral);
        $this->assertInstanceOf('SerasaExperian\Models\AtividadeConsumo', $pfArray->atividadeConsumo);
        $this->assertInstanceOf('SerasaExperian\Models\Ccf', $pfArray->ccf);
        $this->assertInstanceOf('SerasaExperian\Models\CodIbge', $pfArray->codIbge);
        $this->assertInternalType('array', $pfArray->representanteLegal);
        $this->assertInstanceOf('SerasaExperian\Models\RepresentanteLegal', $pfArray->representanteLegal[0]);
        
        $invalid = new PessoaFisica;
        try {
            $invalid->fill(false);
        } 
        catch (\Exception $ex) {
            $this->assertInstanceOf('SerasaExperian\Exceptions\InvalidTypeException', $ex);
            
        }
    }
    
    public function testClearNullProperties() {
        $this->object->afinidadeCartaoCredito = null;
        
        $array = $this->object->toArray();
        
        $this->assertArrayNotHasKey('afinidadeCartaoCredito', $array);
    }

}
