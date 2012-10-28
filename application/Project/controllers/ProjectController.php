<?php
class Project_ProjectController extends Zend_Controller_Action
{
    public function indexAction()
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
