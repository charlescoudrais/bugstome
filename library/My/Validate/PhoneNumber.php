<?php 


class My_Validate_PhoneNumber extends Zend_Validate_Abstract
{
    const NOT_PHONENUMBER   = 'notPhoneNumber';
    const STRING_EMPTY      = 'phoneNumberStringEmpty';
    const INVALID           = 'phoneNumberInvalid';
    
    /**
     * Validation failure message template definitions
     *
     * @var array
     */
    protected $_messageTemplates = array(
        self::NOT_PHONENUMBER   => "'%value%' must be a valid phone number",
        self::STRING_EMPTY      => "'%value%' is an empty string",
        self::INVALID           => "Invalid type given",
    );
    
/**
     * Defined by Zend_Validate_Interface
     *
     * Returns true if and only if $value is a valid phone number
     *
     * @param  string $value
     * @return boolean
     */
    public function isValid($value)
    {
        if (!is_string($value) && !is_int($value)) {
            $this->_error(self::INVALID);
            return false;
        }

        $this->_setValue((string) $value);

        if ('' === $this->_value) {
            $this->_error(self::STRING_EMPTY);
            return false;
        }

        // Validation
        $this->_value = str_replace('+33', '0', $this->_value);
        $this->_value = str_replace('-', '', $this->_value);
        $this->_value = str_replace('.', '', $this->_value);
        $this->_value = str_replace(' ', '', $this->_value);
        $this->_value = str_replace('/', '', $this->_value);
        
        $pattern = '/^0[1-9][0-9]{8}$/';
        
        if(false === ((bool) preg_match($pattern, $this->_value))) {
            $this->_error(self::NOT_PHONENUMBER);
            return false;
        }

        return true;
    }
}


