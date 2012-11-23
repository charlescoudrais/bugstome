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
        $project   = new Project_Model_Project();
        $form      = new Project_Form_Project();
        
        if ($projectId !== 0) :
            // @TODO: set values
            $endDate = new Zend_Date(array(
                'year'   => 2012,
                'month'  => 10,
                'day'    => 17,
                'hour'   => 16,
                'minute' => 24,
                'second' => 00
            ));
            $project->getProjectMapper()->find($projectId);
            
            $form->removeElement('submit_project_form');
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
            $form->setDefault(
                        'inp_project_end_datepicker',
                        $endDate
                    );
            
            foreach ($form->getElements() as $elem) {
                $elem->setAttrib('disabled', 'disabled');
            }
            
            $this->view->pageTitle = $this->view->translate(
                        'PROJECT'
                    ) . $projectId;
            $this->view->projectId = $projectId;
            
            
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
    
}