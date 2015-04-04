<?php

namespace ElemValidators\Validator;

class NoRecordExists extends AbstractRecord
{
    
    const ERROR_RECORD_FOUND    = 'recordFound';
    
    /**
     * @var array Message templates
     */
    protected $messageTemplates = array(
        self::ERROR_RECORD_FOUND    => "A record matching the input was found"
    );    
    
    public function isValid($value)
    {
        $valid = true;
        $this->setValue($value);
        $result = $this->query($value);
        if ($result->total_items!=0) {
            $valid = false;
            $this->error(self::ERROR_RECORD_FOUND);
        }

        return $valid;
    }
}
