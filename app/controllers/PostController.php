<?php
use Carbon\Carbon;

class PostController extends BaseController {

  public function getIndex()
  {
    $redirect =  Redirect::to('post/'.Session::get('language', 'en'));
    if(Session::has('created-clutt'))
    {
      $redirect->with('created-clutt', Session::get('created-clutt'));
    }
    if(Session::has('errors'))
    {
      $redirect->withInput()->with('errors', Session::get('errors', array()));
    }
    return $redirect;
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

  public function getSv()
  {
    Session::set('language', 'sv');
    App::setLocale('sv');
    return $this->makeView();
  }
}
