<?php
class UserController extends Zend_Controller_Action
{
    public function loginAction()
    {
        $this->view->pageTitle = $this->view->translate('LOGIN_TITLE');
        $formLogin = new Core_Form_Login();
        $formLogin->setAction('')->setMethod('post');
       
        if ($this->getRequest()->isPost()) {
            if ($formLogin->isValid($this->getRequest()->getPost())) {
                $userService = new Core_Service_UserApi();
                
                if ($userService->authenticate(
                        $formLogin->getValue('username'), 
                        $formLogin->getValue('password'))
                    ) {
                    $this->_redirect($this->view->url(array(), 'index'));
                }
            }
        }
        
        $formLogin->reset();
        $this->view->formLogin = $formLogin;
        
    }
    
    public function logoutAction()
    {
        $userService = new Core_Service_UserApi();
        $userService->clearIdentity();
        $this->_redirect($this->view->url(array(), 'userLogin'));
    }
    
    public function listAction()
    {
        $user                  = new Core_Model_User();
        $userService           = new Core_Service_UserApi();
        $this->view->users     = $userService->fetchUsers();
        $this->view->pageTitle = $this->view->translate('USERS_TITLE');
    }
    
    public function meAction()
    {
        $auth                  = Zend_Auth::getInstance();
        $user                  = new Core_Model_User();
        $userService           = new Core_Service_UserApi();
        $this->view->pageTitle = $this->view->translate('USER_MY_TITLE');
        $this->view->mySession = $auth->getStorage()->read($user);
        $this->view->me        = $userService->findById($this->view->mySession);
    }
    
    public function userAction()
    {
        $this->view->pageTitle = $this->view->translate('USER_TITLE');
    }
}
