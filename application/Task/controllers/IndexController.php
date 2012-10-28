<?php
class Task_IndexController extends Zend_Controller_Action
{
    public function listAction()
    {
        $this->view->pageTitle = $this->view->translate('TASKS_TITLE');
    }
    
    public function taskAction()
    {
        $this->view->pageTitle = $this->view->translate('NEW_TASK_TITLE');
    }
}
