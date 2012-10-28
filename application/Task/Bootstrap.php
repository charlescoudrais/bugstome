<?php
class Task_Bootstrap extends Zend_Application_Module_Bootstrap
{
    protected function _initLoadNavConfig()
    {
        $nav = Zend_Registry::get('Zend_Navigation');
        
        $taskNavConfig = new Zend_Config_Ini(
            ROOT_PATH . DIRECTORY_SEPARATOR .
            'application' . DIRECTORY_SEPARATOR .
            'Task' . DIRECTORY_SEPARATOR . 
            'configs' . DIRECTORY_SEPARATOR . 
            'navigation.ini', APPLICATION_ENV
        );
        
        $nav->addPages($taskNavConfig);
        
        
    }
 
    protected function _initLoadRouterConfig()
    {
        $taskRouteConfig = new Zend_Config_Ini(
            ROOT_PATH . DIRECTORY_SEPARATOR .
            'application' . DIRECTORY_SEPARATOR .
            'Task' . DIRECTORY_SEPARATOR . 
            'configs' . DIRECTORY_SEPARATOR . 
            'routes.ini', APPLICATION_ENV
        );
        
       Zend_Controller_Front::getInstance()
                                   ->getRouter()
                                   ->addConfig($taskRouteConfig, 'routes');
    }
    
//    protected function _initModuleTranslation()
//    {
//        if (!$this->getApplication()->hasResource('translate')) {
//            $this->getApplication()->bootstrap('translate');
//        }
//        $translator = Zend_Registry::get('Zend_Translate');
//        $options = array( 
//        				  'adapter' => 'array',
//                          'content' => __DIR__ . DIRECTORY_SEPARATOR 
//                                      . 'i18n' . DIRECTORY_SEPARATOR
//        );
//        $translator->addTranslation($options);
//    }
}
