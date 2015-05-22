@extends('app')


@section('content')

<div class="row mt">

  <div class="col-md-12 col-sm-12 mb">
    <h4>Select parameters of analysis</h4>
      {!! Form::open(array('class'=>'form-inline', 'method' => 'get', 'id'=>'analysisParams')) !!}
        {!! Form::label('campaign', 'Select current campaign') !!}
        {!! Form::select('campaign', $currentCampaigns, '-- All --', array('class'=>'form-inline')) !!}
        {!! Form::label('datepicker_from', 'Select start date') !!}
        {!! Form::text('datepicker_from', null, array('class'=>'form-inline', 'id'=>'datepicker_from')) !!}
        {!! Form::label('datepicker_to', 'Select end date') !!}
        {!! Form::text('datepicker_to', null, array('class'=>'form-inline', 'id'=>'datepicker_to')) !!}
        {!! Form::token() !!}
        {!! Form::submit('Select', ['name'=>'submit','class'=>'btn btn-theme']) !!}
      {!! Form::close() !!}

  </div>
</div>
<div class="row mt">
    <div class="col-lg-4 col-md-4 col-sm-4 mb">
      <div class="darkblue-panel pn">
        <div id="profile-program">
          <div class="user">
            <img class="img-circle" width="200" src="{{URL::to('/')}}/assets/img/{{$program}}-logo.png">
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-4 mb">
        <div class="darkblue-panel pn">
            <div class="darkblue-header">
                <h3>GENERAL STATISTICS</h3>
            </div>
            <footer>
                <div class="centered">
                    <h4>Number of leads in total. Whoohoo!</h4>
                    <h3><i class="fa fa-trophy"></i> <val id="numberOfLeads">{{ $numberOfLeads }}</val></h3>
                    <h4>Number of open in total!</h4>
                    <h3><i class="fa fa-trophy"></i> <val id="numberOfOpen">{{ $numberOfOpen }}</val></h3>
                    
                </div>
            </footer>
        </div><!-- aiesecblue panel -->
    </div><!-- /col-md-4 -->
    <div class="col-md-4 col-sm-4 mb">
        <div class="green-panel pn">
          <div class="green-header">
            <h3>Conversion <val id="conversionNumber">{{ $conversionLeadToOpen }}</val>%</h3>
          </div>
        <div id="conversionLeadToOpen" style="height: 170px;"></div>

       </div>
    </div><! --/col-md-4 -->
        <!--<div class="col-md-4 col-sm-4 mb">
            <div class="darkblue-panel pn">
                <div class="darkblue-header">
                    <h3>GLOBAL CITIZEN STATISTICS</h3>
                </div>
                <footer>
                    <div class="centered">
                        <p>Number of leads in total. Whoohoo!</p>
                        <h4><i class="fa fa-trophy"></i> <val id="numberOfLeadsGC"></val></h4>
                        <p>Number of open in total!</p>
                        <h4><i class="fa fa-trophy"></i> <val id="numberOfOpenGC"></val></h4>
                        <p>Conversion rate from lead to open.</p>
                        <h4><i class="fa fa-trophy"></i> <val id="conversionLeadToOpenGC">%</val></h4>
                    </div>
                </footer>
            </div><!-- /gcitizen panel 
        </div><!-- /col-md-4 
        <div class="col-md-4 col-sm-4 mb">
            <!--<div class="darkblue-panel pn">
                <div class="darkblue-header">
                    <h3>GLOBAL TALENTS STATISTICS</h3>
                </div>
                <footer>
                    <div class="centered">
                        <p>Number of leads in total. Whoohoo!</p>
                        <h4><i class="fa fa-trophy"></i> <val id="numberOfLeadsGT"></val></h4>
                        <p>Number of open in total!</p>
                        <h4><i class="fa fa-trophy"></i> <val id="numberOfOpenGT"></val></h4>
                        <p>Conversion rate from lead to open.</p>
                        <h4><i class="fa fa-trophy"></i> <val id="conversionLeadToOpenGT">%</val></h4>
                    </div>
                </footer>
            </div><!-- /gtalents panel 
        </div><!-- /col-md-4 -->
    </div>
        <div class="row mt">
          <div class="col-lg-12">
              <div class="content-panel">
                  <h4><i class="fa fa-angle-right"></i> Leads</h4>
                  <div class="panel-body">
                      <div id="leadChart" style="height: 250px;"></div>
                  </div>
              </div>
          </div>
      </div>
      <div class="row mt">
          <div class="col-lg-12">
              <div class="content-panel">
                  <h4><i class="fa fa-angle-right"></i> Open</h4>
                  <div class="panel-body">
                      <div id="openChart" style="height: 250px;"></div>
                  </div>
              </div>
          </div>
      </div>
