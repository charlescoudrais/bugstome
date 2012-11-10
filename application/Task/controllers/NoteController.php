<?php
class Task_NoteController extends Zend_Controller_Action
{
    public function noteAction()
    {
        $noteId = (int) $this->getRequest()->getParam('id');
        $taskId = (int) $this->getRequest()->getParam('tid');
        $this->view->noteId = $noteId;
        $this->view->taskId = $taskId;
        $this->view->pageTitle = $this->view->translate('NOTE_NOTE_TITLE');
        
    }
    
    public function listAction()
    {
        $this->view->pageTitle = $this->view->translate('NOTE_LIST_TITLE');
        
        $this->view->notes = array(
            1 => 'Note 1',
            2 => 'Note 2',
            3 => 'Note 3'
        );
    }
}