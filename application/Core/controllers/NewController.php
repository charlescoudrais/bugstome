<?php
class NewController extends Zend_Controller_Action
{
    public function newAction()
    {
        $this->view->pageTitle = 'NEW_PAGE';
    }
}
