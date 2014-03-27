<?php
class Task_NoteController extends Zend_Controller_Action
{
    /**
     *
     * @var Core_Model_User
     */
    private $user;
    
    private $notes = array(
        1 => 'Note 1',
        2 => 'Note 2',
        3 => 'Note 3'
    );
    private $tasks = array(
        1 => 'Task 1',
        2 => 'Task 2',
        3 => 'Task 3'
    );
    
    public function noteAction()
    {
        $this->_initLayout();
        
        $auth                  = Zend_Auth::getInstance();
        $user                  = new Core_Model_User();
        $noteId                = (int) $this->getRequest()->getParam('id');
        $taskId                = (int) $this->getRequest()->getParam('tid');
        
        $this->user            = $auth->getStorage()->read($user);
        $this->view->noteId    = $noteId;
        $this->view->taskId    = $taskId;
        $this->view->pageTitle = $this->view->translate('NOTE_NOTE_TITLE');
        
        if ($taskId === 0) {
            $this->view->tasks = $this->tasks;
        }
        
    }
    
    public function listAction()
    {
        $this->_initLayout();
        
        $this->view->pageTitle = $this->view->translate('NOTE_LIST_TITLE');
        
        $this->view->notes = $this->notes;
    }
    
    private function _initLayout($path = null)
    {
        if ($path === NULL) {
            $path = ROOT_PATH . DIRECTORY_SEPARATOR
                    . 'application' . DIRECTORY_SEPARATOR
                    . 'Task' . DIRECTORY_SEPARATOR
                    . 'views' . DIRECTORY_SEPARATOR
                    . 'layouts';
        }
        
        $this->_helper->layout()
                      ->setLayoutPath($path)
                      ->setLayout('layout');
        
        return TRUE;
    }
}