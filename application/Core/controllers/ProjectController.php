<?php
class ProjectController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $this->view->pageTitle = $this->view->translate('PROJECTS_TITLE');
    }
}
