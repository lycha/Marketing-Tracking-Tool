@extends('app')
@section('content')
<div class="row mt">
	<div class="col-lg-12">
		<div class="form-panel">
	  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Add Local Committee</h4>
	      {!! Form::open(array('class'=>'form-inline', 'method' => 'get', 'id'=>'add-lc')) !!}
		        {!! Form::label('expa-id', 'EXPA ID') !!}
		        {!! Form::text('expa-id', null, array('class'=>'form-inline')) !!}
            {!! Form::label('expa-name', 'EXPA Name') !!}
            {!! Form::text('expa-name', null, array('class'=>'form-inline')) !!}
            {!! Form::label('url-name', 'URL Name') !!}
            {!! Form::text('url-name', null, array('class'=>'form-inline')) !!}
            {!! Form::label('full-name', 'Full Name') !!}
            {!! Form::text('full-name', null, array('class'=>'form-inline')) !!}
		        {!! Form::hidden('id', '') !!}
		        {!! Form::token() !!}
		        {!! Form::submit('Add', ['name'=>'add-lc','class'=>'btn btn-theme']) !!}
		    {!! Form::close() !!}
		</div><!-- /form-panel -->
	</div><!-- /col-lg-12 -->
</div><!-- /row -->
<div class="row mt">
	<div class="col-lg-12">
      <div class="content-panel">
	      <table class="table table-striped table-advance table-hover">
	  	  	  <h4><i class="fa fa-angle-right"></i> Local Committees</h4>
	  	  	  <hr>
	          <thead>
	          <tr>
                <th><i class="fa fa-bookmark"></i> id</th>
	              <th><i class="fa fa-bookmark"></i> EXPA id</th>
                <th><i class="fa fa-question-circle"></i> EXPA Name</th>
                <th><i class="fa fa-question-circle"></i> URL Name</th>
	              <th><i class="fa fa-question-circle"></i> Full Name</th>
	              <th></th>
	          </tr>
	          </thead>

	           @foreach ($lcs as $lc)

	          <tbody id="lc-{{ $lc['id'] }}">
	              <tr>
                    <td id="{{ $lc['id'] }}">{{ $lc['id'] }}</td>
                    <td id="expa-id-{{ $lc['id'] }}">{{ $lc['expa_id'] }}</td>
                    <td id="expa-name-{{ $lc['id'] }}">{{ $lc['expa_name'] }}</td>
                    <td id="url-name-{{ $lc['id'] }}">{{ $lc['url_name'] }}</td>
	                  <td id="full-name-{{ $lc['id'] }}">{{ $lc['full_name'] }}</td>
	                  <td>
	                      <button data-toggle="modal" data-target="#edit-Modal" class="btn btn-primary btn-xs edit-lc" id="edit-lc-{{ $lc['id'] }}"><i class="fa fa-pencil"></i></button>
	                      <button class="btn btn-danger btn-xs delete-lc" id="delete-lc-{{ $lc['id'] }}"><i class="fa fa-trash-o "></i></button>
	                  </td>
	              </tr>
	          </tbody>
	          @endforeach
	      </table>
		</div><!-- /content-panel -->
    </div>  
</div>