</div>

@endsection

@section('scripts')

<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.1.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

<script type="text/javascript">
///////////////////////////////////////////////////////
/*
*  function to get parameters from URL   
*/
///////////////////////////////////////////////////////////
  function getUrlParameter(sParam)
  {
      var sPageURL = window.location.search.substring(1);
      var sURLVariables = sPageURL.split('&');
      for (var i = 0; i < sURLVariables.length; i++) 
      {
          var sParameterName = sURLVariables[i].split('=');
          if (sParameterName[0] == sParam) 
          {
              return sParameterName[1];
          } 
      }
      return "";
  }
///////////////////////////////////////////////////////////
/*
*  Formates JavaScript standard date to format: YYYY-MM-DD   
*/
///////////////////////////////////////////////////////////
  function getFormatedDate (date) {
    var day = date.getDate();
    var month = date.getMonth()+1;
    var year = date.getFullYear();
    if(day.toString().length<2){
      day = '0'+day;
    }
    //alert(month.toString().length);
    if(month.toString().length<2){
      month = '0'+month;
    }  
    return year+'-'+month+'-'+day;
  }
 ///////////////////////////////////////////////////////////
/*
*  Populates datepicker inputs in form for default ones
*  end date: today
*  start date: 30 days before today   
*/
/////////////////////////////////////////////////////////// 
  jQuery( window ).load(function() {
    var date_from = getUrlParameter('datepicker_from');
    var date_to = getUrlParameter('datepicker_to');

    var date = new Date(date_to);
    if(date.getTime() > new Date().getTime()){
      alert("Error! End date can't be later than today.");
      date_to = getFormatedDate(new Date());
      jQuery( "#datepicker_to" ).val(date_to);
    }

    if(date_from!=""){
      jQuery( "#datepicker_from" ).val(date_from);
    } else {
      date_from = getFormatedDate(new Date(new Date().setDate(new Date().getDate()-31)));
      jQuery( "#datepicker_from" ).val(date_from);
    }

    if(date_to!=""){
      jQuery( "#datepicker_to" ).val(date_to);
    } else {
      date_to = getFormatedDate(new Date());
      jQuery( "#datepicker_to" ).val(date_to);
    }

    
    //jQuery( "#datepicker_to" ).val(getUrlParameter('datepicker_to'));
  });
