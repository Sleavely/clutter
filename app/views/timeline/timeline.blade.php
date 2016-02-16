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

      if (jQuery('.form-control.overmax').length) {
        //TODO: do this more graciously
        alert('Theres too much clutter in your new clutter. Shorten it down!');
        e.preventDefault();
        return false;
      }
    };
    //TODO: validate form before submit
    jQuery('form').on('submit', validateMessageLengths);
  });
  </script>
@overwrite

@section('content')

  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <form method="POST" action="{{ action('TimelineController@postClutter') }}">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Panel title</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-xs-12">
                <label>Message</label>
                <textarea class="form-control" rows="3" placeholder="Contribute with more clutter"></textarea>
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

  <hr />

  <div class="row">
    <div class="col-md-12">
      <button type="button" class="btn btn-primary btn-block load-new-clutts-btn"><span class="new-clutt-count">8</span> new Clutts available.</button>
    </div>
  </div>

  <div class="row">
	  <div class="col-md-12">
		  <div class="timeline">
			  <dl>
				  <dd class="pos-right clearfix">
					  <div class="circ"></div>
					  <div class="time">Apr 14</div>
					  <div class="events">
						  <div class="pull-left">
							  <img class="events-object img-rounded" src="{{ asset('packages/bootflat/img/photo-1.jpg') }}">
						  </div>
						  <div class="events-body">
							  <h4 class="events-heading">Bootstrap</h4>
							  <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</p>
                <a class="embedly-card" data-card-align="left" data-card-controls="0" href="http://joakimhedlund.com">http://joakimhedlund.com</a>
						  </div>
					  </div>
				  </dd>
				  <dd class="pos-left clearfix">
					  <div class="circ"></div>
					  <div class="time">Apr 10</div>
					  <div class="events">
						  <div class="pull-left">
							  <img class="events-object img-rounded" src="{{ asset('packages/bootflat/img/photo-2.jpg') }}">
						  </div>
						  <div class="events-body">
							  <h4 class="events-heading">Bootflat</h4>
							  <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</p>
						  </div>
					  </div>
				  </dd>
				  <dd class="pos-right clearfix">
					  <div class="circ"></div>
					  <div class="time">Mar 15</div>
					  <div class="events">
						  <div class="pull-left">
							  <img class="events-object img-rounded" src="{{ asset('packages/bootflat/img/photo-3.jpg') }}">
						  </div>
						  <div class="events-body">
							  <h4 class="events-heading">Flat UI</h4>
							  <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</p>
						  </div>
					  </div>
				  </dd>
				  <dd class="pos-left clearfix">
					  <div class="circ"></div>
					  <div class="time">Mar 8</div>
					  <div class="events">
						  <div class="pull-left">
							  <img class="events-object img-rounded" src="{{ asset('packages/bootflat/img/photo-4.jpg') }}">
						  </div>
						  <div class="events-body">
							  <h4 class="events-heading">UI design</h4>
							  <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</p>
						  </div>
					  </div>
				  </dd>

			  </dl>
		  </div>
	  </div>
	</div>
@stop
