<?php
use Carbon\Carbon;

class TvController extends BaseController {

  public function getIndex()
  {
    return View::make('timeline.tv');
  }
}
