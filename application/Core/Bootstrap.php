<?php
class Core_Bootstrap extends Zend_Application_Module_Bootstrap
{
    protected function _initLoadRouterConfig()
    {
       $newConfig = new Zend_Config_Ini(
           ROOT_PATH . DIRECTORY_SEPARATOR
           . 'application' . DIRECTORY_SEPARATOR
           . 'Core' . DIRECTORY_SEPARATOR
           . 'configs' . DIRECTORY_SEPARATOR
           . 'routes.ini', APPLICATION_ENV
       );
       try {
           Zend_Controller_Front::getInstance()->getRouter()->addConfig(
                                                            $newConfig, 'routes'
                                                        );
       } catch (Exception $e) {
           echo $e->getMessage();
       }

    }
    
    protected function _initLoadNavConfig()
    {
        $newNavConfig = new Zend_Config_Ini(
            ROOT_PATH . DIRECTORY_SEPARATOR
            . 'application' . DIRECTORY_SEPARATOR
            . 'Core' . DIRECTORY_SEPARATOR
            . 'configs' . DIRECTORY_SEPARATOR
            . 'navigation.ini',
            APPLICATION_ENV
        );
        $nav = new Zend_Navigation($newNavConfig);
        Zend_Registry::set(
                    'Zend_Navigation',
                    $nav
                );
    }
    
    protected function _initModuleTranslation()
    {
        if (!$this->getApplication()->hasResource('translate')) {
            $this->getApplication()->bootstrap('translate');
        }
        $translator = Zend_Registry::get('Zend_Translate');
        $options = array( 
        				  'adapter' => 'array',
                          'content' => __DIR__ . DIRECTORY_SEPARATOR 
                                      . 'i18n' . DIRECTORY_SEPARATOR
        );
        $translator->addTranslation($options);
    }
    
    /*
    protected function _initPlugins()
    {
        $fc = Zend_Controller_Front::getInstance();
        $fc->registerPlugin(new Core_Plugin_Auth);
    }
    
    protected function _initModuleAcl()
    {
        $acl = Zend_Registry::get('My_Acl');
        
        $acl->addRole(new Zend_Acl_Role('Guest'));
        //$acl->addRole(new Zend_Acl_Role('User'), 'Guest');
        $acl->addRole(new Zend_Acl_Role('Admin'));

        $acl->addResource(new Zend_Acl_Resource('CoreIndexIndex'));
        $acl->addResource(new Zend_Acl_Resource('CoreErrorError'));
        //$acl->addResource(new Zend_Acl_Resource('CoreCacheClear'));
        
        $acl->deny('Guest');
        $acl->allow('Admin');
        
        $acl->allow('Guest', 'CoreIndexIndex');
        $acl->allow('Guest', 'CoreErrorError');
        
        $acl->addResource(new Zend_Acl_Resource('CoreUserCreate'));
        $acl->addResource(new Zend_Acl_Resource('CoreUserList'));
        $acl->addResource(new Zend_Acl_Resource('CoreUserModify'));
        $acl->addResource(new Zend_Acl_Resource('CoreAuthLogin'));
        $acl->addResource(new Zend_Acl_Resource('CoreAuthLogout'));
        
        $acl->allow('Guest', 'CoreAuthLogin');
        $acl->allow('Guest', 'CoreAuthLogout');
        $acl->allow('Admin', 'CoreUserCreate');
        $acl->allow('User', 'CoreUserList');
    }
    // */
}
