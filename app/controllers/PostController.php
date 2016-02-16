<?php
use Carbon\Carbon;

class PostController extends BaseController {

  public function getIndex()
  {
    return View::make('timeline.post');
  }
}
