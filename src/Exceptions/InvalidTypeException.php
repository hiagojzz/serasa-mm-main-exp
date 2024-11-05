<?php

namespace SerasaExperian\Exceptions;

final class InvalidTypeException extends \Exception {
    
    public function __construct($message = "Variável de tipo inválido", $code = 0, $previous = null) {
        parent::__construct($message, $code, $previous);
    }
    
}