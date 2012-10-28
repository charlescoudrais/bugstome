<?php
class Task_TaskController extends Zend_Controller_Action
{
    public function tasksAction()
    {
        $this->view->pageTitle = $this->view->translate('TASKS_TITLE');
    }
}