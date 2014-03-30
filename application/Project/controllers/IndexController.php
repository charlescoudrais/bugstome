<?php
class Project_IndexController extends Zend_Controller_Action
{
    /**
     *
     * @var Core_Model_User
     */
    private $user;
    
    /**
     *
     * @var array
     */
    private $users = array();
    
    /**
     *
     * @var int
     */
    private $projectId;
    /**
     *
     * @var array
     */
    private $projects = array();
    
    /**
     *
     * @var array
     */
    private $tasks = array();
    
    /**
     * Initialize the controller
     * and its parent
     */
    public function init()
    {
        parent::init();
        
        $auth            = Zend_Auth::getInstance();
        $user            = new Core_Model_User();
        
        $this->user      = $auth->getStorage()->read($user);
        $this->projectId = ($this->getRequest()->getParam('id')) 
                            ? (int) $this->getRequest()->getParam('id')
                            : null;
        $this->users     = $this->_initUsers();
        $this->projects  = $this->_initProjects();
        $this->tasks     = $this->_initTasks($this->projectId);
        
        $this->_initLayout();
    }
    
    
    public function listAction()
    {
        $project               = new Project_Model_Project(); 
        $projects              = array();
        $projectCollection     = $project->getProjectMapper()->fetchAll();
        $this->view->pageTitle = $this->view->translate('PROJECTS_TITLE');
        $this->view->projects  = $this->projects;
    }
    
    
    public function projectAction()
    {
        $auth         = Zend_Auth::getInstance();
        $project      = new Project_Model_Project();
        $form         = new Project_Form_Project();
        $usersOptions = array();
        
        foreach ($this->users as $user) {
            $usersOptions[$user->getId()] = $user->getName();
        }
        
        $form->sel_project_manager->setMultiOptions($usersOptions);
        
        if ($this->projectId != 0) :
            
            $thisProject = $project->getProjectMapper()->find($this->projectId);
            
            $form->removeElement('submit_project_form');
            $form->setDefault(
                        'hid_project_id',
                        $thisProject->getProjectId()
                    );
            $form->setDefault(
                        'inp_project_name',
                        utf8_encode($thisProject->getProjectTitle())
                    );
            $form->setDefault(
                        'sel_project_manager',
                        $thisProject->getProjectUser()->getId()
                    );
            $form->setDefault(
                        'tarea_project_description',
                        utf8_encode($thisProject->getProjectDescription())
                    );
            $form->setDefault(
                        'inp_project_start_datepicker',
                        $thisProject->getProjectStart()
                                    ->toString('dd-MM-Y H:m:s')
                    );
            $form->getElement('inp_project_end_datepicker')
                    ->setAttrib('class', null);
            
            $form->setDefault(
                        'inp_project_end_datepicker',
                        $thisProject->getProjectEnd()
                                    ->toString('dd-MM-Y H:m:s')
                    );
            
            
            foreach ($form->getElements() as $elem) {
                $elem->setAttrib('disabled', 'disabled' );
            }
            
            $this->view->pageTitle = $thisProject->getProjectTitle()
                                        . ' ( #' . $thisProject->getProjectId()
                                        . ' )';
            $this->view->projectId = $this->projectId;
            $this->view->tasks     = $this->tasks;
        
        else :
            
            $this->view->pageTitle = 'NO ID';
            
        endif;
        
        $form->setAction('')->setMethod('post');
        
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getPost())) {
                
            }
        }
        
        $this->view->userRole    = $this->user->getRole()->getId();
        $this->view->projectId   = $this->projectId;
        $this->view->formProject = $form;
        
    }
    
    
    public function modifyAction()
    {
        $project      = new Project_Model_Project();
        $form         = new Project_Form_Project();
        $thisProject  = $project->getProjectMapper()->find($this->projectId);
        $usersOptions = array();
        
        foreach ($this->users as $user) {
            $usersOptions[$user->getId()] = $user->getName();
        }
        
        $form->sel_project_manager->setMultiOptions($usersOptions);
        
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
                    $this->getProjectUser()->getId()
                );
        $form->setDefault(
                    'tarea_project_description',
                    $thisProject->getProjectDescription()
                );
        $form->setDefault(
                    'inp_project_start_datepicker',
                    $thisProject->getProjectStart()->toString('dd-MM-Y H:m:s')
                );
        $form->getElement('inp_project_start_datepicker')
             ->setAttrib('disabled', 'disabled');
        
        $form->setDefault(
                    'inp_project_end_datepicker',
                    $thisProject->getProjectEnd()->toString('dd-MM-Y H:m:s')
                );
        
        $this->view->pageTitle   = $thisProject->getProjectTitle()
                                    . ' ( #' . $thisProject->getProjectId()
                                    . ' )';
        $this->view->projectId   = $this->projectId;
        $this->view->formProject = $form;
    }
    
    
    public function createAction()
    {
        $project      = new Project_Model_Project();
        $task         = new Task_Model_Task();
        $form         = new Project_Form_Project();
        $lastInsertId = $project->getProjectMapper()->lastInsertId();
        $usersOptions = array();
        foreach ($this->users as $user) {
            $usersOptions[$user->getId()] = $user->getName();
        }
        $creationDate = new Zend_Date();
        
        $form->sel_project_manager->setMultiOptions($usersOptions);
        
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
    
    private function _initUsers()
    {
        $user           = new Core_Model_User();
        $userCollection = $user->getMapper()->fetchAll();
        
        return $userCollection;
    }
    
    private function _initProjects()
    {
        $project             = new Project_Model_Project();
        $projectCollection   = $project->getProjectMapper()
                                       ->fetchAll("user_id = " . $this->user->getId());
        
        return $projectCollection;
    }
    
    private function _initTasks($projectId = null)
    {
        $sql = (NULL !== $projectId) ? "project_id = ". $projectId : "1 = 1";
        $task           = new Task_Model_Task();
        $taskCollection = $task->getTaskMapper()->fetchAll($sql);
//        var_dump($taskCollection);
        return $taskCollection;
    }
    
}