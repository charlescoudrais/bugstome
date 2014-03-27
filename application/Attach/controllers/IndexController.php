<?php
class Attach_IndexController extends Zend_Controller_Action
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
        
    }
}
