@extends('app')
@section('content')

@if ($url != '')

<div class="row mt">
	<div class="col-lg-12">
      <div class="form-panel">
          <h3>Your URL is generated!</h3>
          <h4>{{ $url }}</h4>
          
          
      </div>
    </div>  
</div>
@endif
<div class="row mt">
	<div class="col-lg-12">
		<div class="form-panel">
			<h4>Generate your tracking URL!</h4>

		      {!! Form::open(array('class'=>'form-horizontal style-form', 'url' => '/generate-url/generate', 'method' => 'get', 'id'=>'url_generator_form')) !!}
		        <div class="form-group">
		        	{!! Form::label('program', 'Which program you want to promote?',array('class'=>'col-sm-2 col-sm-2 control-label')) !!}
		        	<div class="col-sm-10">
		        		{!! Form::select('program', $programs, '- choose program -', array('class'=>'form-control')) !!}
		        	</div>
		        </div>
		        <div class="form-group">
		        	{!! Form::label('bucket', 'Which bucket will you promote?',array('class'=>'col-sm-2 col-sm-2 control-label')) !!}
		        	<div class="col-sm-10">
		        		{!! Form::select('bucket', $buckets, 'null', array('class'=>'form-control')) !!}
		        	</div>
		        </div>
		        <div class="form-group">
		        	{!! Form::label('source', 'Where you will promote it?',array('class'=>'col-sm-2 col-sm-2 control-label')) !!}
		        	<div class="col-sm-10">
		        		{!! Form::select('source', $sources, '- choose source -', array('class'=>'form-control')) !!}
		        	</div>
		        </div>
		        <div class="form-group">
		        	{!! Form::label('medium', 'Which medium will you use?',array('class'=>'col-sm-2 col-sm-2 control-label')) !!}
		        	<div class="col-sm-10">
		        		{!! Form::select('medium', $mediums, 'null', array('class'=>'form-control')) !!}
		        	</div>
		        </div>
		        <div class="form-group">
		        	{!! Form::label('campaign', 'Choose current campaign.',array('class'=>'col-sm-2 col-sm-2 control-label')) !!}
		        	<div class="col-sm-10">
		        		{!! Form::select('campaign', $campaigns, '- choose campaign -', array('class'=>'form-control')) !!}
		        	</div>
		        </div>
		        <div class="form-group">
		        	{!! Form::label('lc', 'LC name',array('class'=>'col-sm-2 col-sm-2 control-label')) !!}
		        	<div class="col-sm-10">
		        		{!! Form::select('lc', $lcs, '- choose LC -', array('class'=>'form-control')) !!}
		        	</div>
		        </div>
		        <div class="form-group">
		        	{!! Form::label('uni-website', 'AIESEC University website.',array('class'=>'col-sm-2 col-sm-2 control-label')) !!}
		        	<div class="col-sm-10">
		        		{!! Form::text('uni-website', 'http://', array('class'=>'form-control', 'disabled')) !!}
		        	</div>
		        </div>
		        {!! Form::token() !!}
		        {!! Form::submit('Generate', ['name'=>'submit','class'=>'btn btn-theme']) !!}
		      {!! Form::close() !!}

@endsection


@section('scripts')
<script type="text/javascript">
var optionsAsString = "";
    $( "#source" ).change(function() {
        var source = $( "#source" ).val();
        switch(source) {
            case 'facebook':
                optionsAsString = "";
                optionsAsString += "<option value='paid'>Paid Post</option>";
                optionsAsString += "<option value='standard'>Standard Post</option>";
                $( 'select[name="medium"]' ).find('option').remove().end().append( optionsAsString );
                break;
            case 'twitter':
                optionsAsString = "";
                optionsAsString += "<option value='standard'>Standard Post</option>";
                $( 'select[name="medium"]' ).find('option').remove().end().append( optionsAsString );
                break;
            case 'offline':
                optionsAsString = "";
                optionsAsString += "<option value='leaflets'>Leaflets</option>";
                optionsAsString += "<option value='posters'>Posters</option>";
                optionsAsString += "<option value='citilights'>Citilights</option>";
                $( 'select[name="medium"]' ).find('option').remove().end().append( optionsAsString );
                break;
            case 'press':
                optionsAsString = "";
                optionsAsString += "<option value='standard'>Standard Post</option>";
                $( 'select[name="medium"]' ).find('option').remove().end().append( optionsAsString );
                break;
            case 'lc-website':
                optionsAsString = "";
                optionsAsString += "<option value='standard'>Standard Post</option>";
                $( 'select[name="medium"]' ).find('option').remove().end().append( optionsAsString );
                break;
            default:
                optionsAsString = "You need to choose source first!";
                $( 'select[name="medium"]' ).find('option').remove().end().append( optionsAsString );
        } 
    });
    $( "#program" ).change(function() {			
        var program = $( "#program" ).val();
        switch(program) {
            case 'gt':
                optionsAsString = "";
                optionsAsString += "<option value=''>General</option>";
                optionsAsString += "<option value='mkt'>Marketing</option>";
                optionsAsString += "<option value='it'>IT</option>";
                optionsAsString += "<option value='b'>Business</option>";
                optionsAsString += "<option value='edu'>Education</option>";
                $( 'select[name="bucket"]' ).find('option').remove().end().append( optionsAsString );
                $('#uni-website').prop("disabled", true);
                break;
            case 'gc':
                optionsAsString = "";
                optionsAsString += "<option value=''>General</option>";
                optionsAsString += "<option value='man'>Management</option>";
                optionsAsString += "<option value='wi'>World Issues</option>";
                optionsAsString += "<option value='cul'>Culture</option>";
                $( 'select[name="bucket"]' ).find('option').remove().end().append( optionsAsString );
                $('#uni-website').prop("disabled", true);
                break;
            case 'au':
            	optionsAsString = "";
            	$( 'select[name="bucket"]' ).find('option').remove().end().append( optionsAsString );
            	$('#uni-website').prop("disabled", false);
            	break;
            case 'gh':
            	optionsAsString = "";
            	$( 'select[name="bucket"]' ).find('option').remove().end().append( optionsAsString );
            	$('#uni-website').prop("disabled", true);
            	break;
            case 'fl':
            	optionsAsString = "";
            	optionsAsString += "<option value=''>General</option>";
                optionsAsString += "<option value='soc-entr'>Social Entrepreneur</option>";
                optionsAsString += "<option value='mkt'>Marketing</option>";
                optionsAsString += "<option value='bus-sales'>Business Sales</option>";
            	$( 'select[name="bucket"]' ).find('option').remove().end().append( optionsAsString );
            	$('#uni-website').prop("disabled", true);
            	break;
            default:
                optionsAsString = "you need to choose program first!";
                $( 'select[name="bucket"]' ).find('option').remove().end().append( optionsAsString );
                $('#uni-website').prop("disabled", true);
                break;
        } 
    });
</script>

@endsection