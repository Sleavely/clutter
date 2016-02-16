<?php
use Carbon\Carbon;

class TvController extends BaseController {

  public function getIndex()
  {
    return Redirect::to('tv/'.Session::get('language', 'en'));
  }

  private function makeView()
  {
    //TODO: we could use TimelineController@getClutts to seed the page with some initial content
    return View::make('timeline.view');
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
