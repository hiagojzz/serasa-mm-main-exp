<?php

namespace SerasaExperian;

interface IData {
    
    public function toArray();
    public function fill($data);
    public function clearNullProperties();
    
}
