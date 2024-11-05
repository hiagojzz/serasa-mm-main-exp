<?php

namespace SerasaExperian\Models;

abstract class Pessoa extends Model {
    
    /**
     *
     * @var string
     */
    public $id;
    
    /**
     *
     * @var Endereco[]
     */
    public $enderecos;
    
    /**
     *
     * @var Telefone[]
     */
    public $telefones;
    
    protected function fillArray($data) {
        parent::fillArray($data);
        
        $this->fillEnderecos($data);
        $this->fillTelefones($data);
    }
    
    private function fillEnderecos($data) {
        $this->enderecos = array();
        
        if (empty($data['enderecos'])) {
            return;
        }
        
        foreach ($data['enderecos'] as $endereco) {
            $end = new Endereco();
            $end->fill($endereco);
            $this->enderecos[] = $end;
        }
    }
    
    private function fillTelefones($data) {
        $this->telefones = array();
        
        if (empty($data['telefones'])) {
            return;
        }
        
        foreach ($data['telefones'] as $telefone) {
            $tel = new Telefone();
            $tel->fill($telefone);
            $this->telefones[] = $tel;
        }
    }
    
}
