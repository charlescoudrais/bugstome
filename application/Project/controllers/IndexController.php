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
        $form = new Project_Form_Project();
        $form->setAction('')
             ->setMethod('post');
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getPost())) {

            }
        }
        
        
        $this->view->pageTitle   = $this->view->translate('PROJECTS_TITLE');
        $this->view->formProject = $form;
    }
    
}