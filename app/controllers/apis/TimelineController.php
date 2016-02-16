<?php
use Carbon\Carbon;

class TimelineController extends BaseController {

  public function __construct()
  {
    //TODO: run filters on all methods except basic GETs
    //$this->beforeFilter('auth', array('except' => array('get', 'index', 'show')));
  }

  /**
   * Helper to determine whether the methods are called over HTTP or internally.
   */
  private function isInternal()
  {
    return Request::segment(1) != 'api';
  }

  public function getClutts()
  {
    $clutts = Clutt::sinceLastFetched();
    Session::set('last-fetched', Carbon::now());

    return $clutts->get();
  }

  public function postClutter()
  {
    $message = Input::get('message', '');

    // Validate input
    $rules = array(
      'message' => 'required|max:140'
    );
    $validator = Validator::make(Input::all(), $rules);
    if ($validator->fails())
    {
      $errors = $validator->errors()->all();
      return Redirect::action('PostController@getIndex')->withInput()->with('errors', $errors);
    }

    // If we got this far we probably did something right :)
    $clutt = new Clutt;
    //TODO: save to database lol.

    // AJAX gets the whole clutt in response. Same if some other controller calls the method.
    if (Request::ajax() || $this->isInternal())
    {
      return $clutt;
    }
    // HTTP gets redirect back to form
    return Redirect::action('PostController@getIndex')->with('created-clutt', $clutt->id);
  }
}
