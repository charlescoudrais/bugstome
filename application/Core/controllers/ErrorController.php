<?php
class ErrorController extends Zend_Controller_Action
{
    public function errorAction()
    {
        $this->view->pageTitle = "Error";
        //*
        $errorHandler = $this->_getParam('error_handler');
        
        switch ($errorHandler->type) {
            
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER :
                echo 'EXCEPTION_NO_CONTROLLER<br />';
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION :
                echo 'EXCEPTION_NO_ACTION<br />';
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ROUTE :
                echo 'EXCEPTION_NO_ROUTE<br />';
//                $this->view->message = 'Erreur 404';
//                $this->getResponse()->setHttpResponseCode(404);
//                break;
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_OTHER :
                echo 'EXCEPTION_OTHER<br />';
            default :
//                $this->view->message = 'Erreur 500';
//                $this->getResponse()->setHttpResponseCode(500);
                echo '<pre>';
                    echo 'HTTP Response Code : ';
                    echo $this->getResponse()->getHttpResponseCode() . PHP_EOL;
                    echo 'Headers :' . PHP_EOL;
                        print_r($this->getResponse()->getHeaders());
                    echo 'Exception :' . PHP_EOL;
                    print_r($this->getResponse()->getException()) . PHP_EOL;
                echo '</pre>';
            break;
        
        }
        
        $this->view->messageDev = $errorHandler->exception->getMessage();
        $this->view->trace = $errorHandler->exception->getTraceAsString();
        
        // */
    }
    
    public function persoAction()
    {
        $this->view->pageTitle = "Error NNN";
    }
}