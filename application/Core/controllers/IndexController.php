    <?php
class IndexController extends Zend_Controller_Action
{
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
        
        $auth      = Zend_Auth::getInstance();
        $user      = new Core_Model_User();
        $lastAlert = new Task_Model_Note();
        
        $lastAlert->setNoteDate($dateArray);
        
        $lastAlertDate = new Zend_Date($lastAlert->getNoteDate());
        $lastEditDate  = new Zend_Date($lastAlert->getNoteDate());
        
        $this->view->pageTitle = $this->view->translate('HOME_TITLE');
        $this->view->userName  = ucfirst(
                    $auth->getStorage()->read($user)->getName()
                );
        $this->view->userRole  = $auth->getStorage()
                                      ->read($user)
                                      ->getRole()
                                      ->getName();
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
