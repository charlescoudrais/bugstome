<?php
class IndexController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $auth      = Zend_Auth::getInstance();
        $user      = new Core_Model_User();
        $lastAlert = new Task_Model_Note();
        
        $dateArray = array(
            'year'   => 2012,
            'month'  => 11,
            'day'    => 8,
            'hour'   => 12,
            'minute' => 3,
            'second' => 10
        );
        
        
        $lastAlert->setNoteDate($dateArray);
        
        $this->view->pageTitle = $this->view->translate('HOME_TITLE');
        $this->view->lastAlert = $lastAlert->getNoteDate();
        $this->view->lastEdit  = $lastAlert->getNoteDate();
        $this->view->userName  = ucfirst(
                    $auth->getStorage()->read($user)->getName()
                );
        $this->view->userRole  = $auth->getStorage()
                                      ->read($user)
                                      ->getRole()
                                      ->getName();
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
