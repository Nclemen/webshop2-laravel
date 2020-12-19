<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
    /**
     *  the table content
     * 
     * @var array
     */
    public $headers;

    /**
     *  the table content
     * 
     * @var array
     */
    public $content;

    /**
     *  the table content
     * 
     * @var string
     */
    public $modelName;

    /**
     *  whether or not options are added
     * 
     * @var boolean
     */
    public $options;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($headers, $content, $modelName, $options = "true")
    {
        $this->headers = $headers;
        $this->content = $content;
        $this->modelName = $modelName;
        if ($options == "true") {
            $this->options = true;
        } else {
            $this->options = false;
        }
        ;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.table');
    }
}
