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
        
        
        $lastAlert = new Task_Model_Note();
        $lastAlert->setNoteDate($dateArray);
        
        $this->view->pageTitle = $this->view->translate('HOME_TITLE');
        $this->view->lastAlert = $lastAlert->getNoteDate();
        $this->view->lastEdit = $lastAlert->getNoteDate();
        
        
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
