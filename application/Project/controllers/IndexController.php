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
        //$this->view->userRole = true;
        $projectId = (int) $this->getRequest()->getParam('id');
        $project = new Project_Model_Project();
        
        $form = new Project_Form_Project();
        
        if ($projectId !== 0) {
            // @TODO: set values
            $project->getProjectMapper()->find($projectId);
            
            $this->view->pageTitle = $this->view->translate(
                        'PROJECT'
                    ) . $projectId;
            $this->view->projectId = $projectId;
            $form->setDefault(
                        'inp_project_name',
                        $this->view->translate('PROJECT'). ' ' . $projectId
                    );
            $form->setDefault(
                        'sel_project_manager',
                        '1'
                    );
            $form->setDefault(
                        'tarea_project_description',
                        ''
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
                        'NEW_PROJECT_TITLE'
                    );
            //@TODO: get the last id +1
            $form->setDefault(
                        'inp_project_id',
                        '#' . $projectId
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