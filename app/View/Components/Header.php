<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Header extends Component
{
    /**
     * The Header type.
     *
     * @var string
     */
    public $type;

    /**
     * The alert message.
     *
     * @var string
     */
    public $element;
    public $pretitle;
    public $subtitle;
    public $title;

    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    public function __construct($element = 'div', $pretitle = null, $subtitle = null, $title = null)
    {
        $this->element = $element;
        $this->pretitle = $pretitle;
        $this->subtitle = $subtitle;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('components.header');
    }
}
