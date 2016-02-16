<?php
use Carbon\Carbon;

class PostController extends BaseController {

  public function getIndex()
  {
    return Redirect::to('post/'.Session::get('language', 'en'));
  }

  private function makeView()
  {
    $view = View::make('timeline.post');

    if(Session::has('created-clutt'))
    {
      $clutt = Clutt::findOrFail(Session::get('created-clutt'));
      $view->withCreated($clutt);
    }

    return $view;
  }

  public function getEn()
  {
    Session::set('language', 'en');
    App::setLocale('en');
    return $this->makeView();
  }

  public function getSe()
  {
    Session::set('language', 'sv');
    App::setLocale('sv');
    return $this->makeView();
  }
}
