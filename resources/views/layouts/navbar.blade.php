<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

 
    <title>Monitoring</title>

    <!-- Page styles -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <link href="{{ asset('css/slider.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/Growth_Stock-512.png') }}">
    <link href="{{ asset('css/font_roboto.css') }}" rel="stylesheet">
    <link href="{{ asset('css/material_icon.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="material.min.css">
    <link rel="stylesheet" href="styles.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    </style>
    <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
    <!--<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>   -->
    <script src="{{'/js/app.js' }}"></script>
    <script src="material.min.js"></script>
    <script src="jquery-3.3.1.min.js"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script defer src="{{ asset('fontawesome-free-5.0.6/svg-with-js/js/fontawesome-all.min.js') }}"></script>
          

  </head>
  <body>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  
        <div class="android-header mdl-layout__header mdl-layout__header--waterfall background">
          <div class="mdl-layout__header-row">
            <span class="android-title mdl-layout-title">
              <!-- <img class="android-logo-image" src="images/"> -->
            </span>
            <!-- Add spacer, to align navigation to the right in desktop -->
            <div class="android-header-spacer mdl-layout-spacer"></div>
            <div class="android-search-box mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right mdl-textfield--full-width">
              <label class="mdl-button mdl-js-button mdl-button--icon" for="search-field">
                <i class="material-icons">search</i>
              </label>
              <div class="mdl-textfield__expandable-holder">
                <input class="mdl-textfield__input" type="text" id="search-field">
              </div>
            </div>
            <!-- Navigation -->
            <div class="android-navigation-container ">
              <nav class="android-navigation mdl-navigation ">
                <a class="mdl-navigation__link mdl-typography--text-uppercase monitoring" href="{{ url('/monitoring_cyberpatrol') }}">Monitoring CyberPatrol</a>
                <!--<a class="mdl-navigation__link mdl-typography--text-uppercase monitoring" href="{{ url('/monitoring_backend') }}">Monitoring Backend </a>-->
                <!--<a class="mdl-navigation__link mdl-typography--text-uppercase monitoring" href="{{ url('/user') }}">User</a>-->
                 
              </nav>
              </nav>
            </div>
            <span class="android-mobile-title mdl-layout-title">
             
            </span>
            <button class="android-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect transparent" id="more-button">
              <i class="material-icons">more_vert</i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect monitoring " for="more-button">
            @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="">
                                <a>
                                    {{ Auth::user()->name }} <span class="caret"> </span>
                                </a>

                                <ul class="" >
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        </ul>
             </div>
        </div>
        
        <div class="android-drawer mdl-layout__drawer">
          <span class="mdl-layout-title">
            <!-- <img class="android-logo-image" src="images//mo.png"> -->
          </span>
          <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="{{ url('/monitoring_cyberpatrol') }}">Monitoring CyberPatrol</a>
            <a class="mdl-navigation__link" href="{{ url('/monitoring_backend') }}">Monitoring Backend</a>
            <a class="mdl-navigation__link" href="{{ url('/monitoring_engine') }}">Monitoring Engine</a>
            <a class="mdl-navigation__link" href="{{ url('/user') }}">User</a>
          </nav>
        </div>
  
          @yield('content')
          <script type="text/javascript">
                  setTimeout(function(){
                      location.reload();
                  },2100000);
          </script>
</body> 
</html>