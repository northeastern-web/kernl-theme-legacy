<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Banner extends Component
{
    public $cssClass;
    public $element;
    public $image;
    public $pretitle;
    public $style;
    public $subtitle;
    public $title;

    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    public function __construct($cssClass = null, $element = 'div', $image = null, $pretitle = null, $subtitle = null, $style = null, $title = null)
    {
        $this->cssClass = $cssClass;
        $this->element = $element;
        $this->image = $image;
        $this->pretitle = $pretitle;
        $this->subtitle = $subtitle;
        $this->style = $style;
        $this->title = $title;
    }

    public function pretitle()
    {
        if (is_singular('profile')) {
            return get_field('pretitle', 'profiles');
        }

        if (is_singular('tribe_events') && get_field('pretitle', 'events')) {
            return '
            <nav class="breadcrumb">
                <a href="' . tribe_get_events_link() . '">' . get_field('pretitle', 'events') . '</a>
            </nav>';
        }

        if (is_category()) {
            if (get_field('pretitle', get_queried_object())) {
                return get_field('pretitle', get_queried_object());
            }
        }

        if (is_single()) {
            if (get_the_category()) {
                return '
                <nav class="breadcrumb">
                    <a href="' . get_category_link(get_the_category()[0]) . '">' . get_the_category()[0]->name . '</a>
                </nav>';
            }
        }

        if (get_field('pretitle')) {
            return get_field('pretitle');
        }

        if (is_page()) {
            $ancestor_ids = get_post_ancestors(get_the_id());
            $output = '<nav class="breadcrumb">';
            foreach (array_reverse($ancestor_ids) as $ancestor_id) {
                $output .= '<a href="' . get_permalink($ancestor_id) . '">' . get_the_title($ancestor_id) . '</a>';
            }
            $output .= '</nav>';
            return $output;
        }

        if (is_search()) {
            return null;
        }
    }

    public function style()
    {
        $option = get_queried_object();

        if (is_singular()) {
            $option = get_the_ID();
        }

        if (is_singular('profile')) {
            $option = 'profiles';
        }

        if (is_post_type_archive('tribe_events') || is_singular('tribe_events')) {
            $option = 'events';
        }

        if (get_field('image', $option)) {
            $image = get_field('image', $option)['url'];
        }

        if ($image) {
            $image = $image;
        }

        if (isset($image) && !is_search()) {
            return 'style="background-image:url(' . $image . ')"';
        }
    }

    public function subtitle()
    {
        if (is_singular('tribe_events')) {
            $events_label_singular = tribe_get_event_label_singular();
            $events_label_plural = tribe_get_event_label_plural();

            $start_date = tribe_get_start_date(get_the_id(), false, 'l, M j, Y');
            $start_time = tribe_get_start_date(get_the_id(), false, 'g:i a');
            $end_date = tribe_get_end_date(get_the_id(), false, 'M j, Y');
            $end_time = tribe_get_end_date(get_the_id(), false, 'g:i a');

            if (tribe_event_is_multiday()) {
                $eventDate = '<i data-feather="clock" class="tc-red -thin pos-relative" style="top: 2px"></i> ' . $start_date . ' &mdash; ' . $end_date;
            } elseif (tribe_event_is_all_day()) {
                $eventDate = '<i data-feather="clock" class="tc-red -thin pos-relative" style="top: 2px"></i> ' . $start_date . ' &bull; All Day';
            } else {
                $eventDate = '<i data-feather="clock" class="tc-red -thin pos-relative" style="top: 2px"></i> ' . $start_date . ' &middot; ' . $start_time . '&ndash;' . $end_time;
            }
            $eventBanner = $eventDate . '<div class="pt-1"><a class="tc-red fs-root fw-400 d-inline-flex" href="?ical"><i data-feather="calendar" class="-thin mr-0h"></i> Save to Calendar</a></div>';

            return $eventBanner;
        }

        if (is_singular('profile')) {
            return get_field('subtitle', 'profiles');
        }

        if (is_post_type_archive('tribe_events') || is_singular('tribe_events')) {
            return get_field('subtitle', 'events');
        }

        if (is_category()) {
            if (get_field('subtitle', get_queried_object())) {
                return get_field('subtitle', get_queried_object());
            }
        }

        if (get_field('subtitle') && !is_search()) {
            return get_field('subtitle');
        }

        if (is_single()) {
            $output = '';

            if (get_field('hasAttribution')) {
                $output .= '
                <div class="tt-caps fw-700 fs-sm pt-0h">by ' .
                    ( get_field('hasAuthorOverride') ? get_field('postAuthor') : get_the_author() ) .
                    ( get_field('postSource') ? ', ' . get_field('postSource') : '' );
                '</div>';
            }

            if (get_field('hasDate')) {
                $output .= '<div class="tt-caps fw-400 fs-sm pt-0h">' . get_the_date() . '</div>';
            }

            return $output;
        }
    }

    public function title()
    {
        if (is_singular('profile')) {
            return get_field('title', 'profiles');
        }

        if (is_post_type_archive('tribe_events')) {
            return get_field('title', 'events');
        }

        if (is_archive()) {
            if (is_category()) {
                if (get_field('title', get_queried_object())) {
                    return get_field('title', get_queried_object());
                }
                return single_cat_title('', false);
            }

            if (is_tag()) {
                return single_tag_title('', false);
            }

            if (is_author()) {
                return get_the_author();
            }

            if (is_post_type_archive()) {
                return post_type_archive_title('', false);
            }

            if (is_tax()) {
                return single_term_title('', false);
            }

            return get_the_archive_title();
        }

        if (is_search()) {
            return sprintf(__('Search Results for <b>%s</b>', 'sage'), get_search_query());
        }

        if (get_field('title')) {
            return get_field('title');
        }

        return get_the_title();
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('chrome.banner');
    }
}
