<?php
class ErrorController extends Zend_Controller_Action
{
    public function errorAction()
    {
        $this->view->pageTitle = "Undefined Error";
    }
    
    public function persoAction()
    {
        $this->view->pageTitle = "Error NNN";
    }
}