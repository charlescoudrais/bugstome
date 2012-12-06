<?php
class Task_IndexController extends Zend_Controller_Action
{
    public function listAction()
    {
        $this->_initLayout();
        $project  = new Project_Model_Project();
        $projects = $project->getProjectMapper()->fetchAll();
        
        $tasks = array(
                1 => 'Task 1',
                2 => 'Task 2',
                3 => 'Task 3'
            );
        
        $this->view->tasks = $tasks;
        $this->view->projects = $projects;
        $this->view->pageTitle = $this->view->translate('TASKS_TITLE');
//        $this->view->projectId = $hisProject;
        
    }
    
    public function taskAction()
    {
        $auth = Zend_Auth::getInstance();
        $user = new Core_Model_User();
        
        $this->_initLayout();
        
        $taskId        = (int) $this->getRequest()->getParam('id');
        $taskProjectId = (int) $this->getRequest()->getParam('pid');
        $task          = new Task_Model_Task();
        $form          = new Task_Form_Task();
        
        $time1         = new Zend_Date();
        $time2         = new Zend_Date();
        $timeElapsed   = $time1->compare($time2);
        $lastInsertId = $task->getTaskMapper()->lastInsertId();
        
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
            $project     = new Project_Model_Project();
            $hisProject = (int) $this->getRequest()->getParam('pid');
            $thisProject = $project->getProjectMapper()->find($hisProject);
            $startDate   = new Zend_Date();
            $endDate     = new Zend_Date(
                                $thisProject->getProjectEnd()
                            );
            
            // @TODO: set values
            $task->getTaskMapper()->find($taskId);
            
            $form->setDefault(
                        'inp_task_name',
                        $this->view->translate('TASK') . ' '  . $taskId
                    );
            $form->setDefault(
                        'sel_task_project',
                        $hisProject - 1
                    );
            $form->setDefault(
                        'inp_task_id',
                        '#' . $taskId
                    );
//            $form->setDefault(
//                        'sel_task_project',
//                        $taskProjectId - 1
//                    );
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
            
            $this->view->userRole  = $auth->getStorage()
                                          ->read($user)
                                          ->getRole()
                                          ->getId();
            $this->view->pageTitle = $this->view->translate(
                        'TASK'
                    ) . $taskId;
            $this->view->notes     = $notes;
            
        else :
            
            $project     = new Project_Model_Project();
            $hisProject = (int) $this->getRequest()->getParam('pid');
            $thisProject = $project->getProjectMapper()->lastInsertId();
            $startDate   = new Zend_Date();
            $endDate     = new Zend_Date();
            
            //@TODO: get the last id +1
            $form->setDefault(
                        'inp_task_id',
                        '#' . $lastInsertId
                    );
            $form->setDefault(
                        'sel_task_project',
                        $hisProject
                    );
            $form->setDefault(
                        'inp_task_start_datepicker',
                        $startDate->toString('dd-MM-Y H:m:s')
                    );
//            $form->setDefault(
//                        'inp_task_end_datepicker',
//                        $endDate->toString('dd-MM-Y H:m:s')
//                    );
            $form->getElement('inp_task_start_datepicker')
                 ->setAttribs(
                            array(
                                'disabled' => 'disabled',
                                'class'=> null
                            )
                         );
            $form->getElement('inp_task_end_datepicker')
                 ->setAttribs(
                            array(
                                'disabled' => 'disabled',
                                'class'=> null
                            )
                         );
            $form->inp_task_id->setAttrib('readonly', '');
//            $form->sel_task_project->setAttrib('disabled', 'disabled');
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
        
        $this->view->taskId    = $taskId;
        //$this->view->projectId = $hisProject;
        $this->view->formTask  = $form;
        
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
