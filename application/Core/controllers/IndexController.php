<?php
class IndexController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $this->view->pageTitle = $this->view->translate('HOME_TITLE');
        
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
