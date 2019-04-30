@extends('layouts.navbar')

@section('content')
<div class="container">
<table id=""  class="table table-responsive table-bordered table-hover font-white display nowrap rgba width">
    <thead class="font-size">
    <tr >
        <th width="5%">No</th>  
        <th width="20%">Nama</th>
        <th width="15%" class="center">Email</th>
        <th width="15%" class="center">Level</th>
        <th width="15%" class="center">Action</th>
            
    </tr>
    </thead>
</table>
</div>
<div class="android-content mdl-layout__content container margin-top">
<table id=""  class="table table-responsive table-bordered table-hover font-white display nowrap rgba width">
    <thead class="font-size">
    <tr>
    @foreach($totals as $totals ) 
        <td width="5%">{{$totals -> id }}</td>  
        <td width="20%">{{$totals -> name }}</td>
        <td width="15%" class="center">{{$totals -> email }}</td>
        <td width="15%" class="center">{{$totals -> level }}</td>
        <td width="15%" class="center">
        <button action="" class="center btn btn-warning " type="submit">Edit</button>
        <form action="/pages.user/{{$totals->id}}"  method ="POST" >
        {{csrf_field()}}
        {{ method_field('Delete') }}
        <button class="center btn btn-danger" type="submit">Delete</button>
     </form> 
    </td>        
    </tr>
    @endforeach
    </thead>
</table>
<a class="btn btn-flat btn-primary" href="{{ url('/form') }}" > Add to User</a>
</div>
@yield('content')
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
@endsection
