<?php
use Carbon\Carbon;

class PostController extends BaseController {

  public function getIndex()
  {
    $view = View::make('timeline.post');

    if(Session::has('created-clutt'))
    {
      $clutt = Clutt::findOrFail(Session::get('created-clutt'));
      $view->withCreated($clutt);
    }

    return $view;
  }
}
