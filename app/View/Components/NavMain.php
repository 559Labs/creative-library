<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavMain extends Component
{
    public $navitems;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->navitems = [
            "#url1" => __("Link 1"),
            "#uri2" => __("Link 2"),
            "#uri3" => __("Link 3"),
            "#uri4" => __("Link 4"),
            "#uri5" => __("Link 5"),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blocks.nav.main');
    }
}
