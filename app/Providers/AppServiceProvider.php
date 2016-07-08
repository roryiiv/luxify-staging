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
        //build categories array
        $views = array();
        if(null !== session('currency')){
            $sess_currency = session('currency');
        }else{
            $sess_currency = 'USD';
        }
        $views['currency'] = $sess_currency;

        view()->share('views', $views);

        // $notifs = func::get_notif();
        // view()->share('notifs', $notifs);

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
