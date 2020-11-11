<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Card extends Component
{
    public $alt;
    public $cssClass;
    public $excerpt;
    public $footer;
    public $header;
    public $image;
    public $media;
    public $link;
    public $title;
    public $subtitle;

    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    public function __construct($alt = null, $cssClass = null, $excerpt = null, $footer = null, $header = null, $image = null, $media = null, $link = null, $title = null, $subtitle = null)
    {
        $this->image = $image ? $image : $this->getImage();

        $this->alt = $alt ? $alt : $this->getAlt();
        $this->cssClass = $cssClass ? $cssClass : $this->getCssClass();
        $this->excerpt = $excerpt ? $excerpt : $this->getExcerpt();
        $this->footer = $footer ? $footer : $this->getFooter();
        $this->header = $header ? $header : $this->getHeader();
        $this->image = $image ? $image : $this->getImage();
        $this->media = $media ? $media : $this->getMedia();
        $this->link = $link ? $link : $this->getLink();
        $this->title = $title ? $title : $this->getTitle();
        $this->subtitle = $subtitle ? $subtitle : $this->getSubtitle();
    }

    public function getAlt()
    {
        if (get_sub_field('image')) {
            return get_sub_field('image')['alt'];
        }

        if (has_post_thumbnail()) {
            return get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
        }
    }

    public function getCssClass()
    {
        if (get_post_type() == 'profile') {
            return '-profile group';
        };

        if (get_post_type() == 'tribe_events') {
            return 'group';
        };
    }

    public function getExcerpt()
    {
        if (get_sub_field('wysiwyg')) {
            return get_sub_field('wysiwyg');
        }

        if (has_excerpt()) {
            return get_the_excerpt();
        }

        if (is_single()) {
            return wp_trim_words(get_the_content(), 20);
        }
    }

    public function getFooter()
    {
        if (get_sub_field('footer')) {
            return get_sub_field('footer');
        }

        if (get_post_type() == 'tribe_events') {
            return 'View Event &nbsp;<i data-feather="arrow-right" class="right -sm">arrow-right</i>';
        };

        if (get_post_type() == 'profile') {
            return '<i data-feather="more-vertical" class="-sm">more-vertical</i> View Profile';
        };
    }

    public function getHeader()
    {
        if (get_sub_field('header')) {
            return get_sub_field('header');
        }

        if (get_post_type() == 'tribe_events') {
            $date = '<i data-feather="calendar" class="-sm"></i>&nbsp;&nbsp;' . tribe_get_start_date(get_the_id(), false, 'M j');
            $time = tribe_get_start_time();
            return $date . ($time ? ' at ' . $time : '');
        };
    }

    public function getImage()
    {
        if (get_sub_field('image')) {
            return get_sub_field('image')['url'];
        }

        if (get_field('image') && get_post_type() == 'profile') {
            return get_field('image')['url'];
        }

        if (has_post_thumbnail()) {
            return get_the_post_thumbnail_url(null, 'large');
        }
    }

    public function getMedia()
    {
        if (get_sub_field('media')) {
            return get_sub_field('media');
        }

        if (get_post_type() == 'profile') {
            return 'ar-1x1';
        }

        return 'ar-16x9';
    }

    public function getLink()
    {
        if (get_sub_field('url')) {
            return get_sub_field('url')['url'];
        }

        return get_permalink();
    }

    public function getTitle()
    {
        if (get_sub_field('title')) {
            return get_sub_field('title');
        }

        return get_the_title();
    }

    public function getSubtitle()
    {
        if (get_sub_field('subtitle')) {
            return get_sub_field('subtitle');
        }

        if (get_post_type() == 'profile') {
            return '
                <div class="d-block mb-0h">'. get_field('area') .'</div>
                '. get_field('title');
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('components.card');
    }
}
