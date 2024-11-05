<?php

namespace SerasaExperian\Models;

final class Endereco extends Model {

    /**
     *
     * @var Logradouro
     */
    public $logradouro;
    
    /**
     *
     * @var string 
     */
    public $bairro;
    
    /**
     *
     * @var string
     */
    public $cidade;
    
    /**
     *
     * @var string
     */
    public $uf;
    
    /**
     *
     * @var string
     */
    public $cep;
    
}
