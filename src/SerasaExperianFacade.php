<?php

namespace SerasaExperian;

use SerasaExperian\Parameters\ParametersInPF;
use SerasaExperian\Responses\ConsultarPFResponse;
use SerasaExperian\Models\PessoaFisica;

use SerasaExperian\Exceptions\DataLicensingFault;

final class SerasaExperianFacade {
    
    public function __construct($username, $password, $homologacao = false) {
        SerasaExperianProxy::setHomologacao($homologacao);
                
        SerasaExperianProxy::getInstance()
                ->setCredentials($username, $password);
    }
    
    /**
     * 
     * @param ParametersInPF $parameters
     * @return ConsultarPFResponse
     */
    public function consultarPessoaFisica(ParametersInPF $parameters) {
        $proxy = SerasaExperianProxy::getInstance();
        
        $arguments = $parameters->toArray();
        
        try {
            $data = $proxy->getClient()->ConsultarPF($arguments);
        } 
        catch (\SoapFault $ex) {
            throw new DataLicensingFault($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }
        catch (\Exception $ex) {
            throw new DataLicensingFault($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
        }

        $result = new PessoaFisica;
        $result->fill($data->result);
        
        $response = new ConsultarPFResponse;
        $response->setResult($result);
        
        return $response;
    }
    
}