<?php

namespace ElemValidators\Validator;

class RecordExists extends AbstractRecord
{
    
    const ERROR_NO_RECORD_FOUND = 'noRecordFound';
    
    /**
     * @var array Message templates
     */
    protected $messageTemplates = array(
        self::ERROR_NO_RECORD_FOUND => "No record matching the input was found"
    );
    
    public function isValid($value)
    {
        $valid = true;
        $this->setValue($value);
        $result = $this->query($value);
        
        if ($result->total_items==0) {
            $valid = false;
            $this->error(self::ERROR_NO_RECORD_FOUND);
        }
        return $valid;
    }
}
