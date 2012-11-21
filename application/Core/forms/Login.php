<?php
class Core_Form_Login extends Zend_Form
{
    public function init()
    {
        
        $username = new Zend_Form_Element_Text('username');
        $username->setRequired(true)
                ->addFilter(
                    new Zend_Filter_StripTags()
                )
                ->addValidator(
                    new Zend_Validate_StringLength(
                        array('min' => 3, 'max' => 20)
                    )                  
                );
        $password = new Zend_Form_Element_Password('password');
        $password->setRequired(true)
                ->addValidator(
                    new Zend_Validate_StringLength(
                        array('min' => 3, 'max' => 40)
                    )                  
                );
        
        $submit = new Zend_Form_Element_Submit('doLogin');
        
        $this->addElement($username);
        $this->addElement($password);
        $this->addElement($submit);
        
    }
}
