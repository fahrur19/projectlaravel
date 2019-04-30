@extends('layouts.navbar')

@section('content')
<div class="container">
<table id=""  class="table table-responsive table-bordered table-hover font-white display nowrap rgba">
    <thead class="font-size">
    <tr >
        <th width="5%" >Engine</th>
        <th width="5%" class="center">Time</th>
        <th width="5%" class="center">Medsos</th>
        <th width="5%" class="center">Action</th>

    </tr>
    </thead>
</table>
</div>
<div class="android-content mdl-layout__content container margin-top">
<table id=""  class="table table-responsive table-bordered table-hover font-white display nowrap rgba ">
    <thead class="font-size">
        <tbody class="scrollContent">
        @foreach($faks as $fak)
    <tr>

        <td width="5%">{{ $fak }}</td>
        <td width="5%" class="center" ><form  >
                        <select name="select" class="input-field select-option2" id="state">
                        <option class="" value="ALL">All</option>
                        <option class="" value="2">Crime</option></select></form>
        </td>
        <td width="5%" class="center"><form  >
                        <select name="select" class="select-option2" id="state">
                        <option class="" value="all">All</option>
                        <option class="" value="fb">FB</option>
                        <option class="" value="tw">TW</option>
                        </select></form>
        </td>
        <td width="4%" class="center">
         <button action="" class="center btn btn-primary " type="submit">Running</button>
         </td>
    </tr>
   @endforeach
    </thead>
</table>
</div>

@yield('content')

@endsection
