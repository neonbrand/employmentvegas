<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use Log1x\Navi\Facades\Navi;

class Navigation extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.nav-primary',
        'partials.nav-header',
        'partials.nav-footer'
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'primary_navigation' => $this->primary_navigation(),
            'header_navigation' => $this->header_navigation(),
            'footer_navigation' => $this->footer_navigation(),
        ];
    }

    /**
     * Returns the primary navigation.
     *
     * @return array
     */
    public function primary_navigation()
    {
        if (Navi::build('primary_navigation')->isEmpty()) {
            return;
        }

        return Navi::build('primary_navigation')->toArray();
    }
    /**
     * Returns the footer navigation.
     *
     * @return array
     */
    public function footer_navigation()
    {
        if (Navi::build('footer_navigation')->isEmpty()) {
            return;
        }

        return Navi::build('footer_navigation')->toArray();
    }

    /**
     * Returns the header navigation.
     *
     * @return array
     */
    public function header_navigation()
    {
        if (Navi::build('header_navigation')->isEmpty()) {
            return;
        }

        return Navi::build('header_navigation')->toArray();
    }
}
