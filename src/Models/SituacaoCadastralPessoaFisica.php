<?php

namespace SerasaExperian\Models;


final class SituacaoCadastralPessoaFisica extends Model {
   
    /**
     *
     * @var string 
     */
    public $nome;
    
    /**
     *
     * @var string 
     */
    public $situacao;
    
    /**
     *
     * @var string
     */
    public $codigoControle;
    
    /**
     *
     * @var DateTime 
     */
    public $dataConsulta;
    
    /**
     *
     * @var FontePesquisadaEnum 
     */
    public $fontePesquisada;

            
}