///////////////////////////////////////////////////////////
/*
*  Generates datepicker jQuery tool: https://jqueryui.com/datepicker/  
*/
///////////////////////////////////////////////////////////
  jQuery(function() {
    jQuery( "#datepicker_from" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'yy-mm-dd',
      showButtonPanel: true,
      showAnim: "slide",
      onClose: function( selectedDate ) {
        $( "#datepicker_to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
  });
  jQuery(function() {
    jQuery( "#datepicker_to" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'yy-mm-dd',
      showButtonPanel: true,
      showAnim: "slide",
      maxDate: "+0D",
      onClose: function( selectedDate ) {
        $( "#datepicker_from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });

///////////////////////////////////////////////////////////
/*
*  Ajax functions to pass async request to update analysis based on form data
*/
/////////////////////////////////////////////////////////// 
  jQuery( document ).ready( function( $ ) {
    $( '#analysisParams' ).on( 'submit', function(e) {
        e.preventDefault();
        var host = "{{URL::to('/').'/'.$lc.'/'.$program}}";

        //var name = $(this).find('input[name=name]').val();
        var campaign = $('#campaign').val();
        var datepicker_from = $('#datepicker_from').val();
        var datepicker_to = $('#datepicker_to').val();
        var _token = $('input[name=_token]').val();

        $.ajax({
          type: "GET",
          url: host+'/update-analysis',
          data: {campaign:campaign, datepicker_from:datepicker_from, datepicker_to:datepicker_to, _token:_token},
          success: function( msg ) {
            //alert( msg['numberOfLeads'] );
            $('#numberOfLeads').text(msg['numberOfLeads']);
            $('#numberOfOpen').text(msg['numberOfOpen']);
            $('#conversionNumber').text(msg['conversionLeadToOpen']);
            var conversionChartData = [
              {label: "Conversion", value:  msg['conversionLeadToOpen']},
              {label: "To be done!", value: 100-msg['conversionLeadToOpen']}
            ]
            $("#leadChart").empty();
            $("#openChart").empty();
            $("#conversionLeadToOpen").empty();
            chart(conversionChartData, jQuery.parseJSON(msg['chartDataLead']), jQuery.parseJSON(msg['chartDataOpen']));
            // /$('#conversionLeadToOpen').text(msg['conversionLeadToOpen']);                        
          }
        });
    });
  });

///////////////////////////////////////////////////////////
/*
*  Ajax setup to show and hide loading spinner 
*/
///////////////////////////////////////////////////////////
  jQuery.ajaxSetup({
    beforeSend: function() {
       $('#loader').show().css("display", "table");
    },
    complete: function(){
       $('#loader').hide();
    }
  });

function chart(conversionChartData, chartDataLead, chartDataOpen){
  var keys = ["generic", "facebook", "twitter", "offline", "press", "website"];
  var leadChart = Morris.Line({
    // ID of the element in which to draw the chart.
    element: "leadChart",
    // Chart data records -- each entry in this array corresponds to a point on
    // the chart.
    data: chartDataLead,
    // The name of the data record attribute that contains x-values.
    xkey: "y",
    // A list of names of data record attributes that contain y-values.
    ykeys: keys,
    // Labels for the ykeys -- will be displayed when you hover over the
    // chart.
    labels: ["generic", "facebook", "twitter", "offline", "press", "website"],
    hideHover: 'false',


  });

  var openChart = Morris.Line({
    // ID of the element in which to draw the chart.
    element: "openChart",
    // Chart data records -- each entry in this array corresponds to a point on
    // the chart.
    data: chartDataOpen,
    // The name of the data record attribute that contains x-values.
    xkey: "y",
    // A list of names of data record attributes that contain y-values.
    ykeys: keys,
    // Labels for the ykeys -- will be displayed when you hover over the
    // chart.
    labels: ["generic", "facebook", "twitter", "offline", "press", "website"],
    hideHover: 'false',
  });

  var conversionChart = Morris.Donut({
    element: 'conversionLeadToOpen',
    colors: ["#449D44", "#DA4453"],
    formatter: function (value, data) { return value + '%'; },
    data: conversionChartData
  });
}

function start() {
  var conversionChartData = [
      {label: "Conversion", value: {{ $conversionLeadToOpen }} },
      {label: "To be done!", value: {{ 100-$conversionLeadToOpen }}}
    ]
  var chartDataLead = {!! $chartDataLead !!};
  var chartDataOpen = {!! $chartDataOpen !!};
  chart(conversionChartData, chartDataLead, chartDataOpen);
  //$('#loader').hide();
}
window.onload = start();


</script>
@endsection
