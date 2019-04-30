@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 ">
            <div class="panel panel-default form">
                <div class="panel-heading form">Form User</div>
                
                <div class="panel-body">
                <div class="title m-b-md">
                <div class="android-content mdl-layout__content container margin-top">
                </div>
                    
                        <form action="user" method="POST">
                        <table class="table table-responsive">
                        {{csrf_field()}}
                        
                        <div class="container text-center">    
                        <div class="row content">
                        <div class="col-sm-7">
                        <div class="form-group">
                            <label for="inputsm">Nama :</label>
                            <input class="form-control form" id="name" name='name' type="text">
                        </div>
                        <div class="form-group">
                            <label for="inputdefault">Email :</label>
                            <input class="form-control form" id="email" name='email' type="email">
                        </div>
                        <div class="form-group">
                            <label for="inputdefault">Password :</label>
                            <input class="form-control form" id="password" name='password' type="password">
                        </div>
                        <div class="form-group">
                            <label for="inputlg" name='level' >Level :</label>
                            <input type="radio" name='level' value='admin'>admin </br>
                            <input type="radio" name='level' value='operator'>opertor </br>
                          
                        </div>
                                <button class="btn btn-flat btn-primary" name="btnIn"> SIMPAN </button>
                            </div>
                            </div>
                            </div>
                        </table>
                        </form>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
@yield('content')

@endsection