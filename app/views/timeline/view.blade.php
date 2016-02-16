@extends('master')

@section('scripts')
  @parent

  <script src="{{ asset('packages/VelocityJS/velocity.min.js') }}"></script>
  <script>
  jQuery(document).ready(function(){

    // too small a project to use Handlebars, lets just clone this one clutt when adding new ones.
    var $templateClutt = jQuery('#template-clutt');

    var fetchNewClutts = function(){
      var request = new XMLHttpRequest();
      request.open('GET', '/api/timeline/clutts');
      // Let Laravel know this is an AJAX request
      request.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');
      request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

      request.onreadystatechange = function () {
        if (request.readyState !== XMLHttpRequest.DONE) {
          return;
        }
        // Look for errors
        if (request.status !== 200) {
          // Bawww.
          console.log(request);
          return;
        }

        // If we got this far its probably a success
        var data = JSON.parse(request.responseText);
        console.log('Polling finished.', data);

        jQuery.each(data, function(i, clutt){
          // Use the template
          var $newClutt = $templateClutt.clone();
          // Put the relevant text in it
          $newClutt.find('.message').text(clutt.text);
          // Prepare its position in the DOM
          $newClutt.prependTo('#clutts');
          // ...aaaaand ANIMATE CANNONS!
          $newclutt.velocity('slideDown');
        });
      };
      request.send();
    };

    // Load some initial Clutts and look for 'em every once in a while
    fetchNewClutts();
    setInterval(fetchNewClutts, 5000)
  });
  </script>
@overwrite

@section('content')
<div style="margin-top: 1em;">

  <!-- //TODO: multi-language! -->

  <div id="clutts"></div>

  <div id="template-clutt" class="row clutt" style="display: none;">
    <div class="col-sm-6 col-sm-offset-3">
      <div class="message"></div>
    </div>
  </div>
</div>

@stop
