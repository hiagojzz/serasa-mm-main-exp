<?php

namespace SerasaExperian\Responses;

abstract class Response implements IResponse {
    
    public function setResult($result) {
        $this->result = $result;
    }
    
    public function getResult() {
        return $this->result;
    }
    
}