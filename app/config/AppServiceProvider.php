<?php

namespace App\Providers;

use App\MyLibrary\Functions;

use Illuminate\Support\ServiceProvider;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        \URL::forceSchema("https");

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function build_navigations(array $elements, $parentId = NULL){
        $branch = array();

        foreach ($elements as $element){
            if ($element['ParentId'] == $parentId){
                $children = $this->build_navigations($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[] = $element;
            }
        }

        return $branch;
    }
}