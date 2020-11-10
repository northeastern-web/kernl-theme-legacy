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
    public function __construct($link = '#', $text = null, $icon = null)
    {
        $this->link = $link ? $link : $this->getLink();
        $this->icon = $icon ? $icon : $this->getIcon();
        $this->iconPosition = $iconPosition ? $iconPosition : $this->getIconPosition();
        $this->isModalTrigger = $isModalTrigger ? $isModalTrigger : $this->getModalTrigger();
        $this->text = $text ? $text : $this->getText();

        $this->iconPosition = $iconPosition;
    }

    public function getLink()
    {
        if (get_sub_field('url')) {
            return get_sub_field('url')['url'];
        }
    }

    public function getIcon()
    {
        if (get_sub_field('icon')) {
            return get_sub_field('icon');
        }
    }

    public function getIconPosition()
    {
        if (get_sub_field('iconPosition')) {
            return get_sub_field('iconPosition');
        }
    }

    public function getModalTrigger()
    {
        if (get_sub_field('isModalTrigger')) {
            return get_sub_field('isModalTrigger');
        }
    }

    public function getText()
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
