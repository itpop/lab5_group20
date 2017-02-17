<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Views extends Application
{
    public function index()
    {
        $this->data['pagetitle'] = 'Ordered TODO List';
        $tasks = $this->tasks->all();   // get all the tasks
        //$this->data['content'] = 'Ok'; // so we don't need pagebody
        $this->data['leftside'] = $this->makePrioritizedPanel($tasks);
        $this->data['rightside'] = $this->makeCategorizedPanel($tasks);

        $this->render(); 
    }
    
    /**
	 * Render this page
	 */
	function render($template = 'template_secondary')
	{
        $this->data['menubar'] = $this->parser->parse('_menubar', $this->config->item('menu_choices'),true);
		$this->parser->parse($template, $this->data);
	}
    
    /**
	 * Prioritized panel
	 */
    function makePrioritizedPanel($tasks) {
         // extract the undone tasks
        foreach ($tasks as $task)
        {
            if ($task->status != 2)
                $undone[] = $task;
        }
        
        // order them by priority
        usort($undone, "orderByPriority");
        
        //$converted[] = (array) $task;
        foreach ($undone as $task)
        {
            // substitute the priority name
            $task->priority = $this->priorities->get($task->priority)->name;
            // convert the array of task objects into an array of associative objects  
            $converted[] = (array) $task;
        }
        
        $parms = ['display_tasks' => $converted];
        return $this->parser->parse('by_priority', $parms, true);
    }
    
    /**
	 * Categorized panel
	 */
    function makeCategorizedPanel($tasks)
    {
        $parms = ['display_tasks' => $this->tasks->getCategorizedTasks()];
        return $this->parser->parse('by_category', $parms, true);
    }

}

// return -1, 0, or 1 of $a's priority is higher, equal to, or lower than $b's
function orderByPriority($a, $b)
{
    if ($a->priority > $b->priority)
        return -1;
    elseif ($a->priority < $b->priority)
        return 1;
    else
        return 0;
}
