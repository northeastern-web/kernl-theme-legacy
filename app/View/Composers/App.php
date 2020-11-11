<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use Log1x\Navi\Facades\Navi as Navi;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'chrome.local-header',
        'chrome.navInterior',
        'page',
    ];


    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function with()
    {
        return [
            'title' => $this->siteName(),
            'navCentral' => $this->menu('navCentral'),
            'navSupport' => $this->menu('navSupport'),
            'navBar' => $this->menu('navBar'),
            'navInterior' => $this->navInterior(),
        ];
    }


    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName()
    {
        return get_bloginfo('name', 'display');
    }

    /**
     * Returns the menu.
     *
     * @return string
     */
    public function menu($menu)
    {
        if (has_nav_menu($menu)) {
            return Navi::build($menu)->toArray();
        }
    }

    public function navInterior()
    {
        global $post;
        $ancestors = get_post_ancestors($post->ID);
        $rootAncestor = ($ancestors ? end($ancestors) : $post->ID);
        $tree = new \StdClass();

        if (is_page()) {
            foreach (get_pages(['parent' => $rootAncestor, 'sort_column' => 'menu_order', 'sort_order' => 'ASC']) as $page) {
                $page->children = get_children(['post_parent' => $page->ID, 'post_type' => 'page', 'order' => 'ASC', 'orderby' => 'menu_order', 'depth' => 1]);
                $tree->nav[] = $page;
            }

            if ($post->ID !== $rootAncestor) {
                $tree->rootAncestor = get_page($rootAncestor);
            }

            return $tree;
        }

        if (is_category()) {
            // for archives?
        }
    }
}
