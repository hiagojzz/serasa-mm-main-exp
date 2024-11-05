<?php

namespace SerasaExperian\Parameters;

final class ParametersInPF extends Parameter {
    
    /**
     *
     * @var string 
     */
    public $cpf;
    
    /**
     *
     * @var string 
     */
    public $id;
    
    /**
     *
     * @var string 
     */
    public $cnpjIndireto;
    
    /**
     *
     * @var RetornoPF 
     */
    public $RetornoPF;
    
    public function toArray() {
        $parameters = parent::toArray();
        
        return array('parameters' => $parameters);
    }
    
}
