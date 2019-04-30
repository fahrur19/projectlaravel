@extends('layouts.navbar')

@section('content')


<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

<div class="container">
<form  name="form" action="/get" method="get">
    <select name="select" class="select-option" id="state">
    <option class="" value="ALL">All</option>
    <option class="" value="2">Crime</option>
    <option class="" value="3">PKI</option>
    <option class="" value="5">AUR</option>
    <option class="" value="6">Hate Speech</option>
    <option class="" value="7">Setya Novanto</option>
    <option class="" value="8">Issue Papua</option>
    <option class="" value="9">Issue Infrastruktur</option>
    <option class="" value="10">Kriminal</option>
    <option class="" value="11">Novel Baswedan</option>
    <option class="" value="12">Barang Bukti Demokrat atas Irjen Sarafudin</option>
    <option class="" value="13">Mega Korupsi Kondesat</option>
    <option class="" value="14">POLRI</option>
    <option class="" value="15">BUMN</option>
    <option class="" value="16">Kasus Video Anak</option>
    <option class="" value="17">Kasus Video Anak-2</option>
    <option class="" value="18">BOMS</option>
    <option class="" value="19">Polri & Teroris</option>
    <option class="" value="20">Politik Kotor</option>
    <option class="" value="21">Topic lll</option>
    <option class="" value="22">Narkoba</option>
    <option class="" value="23">Kalijodo</option>
    <option class="" value="24">Arema</option>
    <option class="" value="25">Pit Gubernur</option>
    <option class="" value="26">ToraBora</option>
    <option class="" value="27">Puncak & Sukabumi Longsor</option>
    </select>
</form>
<button class="btn btn-success btn-lg category" data-toggle="modal" data-target="#modalForm">+ Category</button>
<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content background-color">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Tambah Kategori</h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form action="kategory" method="POST" role="form">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="inputName">Masukan Category</label>
                        <input type="text" class="form-control font-white rgba input-tranparent" id="inputName" placeholder="Enter your name"/>
                    </div>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">Save</button>
            </div>
        </div>
    </div>
</div>
</div>
    <div  class="container android-content mdl-layout__content  ">
    <table id="example" class="table-responsive table-bordered table-hover display nowrap font-white rgba " >
        <thead  class="font-size fixedHeader">
            <tr >
                 
                <td width="5%" class="no-sort" ></td>
                <td width="20%"><i class="far fa-clock" size="7px" style="width: 4em"></i></td>
                <td width="15%" class="center"><i class="fab fa-accusoft"></i></td>
                <td width="15%" class="center"><i class="fab fa-facebook"></i></td>
                <td width="15%" class="center"><i class="fab fa-twitter"></i></td>
                <td width="15%" class="center"><i class="fab fa-instagram"></i></td>
                <td width="15%" class="center"><i class="fab fa-google-plus-g"></i></td>     
            </tr>
        </thead>
        <tbody class="scrollContent">
            @foreach($hasil as $hasil)
            <tr>
                <td width="5%" class="table-responsive table-bordered table-hover details-control font-white rgba "></td>
                <td width="20%">{{ $hasil['date_time'] }}</td>
                <td width="15%" class="center">@if ($hasil['all_sosmed'] == '1') <i class="fas fa-check color-icon2"></i> @else<i class="fas fa-ban color-icon"></i> @endif</td>
                <td width="15%" class="center">@if ($hasil['facebook'] == '1')<i class="fas fa-check color-icon2"></i> @else <i class="fas fa-ban color-icon"></i> @endif</td>
                <td width="15%" class="center">@if ($hasil['twitter'] == '1') <i class="fas fa-check color-icon2"></i> @else <i class="fas fa-ban color-icon"></i> @endif</td>
                <td width="15%" class="center">@if ($hasil['instagram'] == '1') <i class="fas fa-check color-icon2"></i> @else <i class="fas fa-ban color-icon"></i> @endif</td>
                <td width="15%" class="center">@if ($hasil['googleplus'] == '1') <i class="fas fa-check color-icon2"></i> @else <i class="fas fa-ban color-icon"></i> @endif</td>
                <td>

                   
                    <table width="100%">
                    
                        <tr><td width="5%">Total issue =</td><td width="50%">{{$hasil['total_issue']}}</td></tr>
                        <tr><td width="5%">Total post =</td><td width="50%">{{$hasil['total_post']}}</td></tr>
                        <tr><td width="5%">Volume =</td><td width="50%">{{$hasil['volume']}}</td></tr>
                    
                    </table>
                   
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    </div>  
</div>  
              @yield('content')
              

<script>  
$( "#state" ).change(function() {
    var state = $(this).val();
    // alert(state);
    window.location.assign("/monitoring_cyberpatrol?select="+state)
});
$(document).ready(function() {
    var table = $('#example').DataTable({
        
      "scrollY": "5000px",
      "scrollCollapse": true,
      "bPaginate": false,
      "bFilter": false,
      "bInfo": false,
      "order": [[ 3, "desc" ]],
      "columnDefs": [ { targets: [7], visible: false}]
      
    
    });


      // Add event listener for opening and closing details
      $('#example').on('click', 'td.details-control', function () {
          var tr = $(this).closest('tr');
          var row = table.row(tr);

          if (row.child.isShown()) {
              // This row is already open - close it
              row.child.hide();
              tr.removeClass('shown');
          } else {
              // Open this row
              row.child(format(row.data())).show();
              tr.addClass('shown');
          }
      });

      function format(value) {

          console.log(value)
          return '<div>' + value[7] + '</div>';
      }

    //   table.processing( true );

    //   setTimeout( function () {
    //       table.processing( false );
    //       $('#bodyissue').show();
    //   }, 3000 );
});  

          

</script>  
              
@endsection