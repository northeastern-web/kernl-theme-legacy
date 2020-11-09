<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Archive extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'archive'
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'categories' => $this->categories(),
        ];
    }

    public function categories()
    {
        $cats = get_categories(['parent' => 0]);
        $catList = [];

        foreach ($cats as $cat) {
            if (get_categories(['parent' => $cat->term_id])) {
                $cat->children = get_categories(['parent' => $cat->term_id]);
                $catList[] = $cat;
            } else {
                $catList[] = $cat;
            }
        }
        return $catList;
    }
}
