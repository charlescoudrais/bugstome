<?php
class Task_IndexController extends Zend_Controller_Action
{
    public function listAction()
    {
        $this->view->pageTitle = $this->view->translate('TASKS_TITLE');
        
        $this->view->tasks = array(
            1 => 'Task 1',
            2 => 'Task 2',
            3 => 'Task 3'
        );
    }
    
    public function taskAction()
    {
//        $this->view->userRole = true;
        $taskId = (int) $this->getRequest()->getParam('id');
        $task = new Task_Model_Task();
        
        $form = new Task_Form_Task();
        
        if ($taskId !== 0) {
            // @TODO: set values
            $task->getTaskMapper()->find($taskId);
            $this->view->pageTitle = $this->view->translate(
                        'TASK'
                    ) . $taskId;
            $form->setDefault(
                        'inp_task_name',
                        $this->view->translate('TASK') . ' '  . $taskId
                    );
            $form->setDefault(
                        'hid_task_id',
                        $taskId
                    );
            $form->setDefault(
                        'sel_task_manager',
                        '1'
                    );
//            $form->setDefault(
//                        'tarea_task_description',
//                        ''
//                    );
            foreach ($form->getElements() as $elem) {
                $elem->setAttrib('disabled','disabled');
            }
        } else {
            $this->view->pageTitle = $this->view->translate(
                        'NEW_TASK_TITLE'
                    );
            //@TODO: get the last id +1 
        }
        
        $form->setAction('')
             ->setMethod('post');
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getPost())) {

            }
        }
        
        $this->view->taskId = $taskId;
        $this->view->formTask = $form;
        
    }
    
    public function noteAction()
    {
        $taskId = (int) $this->getRequest()->getParam('id');
        $taskNb = (int) $this->getRequest()->getParam('nb');
        $this->view->taskId = $taskId;
        $this->view->taskNb = $taskNb;
        $this->view->pageTitle = $this->view->translate(
                        'TASK'
                    ) . ' ' . $taskId . ', ' . 'Note' . ' ' . $taskNb;
    }
}
