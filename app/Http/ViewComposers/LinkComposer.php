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
            $this->createRoute('/', 'Home'),
            $this->createRoute('/docs', 'Docs'),
            $this->createRoute('/blog', 'Blog'),
        ];

        $footerLinks = [
            $this->createRoute('https://github.com/magnesium38', 'GitHub')
        ];

        $view->with('headerLinks', $headerLinks)
             ->with('footerLinks', $footerLinks);
    }
}