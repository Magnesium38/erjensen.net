<?php namespace App\Http\ViewComposers;

use App\Http\Link;
use Illuminate\View\View;

class LinkComposer {
    protected function createRoute($route, $name) {
        return [
            'route' => $route,
            'name'  => $name,
        ];
    }

    public function compose(View $view) {
        $headerLinks = [
            $this->createRoute("/docs", "Docs"),
            $this->createRoute("/blog", "Blog"),
        ];

        $footerLinks = [

        ];

        $view->with('headerLinks', $headerLinks)
             ->with('footerLinks', $footerLinks);
    }
}