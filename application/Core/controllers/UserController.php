<?php
class UserController extends Zend_Controller_Action
{
    public function loginAction()
    {
        $this->view->formUser = new Zend_Form();
    }
    
    public function listAction()
    {
         $this->view->pageTitle = $this->view->translate('USERS_TITLE');
    }
    
    public function meAction()
    {
        $this->view->pageTitle = $this->view->translate('USER_MY_TITLE');
    }
    
    public function userAction()
    {
        $this->view->pageTitle = $this->view->translate('USER_TITLE');
    }
}
