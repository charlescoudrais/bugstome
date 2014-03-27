<?php
class Stat_StatController extends Zend_Controller_Action
{
    private $user;
    
    public function init()
    {
        $auth       = Zend_Auth::getInstance();
        $user       = new Core_Model_User();
        
        $this->user = $auth->getStorage()->read($user);
    }
    
    public function indexAction()
    {
        $this->_initLayout();
        
        $data = '{"A":0.08167,"B":0.01492,"C":0.0278,"D":0.04253,"E":0.12702,"F":0.02288,"G":0.02022,"H":0.06094,"I":0.06973,"J":0.00153,"K":0.00747,"L":0.04025,"M":0.02517,"N":0.08167,"O":0.01492,"P":0.0278,"Q":0.04253,"R":0.12702,"S":0.02288,"T":0.02022,"U":0.06094,"V":0.06973,"X":0.205,"Y":0.00747,"Z":0.04025}';
        $datas = array(
            'A' => .08167,
            'B' => .01492,
            'C' => .02780,
            'D' => .04253,
            'E' => .12702,
            'F' => .02288,
            'G' => .02022,
            'H' => .06094,
            'I' => .06973,
            'J' => .00153,
            'K' => .00747,
//            'L' => .04025,
//            'M' => .02517,
//            'N' => .08167,
//            'O' => .01492,
//            'P' => .02780,
//            'Q' => .04253,
//            'R' => .12702,
//            'S' => .02288,
//            'T' => .02022,
//            'U' => .06094,
//            'V' => .06973,
//            'X' => .205,
//            'Y' => .00747,
//            'Z' => .04025
        );
        $barGraph = new My_Graph_BasicBar();
        
        //$barGraph->setDatas($datas); // array
        $barGraph->setDatas($datas); // Json
        $this->view->barGraph  = $barGraph; 
        $this->view->css  = $barGraph->getCss(); 
        $this->view->js  = $barGraph->getJs(); 
//        echo $barGraph->getJs(); 
        
        $this->view->pageTitle = $this->view->translate('STATS_TITLE');
    }
    
    private function _initLayout($path = null)
    {
        if ($path === NULL) {
            $path = ROOT_PATH . DIRECTORY_SEPARATOR
                    . 'application' . DIRECTORY_SEPARATOR
                    . 'Stat' . DIRECTORY_SEPARATOR
                    . 'views' . DIRECTORY_SEPARATOR
                    . 'layouts';
        }
        
        $this->_helper->layout()
                      ->setLayoutPath($path)
                      ->setLayout('layout');
        
        return TRUE;
    }
}
