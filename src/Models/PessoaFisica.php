<?php

namespace SerasaExperian\Models;

final class PessoaFisica extends Pessoa {
    
    /**
     *
     * @var string 
     */
    public $cpf;
    
    /**
     *
     * @var string 
     */
    public $nome;
    
    /**
     *
     * @var DateTime 
     */
    public $dataNascimento;
    
    /**
     *
     * @var int 
     */
    public $idade;
    
    /**
     *
     * @var string
     */
    public $signo;
    
    /**
     *
     * @var string
     */
    public $sexo;
    
    /**
     *
     * @var string
     */
    public $nomeMae;
    
    /**
     *
     * @var SituacaoCadastralPessoaFisica 
     */
    public $situacaoCadastral;
    
    /**
     *
     * @var string
     */
    public $renda;
    
    /**
     *
     * @var string 
     */
    public $triagemRisco;
    
    /**
     *
     * @var AtividadeConsumo 
     */
    public $atividadeConsumo;
    
    /**
     *
     * @var SocioEmpresa[] 
     */
    public $sociosEmpresa;
    
    /**
     *
     * @var string 
     */
    public $profissao;
    
    /**
     *
     * @var string 
     */
    public $estadoCivil;
    
    /**
     *
     * @var string 
     */
    public $escolaridade;
    
    /**
     *
     * @var boolean 
     */
    public $bolsaFamilia;
    
    /**
     *
     * @var string 
     */
    public $mosaic;
    
    /**
     *
     * @var string 
     */
    public $classeSocial;
    
    /**
     *
     * @var boolean 
     */
    public $afinidadeCartaoCredito;
    
    /**
     *
     * @var boolean 
     */
    public $afinidadeCreditoPessoal;
    
    /**
     *
     * @var boolean 
     */
    public $afinidadeArtigosLuxo;
    
    /**
     *
     * @var boolean 
     */
    public $afinidadePacotesTurismo;
    
    /**
     *
     * @var boolean 
     */
    public $afinidadeCelularPosPago;
    
    /**
     *
     * @var boolean 
     */
    public $afinidadeImobiliario;
    
    /**
     *
     * @var boolean 
     */
    public $afinidadeTvAssinatura;
    
    /**
     *
     * @var boolean 
     */
    public $afinidadeBandaLarga;
    
    /**
     *
     * @var boolean 
     */
    public $afinidadeEcommerce;
    
    /**
     *
     * @var boolean 
     */
    public $afinidadeClientePremium;
    
    /**
     *
     * @var boolean 
     */
    public $afinidadeSmartphone;
    
    /**
     *
     * @var Ccf 
     */
    public $ccf;
    
    /**
     *
     * @var CodIbge 
     */
    public $codIbge;
    
    /**
     *
     * @var string 
     */
    public $facesClasseMedia;
    
    /**
     *
     * @var string 
     */
    public $latitude;
    
    /**
     *
     * @var string 
     */
    public $longitude;
    
    /**
     *
     * @var string 
     */
    public $nis;
    
    /**
     *
     * @var string
     */
    public $rg;
    
    /**
     *
     * @var boolean 
     */
    public $servidorPublicoFederal;
    
    /**
     *
     * @var string 
     */
    public $houseHoldID;
    
    /**
     *
     * @var string 
     */
    public $houseHoldRenda;
    
    /**
     *
     * @var string 
     */
    public $houseHoldQtdPessoa;
    
    /**
     *
     * @var RepresentanteLegal[] 
     */
    public $representanteLegal;
    
    /**
     *
     * @var int 
     */
    public $inibir;
    
    /**
     *
     * @var string
     */
    public $mensagem;
    
    protected function fillArray($data) {
        parent::fillArray($data);
        
        $this->fillSituacaoCadastral($data);
        $this->fillAtividadeConsumo($data);
        $this->fillSocioEmpresa($data);
        $this->fillCcf($data);
        $this->fillCodIbge($data);
        $this->fillRepresentanteLegal($data);
    }
    
    private function fillSituacaoCadastral($data) {
        $this->situacaoCadastral = new SituacaoCadastralPessoaFisica();
        
        if (empty($data['situacaoCadastral'])) {
            return;
        }
        
        $this->situacaoCadastral->fill($data['situacaoCadastral']);
    }
    
    private function fillAtividadeConsumo($data) {
        $this->atividadeConsumo = new AtividadeConsumo();
        
        if (empty($data['atividadeConsumo'])) {
            return;
        }
        
        $this->atividadeConsumo->fill($data['atividadeConsumo']);
    }
    
    private function fillSocioEmpresa($data) {
        $this->sociosEmpresa = array();
        
        if (empty($data['sociosEmpresa'])) {
            return;
        }
        
        foreach ($data['sociosEmpresa'] as $socio) {
            $sociosEmpresa = new SocioEmpresa();
            $sociosEmpresa->fill($socio);
            $this->sociosEmpresa[] = $sociosEmpresa;
        }
    }
    
    private function fillCcf() {
        $this->ccf = new Ccf();
        
        if (empty($data['ccf'])) {
            return;
        }
        
        $this->ccf->fill($data['ccf']);
    }
    
    private function fillCodIbge() {
        $this->codIbge = new CodIbge;
        
        if (empty($data['codIbge'])) {
            return;
        }
        
        $this->codIbge->fill($data['codIbge']);
    }
    
    private function fillRepresentanteLegal($data) {
        $this->representanteLegal = array();
        
        if (empty($data['representanteLegal'])) {
            return;
        }
        
        foreach ($data['representanteLegal'] as $representante) {
            $representanteLegal = new RepresentanteLegal();
            $representanteLegal->fill($representante);
            $this->representanteLegal[] = $representanteLegal;
        }
    }
}
