<?php
class Core_Plugin_User extends Zend_Controller_Plugin_Abstract
{
    public function dispatchLoopStartup(
                Zend_Controller_Request_Abstract $request
            )
    {
       $userService = new Core_Service_UserApi();
       
       if (!$userService->hasIdentity()) {
           $request->SetModuleName('Core')
                    ->SetControllerName('User')
                    ->setActionName('login')
                    ->setDispatched(true);
       }
    }
}