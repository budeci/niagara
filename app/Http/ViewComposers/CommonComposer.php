<?php 
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Page;

class CommonComposer {
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        //$program   = Program::where('id',(int)session()->get('user.program'))->first();
        $page      = Page::first();
        $view->with(compact('page'));
    }
}