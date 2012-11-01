<?php
class Project_IndexController extends Zend_Controller_Action
{
    public function listAction()
    {
        $this->view->pageTitle   = $this->view->translate('PROJECTS_TITLE');
        
        $this->view->projects = array(
            1 => 'Project 1',
            2 => 'Project 2',
            3 => 'Project 3'
        );
    }
    
    public function projectAction()
    {
        $projectId = (int) $this->getRequest()->getParam('id');
        $project = new Project_Model_Project();
        
        $form = new Project_Form_Project();
        
        if ($projectId !== 0) {
            // @TODO: set values
            $project->getProjectMapper()->find($projectId);
            $this->view->pageTitle = $this->view->translate(
                        'PROJECT'
                    ) . $projectId;
            $this->view->pId = $projectId;
            $form->setDefault(
                        'inp_project_name',
                        'Projet ' . $projectId
                    );
            $form->setDefault(
                        'sel_project_manager',
                        '1'
                    );
            $form->setDefault(
                        'tarea_project_description',
                        ''
                    );
            
            
        } else {
            $this->view->pageTitle = $this->view->translate(
                        'NEW_PROJECT_TITLE'
                    );
        }
        
        $form->setAction('')
             ->setMethod('post');
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getPost())) {

            }
        }
        
        $this->view->projectId = $projectId;
        $this->view->formProject = $form;
    }
    
}