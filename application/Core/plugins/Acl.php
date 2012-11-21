<?php
class Core_Plugin_Acl extends Zend_Controller_Plugin_Abstract
{
    public function dispatchLoopStartup(
            Zend_Controller_Request_Abstract $request
            )
    {
        parent::dispatchLoopStartup($request);
        $resource = ucfirst($request->getModuleName()) .
                    ucfirst($request->getControllerName()) .
                    ucfirst($request->getActionName());
        $userApi = new Core_Service_UserApi();
        if (!$userApi->authenticate()) {
            $role = 'Guest';
        }
        
        
    }
    
}

