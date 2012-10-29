<?php
class IndexControllerTest extends Zend_Test_PHPUnit_ControllerTestCase
{
    public function setUp() {
        $this->bootstrap() = new Zend_Application(
                    'Testing',
                    APPLICATION_PATH . '/configs/application.ini'
                );
        parent::setUp();
    }
    
    public function testHomePageIsSuccesRequest()
    {
        
    }
}
