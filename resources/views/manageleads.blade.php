@extends('app')
@section('content')
<div class="row mt">
	<div class="col-lg-12">
		<div class="form-panel">
	  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Add Lead</h4>
	      {!! Form::open(array('class'=>'form-inline', 'method' => 'get', 'id'=>'add-lead')) !!}
		        {!! Form::label('name', 'Name') !!}
		        {!! Form::text('name', null, array('class'=>'form-inline')) !!}
		        {!! Form::label('lc', 'LC') !!}
		        {!! Form::select('lc', $lcs, '-- All --', array('class'=>'form-inline')) !!}
		        {!! Form::hidden('id', '') !!}
		        {!! Form::token() !!}
		        {!! Form::submit('Add', ['name'=>'add-lead','class'=>'btn btn-theme']) !!}
		    {!! Form::close() !!}
		</div><!-- /form-panel -->
	</div><!-- /col-lg-12 -->
</div><!-- /row -->
<div class="row mt">
	<div class="col-lg-12">
      <div class="content-panel">
	      <table class="table table-striped table-advance table-hover">
	  	  	  <h4><i class="fa fa-angle-right"></i> EXPA Leads</h4>
	  	  	  <hr>
	          <thead>
	          <tr>
	              <th><i class="fa fa-bookmark"></i> id</th>
	              <th><i class="fa fa-question-circle"></i> Name</th>
	              <th><i class="fa fa-edit"></i> LC</th>
	              <th></th>
	          </tr>
	          </thead>
	           @foreach ($leads as $lead)

	          <tbody id="lead-{{ $lead['id'] }}">
	              <tr>
	                  <td id="{{ $lead['id'] }}">{{ $lead['id'] }}</td>
	                  <td id="keywords-{{ $lead['id'] }}">{{ $lead['keywords'] }}</td>
	                  <td id="lc-{{ $lead['id'] }}">{{ $lead['lc'] }} </td>
	                  <td>
	                      <button data-toggle="modal" data-target="#edit-Modal" class="btn btn-primary btn-xs edit-lead" id="edit-lead-{{ $lead['id'] }}"><i class="fa fa-pencil"></i></button>
	                      <button class="btn btn-danger btn-xs delete-lead" id="delete-lead-{{ $lead['id'] }}"><i class="fa fa-trash-o "></i></button>
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
        <h4 class="modal-title" id="myModalLabel">Edit lead</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(array('class'=>'form-inline', 'method' => 'get', 'id'=>'edit-lead')) !!}
	        {!! Form::label('name', 'Name') !!}
	        {!! Form::text('name', null, array('class'=>'form-inline')) !!}
	        {!! Form::label('lc', 'LC') !!}
	        {!! Form::select('lc', $lcs, '-- All --', array('class'=>'form-inline')) !!}
	        {!! Form::hidden('id', '') !!}
	        {!! Form::token() !!}
	        {!! Form::submit('Update', ['name'=>'update-lead','class'=>'btn btn-theme']) !!}
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

	jQuery( '.edit-lead' ).click(function(e) {
		//alert(e.target.id);
		$("#edit-lead input[name=id]").val(e.target.id.replace('edit-lead-',''));
		$("#edit-lead input[name=name]").val($('#keywords-'+e.target.id.replace('edit-lead-','')).text());
		$("#edit-lead input[name=lc]").val($('#lc-'+e.target.id.replace('edit-lead-','')).text());
	});

    jQuery( '#edit-lead' ).on( 'submit', function(e) {
      e.preventDefault();
      var values = jQuery(this).serialize();
      var host = "{{URL::to('/expa-leads/update')}}";
		
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

	jQuery( '#add-lead' ).on( 'submit', function(e) {
      e.preventDefault();
      var values = jQuery(this).serialize();
      var host = "{{URL::to('/expa-leads/add')}}";
		
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
	jQuery( '.delete-lead' ).click( function(e) {
      e.preventDefault();
      var id = e.target.id.replace('delete-lead-','');
     // alert(id);
      ///id = jQuery(this).serialize();
      var host = "{{URL::to('/expa-leads/delete')}}";
		
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