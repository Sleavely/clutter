@extends('master')

@section('scripts')
  @parent

  <script async src="//cdn.embedly.com/widgets/platform.js"></script>
  <script src="{{ asset('packages/bootstrap-maxlength/src/bootstrap-maxlength.js') }}"></script>
  <script>
  jQuery(document).ready(function(){
    jQuery('.form-control').maxlength({
      alwaysShow: true,
      validate: false,
      allowOverMax: true,
      customMaxAttribute: "90"
    });

    var validateMessageLengths = function(e){

      // Too much text
      if (jQuery('.form-control.overmax').length)
      {
        //TODO: do this more graciously?
        alert('Theres too much clutter in your new clutter. Shorten it down!');
        e.preventDefault();
        return false;
      }

      // No text at all
      if(!jQuery('textarea').val().trim().length)
      {
        //TODO: do this more graciously?
        alert('You cant clutter without some text. Type something!');
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

  @foreach ($errors as $message)
  <div class="alert alert-danger">
    <strong>Oh snap!</strong> {{ $message }}
  </div>
  @endforeach

  @if (isset($created))
  <div class="alert alert-success">
    <strong>Success!</strong> Created clutt {{ $created->id }}
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
                <label for="message">Message</label>
                <textarea id="message" name="message" class="form-control" rows="3" placeholder="Contribute with more clutter"></textarea>
              </div>
            </div>
            <br />
            <div class="row">
              <div class="col-xs-12">
                <button type="submit" class="btn btn-success">Clutter</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@stop
