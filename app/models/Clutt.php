<?php
use Carbon\Carbon;
use Misd\Linkify\Linkify;

class Clutt extends Eloquent {

  // Have Eloquent automatically include dynamic values when exporting to array/JSON
  protected $appends = array(
    'html_message',
    'created_at_relative'
  );

  /**
   * Getter for $clutt->html_message
   */
  public function getHtmlMessageAttribute()
  {
    $str = $this->message;

    // Turn URLs to links
    $linkify = new Linkify;
    $str = $linkify->process($str);

    // Inject some line breaks.
    $str = nl2br($str);

    return $str;
  }

  public function getCreatedAtRelativeAttribute()
  {
    return $this->created_at->diffForHumans();
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

  public function scopeInCurrentLanguage($query)
  {
    $language = Session::get('language', 'en');

    return $query->where('language', $language);
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
