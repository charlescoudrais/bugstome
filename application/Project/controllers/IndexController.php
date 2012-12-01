<?php
class Project_IndexController extends Zend_Controller_Action
{
    public function listAction()
    {
        $this->_initLayout();
        
        $project               = new Project_Model_Project(); 
        $projects              = array();
        $projectCollection     = $project->getProjectMapper()->fetchAll();
//        $projects              = $project->getProjectMapper()
//                                         ->objectToRow($projectCollection);
        
        $this->view->pageTitle = $this->view->translate('PROJECTS_TITLE');
        $this->view->projects  = $projectCollection;
    }
    
    public function projectAction()
    {
        $this->_initLayout();
        
        //$this->view->userRole = true;
        $projectId    = (int) $this->getRequest()->getParam('id');
        $project      = new Project_Model_Project();
        $task         = new Task_Model_Task();
        $form         = new Project_Form_Project();
        $lastInsertId = $project->getProjectMapper()->lastInsertId();
        
        if ($projectId !== 0) :
            
            $thisProject = $project->getProjectMapper()->find($projectId);
            $tasks       = $task->getTaskMapper()->fetchAll();
            
            $startDate = new Zend_Date(
                        $thisProject->getProjectStart()
                    );
            $endDate = new Zend_Date(
                        $thisProject->getProjectEnd()
                    );
            
            $form->removeElement('submit_project_form');
            $form->setDefault(
                        'hid_project_id',
                        $thisProject->getProjectId()
                    );
            $form->setDefault(
                        'inp_project_name',
                        $thisProject->getProjectTitle()
                    );
            $form->setDefault(
                        'sel_project_manager',
                        '1'
                    );
            $form->setDefault(
                        'tarea_project_description',
                        $thisProject->getProjectDescription()
                    );
            $form->setDefault(
                        'inp_project_start_datepicker',
                        $startDate->toString('dd-MM-Y H:m:s')
                        //$startDate->getTimestamp()
                    );
            $form->getElement('inp_project_end_datepicker')
                    ->setAttrib('class', null);
            $form->setDefault(
                        'inp_project_end_datepicker',
                        $endDate->toString('dd-MM-Y H:m:s')
                    );
            
            
            foreach ($form->getElements() as $elem) {
                $elem->setAttrib('disabled', 'disabled' );
            }
            
            $this->view->pageTitle = $thisProject->getProjectTitle()
                                        . ' ( #' . $thisProject->getProjectId()
                                        . ' )';
            $this->view->projectId = $projectId;
            $this->view->tasks     = $tasks;
        
        else :
            
            $creationDate = new Zend_Date();
        
            $form->setDefault(
                        'hid_project_id',
                        $lastInsertId
                    );
            $form->setDefault(
                        'inp_project_start_datepicker',
                        $creationDate->toString('dd-MM-Y H:m:s')
                    );
            $form->getElement('inp_project_start_datepicker')
                 ->setAttrib('disabled', 'disabled');
            
            $this->view->pageTitle = $this->view->translate('NEW_PROJECT_TITLE')
                                        . ' ( #' . $lastInsertId . ' )';
            
        endif;
        
        $form->setAction('')->setMethod('post');
        
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getPost())) {
                
            }
        }
        
        $this->view->projectId   = $projectId;
        $this->view->formProject = $form;
        
    }
    
    private function _initLayout($path = null)
    {
        if ($path === NULL) {
            $path = ROOT_PATH . DIRECTORY_SEPARATOR
                    . 'application' . DIRECTORY_SEPARATOR
                    . 'Project' . DIRECTORY_SEPARATOR
                    . 'views' . DIRECTORY_SEPARATOR
                    . 'layouts';
        }
        
        $this->_helper->layout()
                      ->setLayoutPath($path)
                      ->setLayout('layout');
        
        return TRUE;
    }
    
}