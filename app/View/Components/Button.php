<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Button extends Component
{
    public $link;
    public $text;
    public $icon;
    public $isModalTrigger;
    public $iconPosition;

    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    public function __construct($link = '#', $text = "param", $icon = null)
    {
        $this->link = $link;
        $this->icon = $icon;
        $this->isModalTrigger = $isModalTrigger;
        $this->iconPosition = $iconPosition;
        $this->text = $text;
    }

    public function link()
    {
        if (get_sub_field('url')) {
            return get_sub_field('url')['url'];
        }
    }

    public function text()
    {
        if (get_sub_field('url')) {
            return get_sub_field('url')['title'];
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('components.button');
    }
}
