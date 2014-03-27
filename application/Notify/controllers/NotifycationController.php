<?php
class Notify_NotificationController extends Zend_Controller_Action
{
    private $user;
    
    public function init()
    {
        $auth       = Zend_Auth::getInstance();
        $user       = new Core_Model_User();
        
        $this->user = $auth->getStorage()->read($user);
    }
    
    public function indexAction()
    {
        $this->view->pageTitle = 'BUGS2ME | Notification | Index';
    }
}