<!-- Modal -->
<div class="modal fade" id="edit-Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Local Committee</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(array('class'=>'form-horizontal', 'method' => 'get', 'id'=>'edit-lc')) !!}
	        {!! Form::label('expa-id', 'EXPA ID') !!}
          {!! Form::text('expa-id', null, array('class'=>'form-control')) !!}
        </br>
          {!! Form::label('expa-name', 'EXPA Name') !!}
          {!! Form::text('expa-name', null, array('class'=>'form-control')) !!}
          </br>
          {!! Form::label('url-name', 'URL Name') !!}
          {!! Form::text('url-name', null, array('class'=>'form-control')) !!}
          </br>
          {!! Form::label('full-name', 'Full Name') !!}
          {!! Form::text('full-name', null, array('class'=>'form-control')) !!}
	        {!! Form::hidden('id', '') !!}
	        {!! Form::token() !!}
          </br>
	        {!! Form::submit('Update', ['name'=>'update-lc','class'=>'btn btn-theme']) !!}
	      {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>      				
</div><!-- /showback -->

@endsection


@section('scripts')

<script type='text/javascript'>
//var $j = jQuery.noConflict();
jQuery(document).ready(function($){

	jQuery( '.edit-lc' ).click(function(e) {
		//alert(e.target.id);
		$("#edit-lc input[name=id]").val(e.target.id.replace('edit-lc-',''));
    $("#edit-lc input[name=expa-id]").val($('#expa-id-'+e.target.id.replace('edit-lc-','')).text());
    $("#edit-lc input[name=expa-name]").val($('#expa-name-'+e.target.id.replace('edit-lc-','')).text());
    $("#edit-lc input[name=url-name]").val($('#url-name-'+e.target.id.replace('edit-lc-','')).text());
		$("#edit-lc input[name=full-name]").val($('#full-name-'+e.target.id.replace('edit-lc-','')).text());
	});

    jQuery( '#edit-lc' ).on( 'submit', function(e) {
      e.preventDefault();
      var values = jQuery(this).serialize();
      var host = "{{URL::to('/lcs/update')}}";
		
      jQuery.ajax({
            url: host,
            data: values,
            async: true,
            type: "get",
            success: function(){
            	location.reload();

                //alert("success");
                //$('#thank-you-message').show();
                //$("#result").html('Submitted successfully');
            },
            error:function(e){
              var err = e['responseText'].replace('Array', '');
              err = err.replace(/\s\s+/g, ' ')
                alert(err);
                //$('#error-message').prepend('<b>'+err+'.</b><br>').show();
                //$("#result").html('There is error while submit');
            },
            beforeSend: function() {
		       $('#loader').show().css("display", "table");
		       $("#edit-Modal").modal("hide");
		    },
		    complete: function(){
		       $('#loader').hide();
		    }
      });
      
    });

	jQuery( '#add-lc' ).on( 'submit', function(e) {
      e.preventDefault();
      var values = jQuery(this).serialize();
      var host = "{{URL::to('/lcs/add')}}";
		
      jQuery.ajax({
            url: host,
            data: values,
            async: true,
            type: "get",
            success: function(){
            	location.reload();
                //alert("success");
                //$('#thank-you-message').show();
                //$("#result").html('Submitted successfully');
            },
            error:function(e){
              var err = e['responseText'].replace('Array', '');
              err = err.replace(/\s\s+/g, ' ')
                alert(err);
                //$('#error-message').prepend('<b>'+err+'.</b><br>').show();
                //$("#result").html('There is error while submit');
            },
            beforeSend: function() {
		       $('#loader').show().css("display", "table");
		    },
		    complete: function(){
		       $('#loader').hide();
		    }
      });
    });
	jQuery( '.delete-lc' ).click( function(e) {
      e.preventDefault();
      var id = e.target.id.replace('delete-lc-','');
     // alert(id);
      ///id = jQuery(this).serialize();
      var host = "{{URL::to('/lcs/delete')}}";
		
      jQuery.ajax({
            url: host,
            data: 'id='+id,
            async: true,
            type: "get",
            success: function(){
            	location.reload();

                //alert("success");
                //$('#thank-you-message').show();
                //$("#result").html('Submitted successfully');
            },
            error:function(e){
              var err = e['responseText'].replace('Array', '');
              err = err.replace(/\s\s+/g, ' ')
                alert(err);
                //$('#error-message').prepend('<b>'+err+'.</b><br>').show();
                //$("#result").html('There is error while submit');
            },
            beforeSend: function() {
		       $('#loader').show().css("display", "table");
		    },
		    complete: function(){
		       $('#loader').hide();
		    }
      });
      
    });
});
</script>

@endsection