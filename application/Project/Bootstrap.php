<?php
class Project_Bootstrap extends Zend_Application_Module_Bootstrap
{
    protected function _initLoadNavConfig()
    {
        $nav = Zend_Registry::get('Zend_Navigation');
        
        $projectNavConfig = new Zend_Config_Ini(
            ROOT_PATH . DIRECTORY_SEPARATOR .
            'application' . DIRECTORY_SEPARATOR .
            'Project' . DIRECTORY_SEPARATOR . 
            'configs' . DIRECTORY_SEPARATOR . 
            'navigation.ini', APPLICATION_ENV
        );
        
        $nav->addPages($projectNavConfig);
        
        
    }
 
    protected function _initLoadRouterConfig()
    {
        $projectRouteConfig = new Zend_Config_Ini(
            ROOT_PATH . DIRECTORY_SEPARATOR .
            'application' . DIRECTORY_SEPARATOR .
            'Project' . DIRECTORY_SEPARATOR . 
            'configs' . DIRECTORY_SEPARATOR . 
            'routes.ini', APPLICATION_ENV
        );
        
       Zend_Controller_Front::getInstance()
                                   ->getRouter()
                                   ->addConfig($projectRouteConfig, 'routes');
    }
}