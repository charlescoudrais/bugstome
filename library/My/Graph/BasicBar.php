<?php
class My_Graph_BasicBar
{
    /**
     *
     * @var array 
     */
    private $datas = array();
    
    private $js = '<script type="text/javascript" src="/js/myd3/d3.basic.columns.js"></script>';
       
    private $css;
    
    /**
     * 
     * @return array
     */
    public function getDatas()
    {
        return $this->datas;
    }
    
    /**
     * 
     * @param string|array $datas
     * @return My_Graph_BasicBar
     */
    public function setDatas($datas)
    {
        if (is_string($datas)) {
            $datas = json_decode($datas, TRUE);
        }
        
        $res = "var data = [";
        foreach ($datas as $key => $val) {
            $res .= "{'keys': '".$key."', 'values': '".$val."'},";
        }
        $res .= "];";
        
        $this->datas = $res;
        
        return $this;
    }
    
    public function getCss()
    {
        return $this->css;
    }
    
    public function getJs()
    {
        return $this->js;
    }

    public function setJs($jsSources)
    {
        $this->js = $jsSources;
        return $this;
    }

    public function setCss()
    {
//        if (!$css) {
            //*
            $css  = '<style type="text/css">'
                      . PHP_EOL;
            $css .= 'body {font: 10px sans-serif;}'
                      . PHP_EOL;
            $css .= '.axis path, .axis line {'
                      . PHP_EOL;
            $css .= 'fill: none; stroke: #000000; shape-rendering: crispEdges;'
                      . PHP_EOL;
            $css .= '}'
                      . PHP_EOL;
            $css .= '.bar {fill: steelblue;}'
                      . PHP_EOL;
            $css .= '.x.axis path {display: none;}'
                      . PHP_EOL;
            $css .= '</style>'
                      . PHP_EOL;
            // */
//        }
        
        $this->css = $css;
        return $this;
    }

     /**
     * 
     * @return string
     */
    public function __toString()
    {
        //@TODO
        //$jsSrc = '/js/myd3/d3.basic.columns.js';
        $res   = '';
        
        $res  .= $this->getCss()
                 . PHP_EOL;  
        $res  .= '<script type="text/javascript">'
                 . PHP_EOL;
        $res  .= $this->getDatas()
                 . PHP_EOL;
        $res  .= "</script>"
                 . PHP_EOL;
        $res  .= $this->getJs()
                 . PHP_EOL;  
        
        
        return $res;
    }
}