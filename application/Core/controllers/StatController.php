<?php
class StatController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $this->view->pageTitle = $this->view->translate('STATS_TITLE');
    }
}
