<?php
class Task_IndexController extends Zend_Controller_Action
{
    public function listAction()
    {
        $this->_initLayout();
        
        $tasks = array(
                1 => 'Task 1',
                2 => 'Task 2',
                3 => 'Task 3'
            );
        
        $this->view->tasks = $tasks;
        $this->view->pageTitle = $this->view->translate('TASKS_TITLE');
        
    }
    
    public function taskAction()
    {
        
        $this->_initLayout();
        
        $this->view->userRole = true;
        $taskId = (int) $this->getRequest()->getParam('id');
        $task = new Task_Model_Task();
        $form = new Task_Form_Task();
        
        $time1 = new Zend_Date();
        $time2 = new Zend_Date();
        $timeElapsed = $time1->compare($time2);
        
        if ($taskId !== 0) :
//            $time1 = new Zend_Date();
//            $time1->setDate(time()+86400, 'dd-mm-YY');
//            $time2 = new Zend_Date();
//            $time2->setDate(time(), 'dd-mm-YY');
//            $timeElapsed = $time1->compare($time2);
//            echo $time1;
//            echo $time2;
//            echo $timeElapsed;
            
            $notes = array(
                1 => 'Notes 1',
                2 => 'Notes 2',
                3 => 'Notes 3'
            );
            
            // @TODO: set values
            $task->getTaskMapper()->find($taskId);
            
            $form->setDefault(
                        'inp_task_name',
                        $this->view->translate('TASK') . ' '  . $taskId
                    );
            $form->setDefault(
                        'inp_task_project',
                        $this->view->translate('PROJECT') . ' NNN'
                    );
            $form->setDefault(
                        'inp_task_id',
                        '#' . $taskId
                    );
            $form->setDefault(
                        'sel_task_project',
                        '1'
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
                $elem->setAttrib('disabled', 'disabled');
            }
            
            $form->removeElement('submit_task_form');
            
            $this->view->pageTitle = $this->view->translate(
                        'TASK'
                    ) . $taskId;
            $this->view->notes     = $notes;
            
        else :
            
            //@TODO: get the last id +1
            $form->setDefault(
                        'inp_task_id',
                        '#' . $taskId
                    );
            $form->setDefault(
                        'inp_task_project',
                        ' NNN'
                    );
            
            $form->inp_task_id->setAttrib('readonly', '');
            $form->sel_task_project->setAttrib('readonly', '');
            $this->view->pageTitle = $this->view->translate(
                        'NEW_TASK_TITLE'
                    );
            
        endif;
        
        $form->setAction('')
             ->setMethod('post');
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getPost())) {

            }
        }
        
        $this->view->taskId   = $taskId;
        $this->view->formTask = $form;
        
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
