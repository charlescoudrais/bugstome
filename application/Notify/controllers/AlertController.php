<?php
class Notify_AlertController extends Zend_Controller_Action
{
    /**
     *
     * @var Core_Model_User
     */
    private $user;
    
    public function init()
    {
        $auth       = Zend_Auth::getInstance();
        $user       = new Core_Model_User();
        
        $this->user = $auth->getStorage()->read($user);
    }
    
    public function indexAction()
    {
        $this->view->pageTitle = 'BUGS2ME | Alert | index';
    }
    
    public function showAction()
    {
        $this->view->pageTitle = 'BUGS2ME | Alert | show';
    }
    
    public function createAction()
    {
        $parent   = (string) $this->getRequest()->getParam('parent');
        $parentId = (int) $this->getRequest()->getParam('id');
        
        if ('task' === $parent) {
            
            
            
        } else if ('project' === $parent) {
            
            
            
        } else {
            
            throw new Zend_Exception('Invalid alert\'s parent');
            
        }
        
        $this->view->pageTitle = 'BUGS2ME | Alert | create for '
                                . $parent . ' '
                                . '(id : ' . $parentId . ')';
    }
    
    public function alertAction()
    {
        $taskId  = (int) $this->getRequest()->getParam('taskId');
        
        $this->view->pageTitle = 'BUGS2ME | Alert | ';
    }
}
