    <?php
class IndexController extends Zend_Controller_Action
{
    /**
     *
     * @var Core_Model_User
     */
    private $user;
    
    public function init() {
        parent::init();
        
        $auth       = Zend_Auth::getInstance();
        $user       = new Core_Model_User();
        
        $this->user = $auth->getStorage()->read($user);
    }
    
    public function indexAction()
    {
        $dateArray = array(
            'year'   => 2012,
            'month'  => 11,
            'day'    => 8,
            'hour'   => 12,
            'minute' => 3,
            'second' => 10
        );
        
        $lastAlert = new Task_Model_Note();
        
        $lastAlert->setNoteDate($dateArray);
        
        $lastAlertDate = new Zend_Date($lastAlert->getNoteDate());
        $lastEditDate  = new Zend_Date($lastAlert->getNoteDate());
        
        $this->view->pageTitle     = $this->view->translate('HOME_TITLE');
        $this->view->userName      = ucfirst($this->user->getName());
        $this->view->userRole      = $this->user->getRole()->getName();
        $this->view->userFunction  = $this->user->getFunction();
        $this->view->lastAlertDate = $lastAlertDate->toString('dd-MM-Y H:m:s');
        $this->view->lastEditDate  = $lastEditDate->toString('dd-MM-Y H:m:s');
        $this->view->lastAlert     = 'Alert description...';
        $this->view->lastEdit      = 'Edit description...';
        
    }
    
    /**
     * 
     * @return object
     */
    private function _getDb()
    {
        $db = Zend_Registry::get("db");
        return $db;
    }
}
