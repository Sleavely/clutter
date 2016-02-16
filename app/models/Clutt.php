<?php
use Carbon\Carbon;
use Misd\Linkify\Linkify;

class Clutt extends Eloquent {

  // Have Eloquent automatically set html_message when exporting to array/JSON
  protected $appends = array('html_message');

  /**
   * Getter for $clutt->html_message
   */
  public function getHtmlMessageAttribute()
  {
    $str = $this->message;
    $linkify = new Linkify;
    return $linkify->process($str);
  }

  /**
   * Nifty shortcut for making queries readable.
   * Usage: Clutt::sinceLastFetched()
   */
  public function scopeSinceLastFetched($query)
  {
    $last_fetched = Session::get('last-fetched', Carbon::now()->subHour());

    return $query->where('created_at', '>', $last_fetched);
  }

  //TODO: this scope doesn't work since we're not authenticating.
  public function scopeByFollowed($query)
  {
    // Guests follow everyone
    if(!Auth::check())
    {
      return $query;
    }

    return $query->whereIn('user_id', Auth::user()->following);
  }
}
