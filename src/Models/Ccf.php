<?php

namespace SerasaExperian\Models;

final class Ccf extends Model {
    
    /**
     *
     * @var CcfOcorrencia
     */
    public $ocorrencia;
    
    protected function fillArray($data) {
        $this->ocorrencia = new CcfOcorrencia();
        $this->ocorrencia->fillArray($data);
    }
    
}
