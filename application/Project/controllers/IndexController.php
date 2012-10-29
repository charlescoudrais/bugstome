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
        
        if ($projectId !== 0) {
            // @TODO: set values
            $project->getProjectMapper()->find($projectId);
            $this->view->pageTitle = $this->view->translate(
                        'PROJECT'
                    ) . $projectId;
        } else {
            $this->view->pageTitle = $this->view->translate(
                        'NEW_PROJECT_TITLE'
                    );
        }
        
        $form = new Project_Form_Project();
        
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