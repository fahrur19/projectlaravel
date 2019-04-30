@extends('layouts.navbar')

@section('content')
<div id="time-range" class="container slider">                            
  <div class="dropdown range">
    <button class="btn btn-primary dropdown-toggle range" type="button" data-toggle="dropdown">Range Time
    <span class="caret"></span></button>
    <ul id="time-range" class="dropdown-menu">
    <p><span class="slider-time rgba">9:00 AM</span>   <label id="slider-range"></label>  <span class="slider-time2 rgba">5:00 PM</span>
    <button class "btn btn-primary" type="button" onclick="range();">save</button>
    <button class "btn btn-primary" type="button" onclick="reset();">reset</button>
    </p>
    </ul>
  </div>
</div>
<div class="container ">
<table id=""  class="table table-responsive table-bordered table-hover font-white display nowrap rgba">
    <thead class="font-size">
          <tbody class="scrollContent">
    <tr >
        <!--<th>Id</th>  -->
        <th width="6.5%" class="center">date</th>
        <th width="5%" class="center">Batch</th>
        <th width="5%" class="center">Total Hbase</th>
        <th width="5%" class="center">Total Filter</th>
        <th width="5%" class="center">Total Issue</th>
        <th width="5%" class="center">Start Time</th>
        <th width="5%" class="center">End Time</th>
            
    </tr>
    </tbody>
    </thead>
</table>
</div>

<div class="android-content mdl-layout__content container margin-top">
<table id=""  class="table table-responsive table-bordered table-hover font-white display nowrap rgba ">
    <thead class="font-size">
        <tbody class="scrollContent">
        @foreach($jmlhs as $jmlh)
    <tr>
   
        <!--<td width="5%">{{ $jmlh['id'] }}</td>  -->
        <td width="5%" class="center">{{ $jmlh['date'] }}</td>
        <td width="5.5%" class="center">{{ $jmlh['batch'] }}</td>
        <td width="5.5%" class="center">{{ $jmlh['total_hbase'] }}</td>
        <td width="5.5%" class="center">{{ $jmlh['total_filter'] }}</td>
        <td width="5%" class="center">{{ $jmlh['total_issue'] }}</td>
        <td width="5%" class="center">{{ $jmlh['start_time'] }}</td>
        <td width="5%" class="center">{{ $jmlh['end_time'] }}</td>
    
    </tr>
   @endforeach
   </tbody>
    </thead>
</table>
</div>



@yield('content')
<link href="{{ asset('jquery/jquery-ui.css') }}" rel="stylesheet">
<script src="{{ asset('jquery/jquery-ui.js') }}"></script>
<script>
$(document).ready(function(){
  $(".dropdown").on("hide.bs.dropdown", function(){
    $(".btn").html('Dropdown <span class="caret"></span>');
  });
  $(".dropdown").on("show.bs.dropdown", function(){
    $(".btn").html('Dropdown <span class="caret caret-up"></span>');
  });
});
</script>
<script>
var st1 = 540, st2 = 1020 
var rounded,prevtime ;
var batchperiod = 30;

$("#slider-range").slider({
    range: true,
    min: 0,
    max: 1440,
    step: 30,
    values: [st1, st2],
    slide: function (e, ui) {
        console.log('update time', ui.values[0], ui.values[1])
        var hours1 = Math.floor(ui.values[0] / 60);
        var minutes1 = ui.values[0] - (hours1 * 60);
        st1 = ui.values[0];
        st2 = ui.values[1];
       
        if (hours1.length == 1) hours1 = '0' + hours1;
        if (minutes1.length == 1) minutes1 = '0' + minutes1;
        if (minutes1 == 0) minutes1 = '00';
        if (hours1 >= 12) {
            if (hours1 == 12) {
                hours1 = hours1;
                minutes1 = minutes1 + " PM";
            } else {
                hours1 = hours1 - 12;
                minutes1 = minutes1 + " PM";
            }
        } else {
            hours1 = hours1;
            minutes1 = minutes1 + " AM";
        }
        if (hours1 == 0) {
            hours1 = 12;
            minutes1 = minutes1;
        }



        $('.slider-time').html(hours1 + ':' + minutes1);

        var hours2 = Math.floor(ui.values[1] / 60);
        var minutes2 = ui.values[1] - (hours2 * 60);

        if (hours2.length == 1) hours2 = '0' + hours2;
        if (minutes2.length == 1) minutes2 = '0' + minutes2;
        if (minutes2 == 0) minutes2 = '00';
        if (hours2 >= 12) {
            if (hours2 == 12) {
                hours2 = hours2;
                minutes2 = minutes2 + " PM";
            } else if (hours2 == 24) {
                hours2 = 11;
                minutes2 = "59 PM";
            } else {
                hours2 = hours2 - 12;
                minutes2 = minutes2 + " PM";
            }
        } else {
            hours2 = hours2;
            minutes2 = minutes2 + " AM";
        }

        $('.slider-time2').html(hours2 + ':' + minutes2);
    }
});

</script>
<script>
Date.prototype.yyyymmdd = function() {
    var mm = this.getMonth() + 1; // getMonth() is zero-based
    var dd = this.getDate();

    return [this.getFullYear(),
        (mm>9 ? '' : '0') + mm,
        (dd>9 ? '' : '0') + dd
    ].join('');
}; 
function range(){
    var coeff = 1000 * 60 * batchperiod; 
    var dt = new Date();
    var prevtime;
    rounded = new Date(Math.floor(dt.getTime() / coeff) * coeff)
    prevtime = new Date(rounded - (batchperiod * 60 * 1000));

    var rd = (rounded.getHours()*60) + rounded.getMinutes();
        var pd = (prevtime.getHours()*60) + prevtime.getMinutes();
        var starthour = Math.floor((st1)/60)
        var startminute = st1 - (starthour*60)
        var stophour = Math.floor((st2)/60)
        var stopminute = st2 - (stophour*60)
        var starthourstring = ((starthour.toString().length < 2) ? '0'+starthour.toString() : starthour.toString());
        var stophourstring = ((stophour.toString().length < 2) ? '0'+stophour.toString() : stophour.toString());
        var startminutestring = ((startminute.toString().length < 2) ? startminute.toString()+'0' : startminute.toString());
        var stopminutestring = ((stopminute.toString().length < 2) ? stopminute.toString()+'0' : stopminute.toString());
        if (st2 == rd){// jika slider akhir sama dengan rounded
            if (st1 == pd){// jika slider awal sama dengan prevtime
                $('.timetxt').html(batchtext);
                withstream = true;
            } else {
                var hh = Math.floor((st2 - st1)/60);
                var hhx = hh > 1 ? hh + " hours " : hh + " hour ";
                var mm = (st2 - st1) - (hh * 60);
                var mmx = mm == 30 ? mm + " mins" : "";
                $('.timetxt').html(hhx + mmx);
                withstream = true;
            }
        } else {// jika slider akhir lebih kecil
            $('.timetxt').html( $('.slider-time').html() + " - " + $('.slider-time2').html() );
            withstream = false;
        }
         var start = starthourstring+startminutestring;
         var stop = stophourstring+stopminutestring;
        //  var datenow = new Date().yyyymmdd();
          start = start;
          stop =  stop;
          console.log("date", start+ '-' +stop)
          document.location.href = '/monitoring_backend?s_time='+start+'&e_time='+stop;

    
}
    function reset(){
        console.log()
        document.location.href = '/monitoring_backend';
    }
</script>
@endsection
