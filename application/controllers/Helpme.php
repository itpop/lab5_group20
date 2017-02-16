<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Helpme extends Application
{    
    
    public function index()
    {
        //$this->data['pagebody'] = 'homepage';
        $this->data['pagetitle'] = 'Help Wanted!';
        $stuff = file_get_contents('../data/jobs.md');
        $this->data['content'] = $this->parsedown->parse($stuff);
        $this->render(); 
    }

    /**
	 * Render this page
	 */
    function render($template = 'template')
    {
    $this->data['menubar'] = $this->parser->parse('_menubar', $this->config->item('menu_choices'),true);
            $this->parser->parse($template, $this->data);
    }


}
