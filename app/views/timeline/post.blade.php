@extends('master')

@section('scripts')
  @parent

  <script src="{{ asset('packages/bootstrap-maxlength/src/bootstrap-maxlength.js') }}"></script>
  <script>
  jQuery(document).ready(function(){
    jQuery('.form-control').maxlength({
      alwaysShow: true,
      validate: false,
      allowOverMax: true,
      customMaxAttribute: "140"
    });

    var validateMessageLengths = function(e){

      // Too much text
      if (jQuery('.form-control.overmax').length)
      {
        //TODO: do this more graciously?
        alert('{{ trans('post.maxlength') }}');
        e.preventDefault();
        return false;
      }

      // No text at all
      if(!jQuery('textarea').val().trim().length)
      {
        //TODO: do this more graciously?
        alert('{{ trans('post.maxlength') }}');
        e.preventDefault();
        return false;
      }
    };
    // validate form before submit
    jQuery('form').on('submit', validateMessageLengths);
  });
  </script>
@overwrite

@section('content')
<div style="margin-top: 1em;">

  <!-- //TODO: multi-language! -->

  @foreach ($errors as $message)
  <div class="alert alert-danger">
    <strong>Oh snap!</strong> {{ $message }}
  </div>
  @endforeach

  @if (isset($created))
  <div class="alert alert-success">
    <strong>Success!</strong> {{ trans('post.success') }}
  </div>
  @endif

  <div class="row" style="margin-top: 1em;">
    <div class="col-sm-6 col-sm-offset-3">
      <form method="POST" action="{{ action('TimelineController@postClutter') }}">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"></h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-xs-12">
                <label for="message">{{ trans('post.message') }}</label>
                <textarea id="message" name="message" class="form-control" rows="3" placeholder="{{ trans('post.placeholder') }}"></textarea>
              </div>
            </div>
            <br />
            <div class="row">
              <div class="col-xs-12">
                <input type="hidden" name="language" value="{{ Session::get('language', 'en') }}" />
                <button type="submit" class="btn btn-success">{{ trans('post.clutter') }}</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div style="position: fixed; bottom: 0; left: 0; right: 0; height: 3em; line-height: 3em; text-align: center;">
  <a href="{{ trans('post.otherlang') }}">{{ trans('post.switchlang') }}</a>
</div>

@stop
