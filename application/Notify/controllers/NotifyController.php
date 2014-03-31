<?php
class Notify_NotifyController extends Zend_Controller_Action
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
        
        $project  = new Project_Model_Project();
        $projects = $project->getProjectMapper()->fetchAll();
        $task     = new Task_Model_Task();
        $tasks    = $task->getTaskMapper()->fetchAll();
        
        $this->view->projects = $projects;
        $this->view->tasks    = $tasks;
        
        $this->view->pageTitle = 'BUGS2ME | Notify | Index';
    }
    
    public function createAction()
    {
        $parent   = (string) $this->getRequest()->getParam('parent');
        $parentId = (int) $this->getRequest()->getParam('id');
        
        if ('task' === $parent) {
            
            
            
        } else if ('project' === $parent) {
            
            
            
        } else if ('0' === $parent)  {
        
            $parent = '... (choose a project or a task...)';
            
        } else {
            
            throw new Zend_Exception('Invalid notify\'s parent');
            
        }
        
        $this->view->pageTitle = 'BUGS2ME | Notify | create for '
                                . $parent . ' '
                                . '(id : ' . $parentId . ')';
    }
}
