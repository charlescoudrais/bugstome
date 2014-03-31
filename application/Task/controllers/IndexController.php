    <?php
class Task_IndexController extends Zend_Controller_Action
{
    /**
     *
     * @var Core_Model_User
     */
    private $user;
    /**
     * @var array $notes
     */
    private $notes    = array();
    
    /**
     * @var array $tasks    
     */
    private $tasks    = array();
    
    /**
     * @var array $projects
     */
    private $projects = array();
    
    /**
     * @var array $users
     */
    private $users    = array();
    
    
    public function init()
    {
        parent::init();
        
        $auth           = Zend_Auth::getInstance();
        $user           = new Core_Model_User();
        
        $this->user     = $auth->getStorage()->read($user);
        $this->tasks    = $this->_initTasks();
        $this->users    = $this->_initUsers();
        $this->notes    = $this->_initNotes();
        $this->projects = $this->_initProjects();
        
        $this->_initLayout();
    }
    
    
    public function listAction()
    {
        $this->view->tasks     = $this->tasks;
        $this->view->projects  = $this->projects;
        $this->view->pageTitle = $this->view->translate('TASKS_TITLE');
        
    }
    
    public function taskAction()
    {
//        $auth = Zend_Auth::getInstance();
//        $user = new Core_Model_User();
        
        $taskId        = (int) $this->getRequest()->getParam('id');
        $taskProjectId = (int) $this->getRequest()->getParam('pid');
        $task          = new Task_Model_Task();
        $thisTask      = $task->getTaskMapper()->find($taskId);
        $form          = new Task_Form_Task();
        
        $time1         = new Zend_Date();
        $time2         = new Zend_Date();
        $timeElapsed   = $time1->compare($time2);
        $lastInsertId  = $task->getTaskMapper()->lastInsertId();
        
        $projects = array('--');
        foreach ($this->projects as $project) {
            $projects[$project->getProjectId()] = '#'. $project->getProjectId()
                                                  . ' ' 
                                                  . substr(
                                                        $project->getProjectTitle(),
                                                        0,
                                                        10
                                                    );
        }
        $users = array();
        foreach ($this->users as $user) {
            $users[$user->getId()] = $user->getName();
        }
        
        $form->sel_task_project->setMultiOptions($projects);
        $form->sel_task_manager->setMultiOptions($users);
        
        if ($taskId !== 0) :
//            $time1 = new Zend_Date();
//            $time1->setDate(time()+86400, 'dd-mm-YY');
//            $time2 = new Zend_Date();
//            $time2->setDate(time(), 'dd-mm-YY');
//            $timeElapsed = $time1->compare($time2);
//            echo $time1;
//            echo $time2;
//            echo $timeElapsed;
            
            $project     = new Project_Model_Project();
            $hisProject  = (int) $this->getRequest()->getParam('pid');
            $thisProject = $project->getProjectMapper()->find($hisProject);
            $startDate   = new Zend_Date();
            $endDate     = $thisProject->getProjectEnd();
            
            // @TODO: set values
            
            $form->setDefault(
                        'inp_task_name',
                        $thisTask->getTaskName()
                    );
            $form->setDefault(
                        'sel_task_project',
                        $hisProject - 1
                    );
            $form->setDefault(
                        'inp_task_id',
                        '#' . $thisTask->getTaskId()
                    );
            $form->setDefault(
                        'inp_task_start_datepicker',
                        $thisTask->getTaskStart()
                                 ->toString('dd-MM-Y H:m:s')
                    );
            $form->setDefault(
                        'inp_task_end_datepicker',
                        $thisTask->getTaskEnd()
                                 ->toString('dd-MM-Y H:m:s')
                    );
            $form->setDefault(
                'sel_task_project',
//                $taskProjectId - 1
                $thisTask->getTaskProject()->getProjectId()
            );
            $form->setDefault(
                        'sel_task_manager',
                        $thisTask->getTaskManager()->getId()
                    );
            $form->setDefault(
                        'tarea_task_description',
                        $thisTask->getTaskDescription()
                    );
            foreach ($form->getElements() as $elem) {
                $elem->setAttrib('disabled', 'disabled');
            }
            
            $form->removeElement('submit_task_form');
            
            $this->view->userRole  = $this->user
                                          ->getRole()
                                          ->getId();
            $this->view->pageTitle = $this->view->translate('TASK') . $taskId;
            $this->view->notes     = $this->notes;
            
        else :
        
        endif;
        
        
        
        $this->view->taskId    = $thisTask->getTaskId();
        $this->view->projectId = $thisTask->getTaskProject()->getProjectId();
        $this->view->formTask  = $form;
        
    }
    
    
    public function createAction()
    {
//        $auth = Zend_Auth::getInstance();
//        $user = new Core_Model_User();
        
        $task          = new Task_Model_Task();
        $form          = new Task_Form_Task();
        $lastInsertId  = $task->getTaskMapper()->lastInsertId();
        $hisProjectID  = (int) $this->getRequest()->getParam('pid');
        $projectsNames = $this->_initProjects();
        $startDate     = new Zend_Date();
        $endDate       = new Zend_Date();
        
        $projects = array('--');
        foreach ($this->projects as $project) {
            $projects[$project->getProjectId()] = '#'. $project->getProjectId()
                                                  . ' ' 
                                                  . substr(
                                                        $project->getProjectTitle(),
                                                        0,
                                                        10
                                                    );
        }
        $users = array();
        foreach ($this->users as $user) {
            $users[$user->getId()] = $user->getName();
        }
        
//        $form->setAction('')
//             ->setMethod('post');
//        if ($this->getRequest()->isPost()) {
//            if ($form->isValid($this->getRequest()->getPost())) {
//
//            }
//        }
        
        $form->sel_task_project->setMultiOptions($projects);
        $form->sel_task_manager->setMultiOptions($users);
        $form->setDefault(
                    'inp_task_id',
                    '#' . $lastInsertId
                );
        $form->setDefault(
                    'sel_task_project',
                    ($hisProjectID !== '0') ? $hisProjectID : 0
                );
        $form->setDefault(
                    'inp_task_start_datepicker',
                    $startDate->toString('dd-MM-Y H:m:s')
                );
        $form->inp_task_start_datepicker
             ->setAttribs(
                array(
                    'disabled' => 'disabled',
                    'class'=> null
                )
             );
        
        $form->inp_task_id->setAttrib('readonly', '');
        $form->sel_task_project->setAttrib('disabled', 'disabled');
        
        $this->view->pageTitle = $this->view->translate('NEW_TASK_TITLE');
        $this->view->taskId    = $lastInsertId;
//        $this->view->projectId = $hisProjectID;
        $this->view->projects  = $projectsNames;
        $this->view->formTask  = $form;
    }
    
    
    public function modifyAction()
    {
        $taskModel     = new Task_Model_Task();
        $form          = new Task_Form_Task();
        $time1         = new Zend_Date();
        $time2         = new Zend_Date();
        
        $taskId        = (int) $this->getRequest()->getParam('id');
        $taskProjectId = (int) $this->getRequest()->getParam('pid');
        $task          = $taskModel->getTaskMapper()->find($taskId);
        $timeElapsed   = $time1->compare($time2);
        
        $project     = new Project_Model_Project();
        $hisProject  = 1;
        $thisProject = $project->getProjectMapper()->find($hisProject);
        $startDate   = new Zend_Date();
        $endDate     = $thisProject->getProjectEnd();
        $projects = array('--');
        foreach ($this->projects as $project) {
            $projects[$project->getProjectId()] = $project->getProjectTitle();
        }
        $users = array();
        foreach ($this->users as $user) {
            $users[$user->getId()] = $user->getName();
        }
        
        $form->setAction('')->setMethod('post');
        
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getPost())) {

            }
        }
        
        $form->sel_task_project->setMultiOptions($projects);
        $form->sel_task_manager->setMultiOptions($users);

        // @TODO: set values
        //$task->getTaskMapper()->find($taskId);

        $form->setDefault(
                    'inp_task_name',
                    $task->getTaskName()
                );
        $form->setDefault(
                    'inp_task_id',
                    '#' . $taskId
                );
        $form->setDefault(
                    'sel_task_project',
//                    $taskProjectId - 1
                    $task->getTaskProject()->getProjectId()
                );
        $form->setDefault(
                    'sel_task_priority',
                    $task->getTaskPriority()->getId()
                );
        $form->setDefault(
                    'sel_task_manager',
                    $task->getTaskManager()->getId()
                );
        $form->setDefault(
                    'tarea_task_description',
                    ''
                );
        
        $this->view->userRole  = $this->user
                                      ->getRole()
                                      ->getId();
        $this->view->pageTitle = $this->view->translate('TASK') . $taskId;
        $this->view->notes     = $this->notes;
        //$this->view->projectId = $hisProject;
        $this->view->formTask  = $form;
    }
    
    public function closeAction()
    {
//        $this->_helper->viewRenderer->setNoRender(true);
//        $this->_helper->layout()->disableLayout();
        $this->redirect('/task/list');
    }
    
    private function _initLayout($path = null)
    {
        if ($path === NULL) :
            $path = ROOT_PATH . DIRECTORY_SEPARATOR
                    . 'application' . DIRECTORY_SEPARATOR
                    . 'Task' . DIRECTORY_SEPARATOR
                    . 'views' . DIRECTORY_SEPARATOR
                    . 'layouts';
        endif;
        
        $this->_helper->layout()
                      ->setLayoutPath($path)
                      ->setLayout('layout');
        
        return TRUE;
    }
    
    private function _initTasks()
    {
        $task           = new Task_Model_Task();
        $taskCollection = $task->getTaskMapper()->fetchAll();
        
        return $taskCollection;
    }
    
    private function _initProjects()
    {
        $project             = new Project_Model_Project();
        $projectCollection   = $project->getProjectMapper()->fetchAll();
        
        return $projectCollection;
        
    }
    
    private function _initNotes()
    {
        $notes = array(
            1 => 'Notes 1',
            2 => 'Notes 2',
            3 => 'Notes 3'
        );
        
        return $notes;
            
    }
    
    private function _initUsers()
    {
        $user           = new Core_Model_User();
        $userCollection = $user->getMapper()->fetchAll();
        
        return $userCollection;
    }
    
    
}
