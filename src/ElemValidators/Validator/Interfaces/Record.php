<?php

namespace ElemValidators\Validator\Interfaces;

interface Record
{
    public function findByFilters(array $filters);
    
    public function enableFilters($filters);
}
