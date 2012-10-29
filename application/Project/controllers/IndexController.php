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
        $userId = (int) $this->getRequest()->getParam('id');
        $project = new Project_Model_Project($userId);
        $form = new Project_Form_Project();
        
        $form->setAction('')
             ->setMethod('post');
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getPost())) {

            }
        }
        
        if ($userId !== 0) {
            // @TODO: set values
        }
        
        $this->view->pageTitle   = $this->view->translate('NEW_PROJECT_TITLE');
        $this->view->userId = $userId;
        $this->view->formProject = $form;
    }
    
}