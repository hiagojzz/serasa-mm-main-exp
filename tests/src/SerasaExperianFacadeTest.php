<?php

namespace SerasaExperian\Tests;

use PHPUnit\Framework\TestCase;
use SerasaExperian\SerasaExperianFacade;
use SerasaExperian\SerasaExperianProxy;
use SerasaExperian\Parameters\ParametersInPF;
use SerasaExperian\Parameters\RetornoPF;

class SerasaExperianFacadeTest extends TestCase {

    /**
     * @var SerasaExperianFacade
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $username = '';
        $password = '';
        $this->object = new SerasaExperianFacade($username, $password, true);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers SerasaExperian\SerasaExperianFacade::consultarPessoaFisica
     * @todo   Implement testConsultarPessoaFisica().
     */
    public function testConsultarPessoaFisica() {
        $parameters = new ParametersInPF;

        $retorno = new RetornoPF();
        $retorno->cpf = true;
        $retorno->nome = true;
        $retorno->endereco = true;
        $retorno->dataNascimento = true;


        $parameters->cpf = '00090826892';
        $parameters->RetornoPF = $retorno;
        
        try {
            $response = $this->object->consultarPessoaFisica($parameters);
            $this->assertInstanceOf('SerasaExperian\Responses\ConsultarPFResponse', $response);
        } 
        catch (\Exception $ex) {
            $this->assertInstanceOf('SerasaExperian\Exceptions\DataLicensingFault', $ex);
        }
        
    }

}
