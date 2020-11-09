<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Posts extends Component
{
    /**
     * The Item type.
     *
     * @var string
     */
    public $args;
    public $columnClass;
    public $viewClass;
    public $noResults;
    public $templateView;
    public $wrapperClass;
    public $message;

    /**
     * Create the component instance.
     *
     * @param  string  $args
     * @param  string  $message
     * @return void
     */
    public function __construct($args = null, $columnClass = null, $viewClass = null, $noResults = null, $templateView = "card", $wrapperClass = null, $message = null)
    {
        $this->args = $args ? $args : $this->getArgs();
        $this->columnClass = $columnClass ? $columnClass :  $this->getColumnClass();
        $this->viewClass = $viewClass ? $viewClass :  $this->getViewClass();
        $this->noResults = $noResults ? $noResults :  $this->getNoResults();
        $this->templateView = $templateView ? $templateView :  $this->getTemplateView();
        $this->wrapperClass = $wrapperClass ? $wrapperClass :  $this->getWrapperClass();
        $this->message = $message ? $message :  $this->getMessage();
    }

    public function getArgs()
    {
        $default_args = [
            'author'                   => '',
            'author_name'              => '',
            'author__in'               => '',
            'author__not_in'           => '',
            'cache_results'            => true,
            'cat'                      => '',
            'category__and'            => '',
            'category__in'             => '',
            'category__not_in'         => '',
            'category_name'            => '',
            'fields'                   => '',
            'ignore_sticky_posts'      => 'false',
            'meta_compare'             => '',
            'meta_key'                 => '',
            'meta_query'               => '',
            'meta_value'               => '',
            'meta_value_num'           => '',
            'name'                     => '',
            'nopaging'                 => '',
            'offset'                   => 0,
            'order'                    => 'DESC',
            'orderby'                  => 'date',
            'p'                        => '',
            'page'                     => '',
            'paged'                    => '',
            'page_id'                  => '',
            'pagename'                 => '',
            'perm'                     => '',
            'post__in'                 => '',
            'post__not_in'             => '',
            'post_parent'              => '',
            'post_parent__in'          => '',
            'post_parent__not_in'      => '',
            'post_type'                => 'post',
            'post_status'              => 'publish',
            'posts_per_page'           => 1,
            'post_name__in'            => '',
            's'                        => '',
            'tag'                      => '',
            'tax_query'                => '',
            'title'                    => '',
            'update_post_meta_cache'   => '',
            'update_post_term_cache'   => '',
            'lazy_load_term_meta'      => '',
        ];

        return wp_parse_args(get_sub_field('wpQuery'), $this->default_args);
    }

    public function getColumnClass()
    {
        // return "cols";
        // @dd(get_sub_field('columnClass'));
        if (get_sub_field('columnClass')) {
            return get_sub_field('columnClass');
        }
    }

    public function getViewClass()
    {
        if (get_sub_field('viewClass')) {
            return get_sub_field('viewClass');
        }
    }

    public function getNoResults() {
        return "no posts returned";
    }

    public function getTemplateView()
    {
        if (get_sub_field('view')) {
            return get_sub_field('view');
        }
    }

    public function getWrapperClass()
    {
        if (get_sub_field('wrapperClass')) {
            return get_sub_field('wrapperClass');
        }
    }

    public function getMessage()
    {
        // return [1,2,3,4];
        return "adfkjsshnkj";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('components.posts');
    }
}
