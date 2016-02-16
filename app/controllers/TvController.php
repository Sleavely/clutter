<?php
use Carbon\Carbon;

class TvController extends BaseController {

  public function getIndex()
  {
    //TODO: we could use TimelineController@getClutts to seed the page with some initial content
    
    return View::make('timeline.tv');
  }
}
