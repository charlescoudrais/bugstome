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
        $projectId = (int) $this->getRequest()->getParam('id');
        $project   = new Project_Model_Project();
        $form      = new Project_Form_Project();
        
        if ($projectId !== 0) :
            // @TODO: set values
//            $thisProject = new Project_Model_Project;
            $thisProject = $project->getProjectMapper()->find($projectId);
            $endDate = new Zend_Date(array(
                'year'   => 2012,
                'month'  => 10,
                'day'    => 17,
                'hour'   => 16,
                'minute' => 24,
                'second' => 00
            ));
            $tasks = array(
                1 => 'Task 1',
                2 => 'Task 2',
                3 => 'Task 3'
            );
            
            $form->removeElement('submit_project_form');
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
                        'inp_project_end_datepicker',
                        $thisProject->getProjectEnd()
                    );
            
            foreach ($form->getElements() as $elem) {
                $elem->setAttrib('disabled', 'disabled');
            }
            
            $this->view->pageTitle = '#' . $thisProject->getProjectId() 
                                      . ' - ' . $thisProject->getProjectTitle();
            $this->view->projectId = $projectId;
            $this->view->tasks     = $tasks;
        
        else :
            
            //@TODO: get the last id +1
            $form->setDefault(
                        'inp_project_id',
                        '#' . $projectId
                    );
            
            $this->view->pageTitle = $this->view->translate(
                        'NEW_PROJECT_TITLE'
                    );
            
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