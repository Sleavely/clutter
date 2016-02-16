<?php
use Carbon\Carbon;

class TimelineController extends BaseController {

  public function __construct()
  {
    //TODO: run filters on all methods except basic GETs
  }

  public function getClutts($since = NULL)
  {
    $clutts = Clutt::byFollowed();

    //TODO: this makes no sense to put here. when will $since be supplied?
    if(is_string($since))
    {
      $since = Carbon::parse($since);
    }
    if($since instanceof Carbon)
    {
      $clutts->sinceLastFetched();
    }

    return $clutts->get();
  }

  public function postClutter()
  {
    //TODO: get clutter input.

    // AJAX gets the clutt in response
    if (Request::ajax())
    {
      return $clutt;
    }
    // HTTP gets redirect to timeline
    return Redirect::action('TimelineController@getIndex');
  }
}
