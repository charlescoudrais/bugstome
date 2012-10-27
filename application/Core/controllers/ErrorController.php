<?php
class ErrorController extends Zend_Controller_Action
{
    /**
     * 
     */
    public function errorAction()
    {
        $this->view->pageTitle = "Error...";
    }
}