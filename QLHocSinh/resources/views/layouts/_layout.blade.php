<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}" type="image/x-icon"/>
    {{-- <link rel="icon" type="image/png" sizes="76x76" href="{{asset('/favicon.png')}}" /> --}}
    {{-- <link rel="icon" type="image/png" href="{{asset('assets/img/TNTT.png')}}" /> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{asset('assets/css/material-dashboard.css?v=1.2.1')}}" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('assets/css/demo.css" rel="stylesheet')}}" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-active-color="blue" data-background-color="black">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
    <div class="logo">
      <a href="dashboard.html" class="logo-mini">
        <img src="{{asset('assets/img/TNTT.png')}}" style="height: 40px;">
      </a>
      <a href=" dashboard.html" class="simple-text logo-normal">
        Quản lý học sinh
      </a>
    </div>
    <div class="sidebar-wrapper">
      <div class="user">
        <div class="photo">
          <img src="{{asset('assets/img/default-avatar.png')}}" />
        </div>
        <div class="info">
          <a data-toggle="collapse" href="#collapseExample" class="collapsed">
            <span class="holyname">
              Họ tên
              <b class="caret"></b>
            </span>
            <span>
              Chức danh
            </span>
          </a>
          <div class="clearfix"></div>
          <div class="collapse" id="collapseExample">
            <ul class="nav">
              <li>
                <a href="user.html">
                  <span class="sidebar-mini"> <i class="material-icons">edit</i></span>
                  <span class="sidebar-normal"> Thay đổi hồ sơ </span>
                </a>
              </li>
              <li>
                <a href="change_password.html">
                  <span class="sidebar-mini"> <i class="material-icons">autorenew</i></span>
                  <span class="sidebar-normal"> Đổi mật khẩu </span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="sidebar-mini"> <i class="material-icons">settings</i></span>
                  <span class="sidebar-normal"> Cài đặt hệ thống </span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <ul class="nav">
      

        <li class="active">
          <a href="./dashboard.html">
            <i class="material-icons">dashboard</i>
            <p> Bảng điều khiển
            </p>
          </a>
        </li>

        <li>
          <a data-toggle="collapse" href="#studentsManage">
            <i class="material-icons">supervised_user_circle</i>
            <p> Quản lý học sinh
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse" id="studentsManage">
            <!-- Delete class="collapse" when sub-menu is Active -->
            <ul class="nav ml-5">
              <li>
                <a href="/HocSinh/list.html">
                  <i class="material-icons">list</i>
                  <span class="sidebar-normal"> Danh sách học sinh </span>
                </a>
              </li>

              <li>
                <a href="/HocSinh/add.html">
                  <i class="material-icons">add</i>
                  <span class="sidebar-normal"> Thêm học sinh mới </span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        
        <li>
          <a data-toggle="collapse" href="#teachersManage" class="collapsed" aria-expanded="false">
            <i class="material-icons">account_circle</i>
            <p> Quản lý giáo viên
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse" id="teachersManage" aria-expanded="false" style="height: 0px;">
            <!-- Delete class="collapse" when sub-menu is Active -->
            <ul class="nav ml-5">
              <li>
                <a href="/GiaoVien/list.html">
                  <i class="material-icons">list</i>
                  <span class="sidebar-normal"> Danh sách giáo viên </span>
                </a>
              </li>

              <li>
                <a href="/GiaoVien/add.html">
                  <i class="material-icons">add</i>
                  <span class="sidebar-normal"> Thêm giáo viên mới </span>
                </a>
              </li>
            </ul>
          </div>
        </li>


        <li>
          <a data-toggle="collapse" href="#learningManage">
            <i class="material-icons">menu_book
            </i>
            <p> Quản lý học vụ
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse" id="learningManage">
            <!-- Delete class="collapse" when sub-menu is Active -->
            <ul class="nav ml-5">
              <li>
                <a href="/NamHoc/list.html">
                  <i class="material-icons">date_range</i>
                  <span class="sidebar-normal"> Quản lý năm học </span>
                </a>
              </li>

              <li>
                <a href="grade.html">
                  <i class="material-icons">description</i>
                  <span class="sidebar-normal"> Quản lý khối </span>
                </a>
              </li>

              <li>
                <a href="class.html">
                  <i class="material-icons">class</i>
                  <span class="sidebar-normal"> Quản lý lớp </span>
                </a>
              </li>

              <li>
                <a href="#">
                  <i class="material-icons">contacts</i>
                  <span class="sidebar-normal"> Phân công giảng dạy</span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        


        <li>
          <a data-toggle="collapse" href="#manageMarks">
            <i class="material-icons">folder</i>
            <p> Quản lý điểm
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse" id="manageMarks">
            <!-- Delete class="collapse" when sub-menu is Active -->
            <ul class="nav ml-5">
              <li>
                <a href="#">
                  <i class="material-icons">list_alt</i>
                  <span class="sidebar-normal"> Xem bảng điểm </span>
                </a>
              </li>
            </ul>
          </div>
        </li>

      </ul>
    </div>
  </div>

  <div class="main-panel">
    <nav class="navbar navbar-transparent navbar-absolute">
      <div class="container-fluid">
        <div class="navbar-minimize">
          <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
            <i class="material-icons visible-on-sidebar-mini">view_list</i>
          </button>
        </div>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"> Bảng điều khiển
          </a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="index.html" class="dropdown-toggle" data-toggle="dropdown">
                <button class="btn btn-danger"
                onclick="demo.showSwal('warning-message-and-confirmation')">
                <i class="material-icons">exit_to_app</i>
                <!-- Link on demo.js: warning-message-and-confirmation -->
              Đăng xuất</button>
            </a>
          </li>
          <li class="separator hidden-lg hidden-md"></li>
        </ul>
      </div>
    </div>
  </nav>
    
    @yield('content')
    
    <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        TNTT Vietnam
                    </nav>
                    <p class="copyright pull-right">
                        Được phát triển bởi QA System Development
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/material.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Library for adding dinamically elements -->
<script src="{{asset('assets/js/arrive.min.js')}}" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{asset('assets/js/moment.min.js')}}"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="{{asset('assets/js/chartist.min.js')}}"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{asset('assets/js/jquery.bootstrap-wizard.js')}}"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="{{asset('assets/js/bootstrap-notify.js')}}"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{asset('assets/js/bootstrap-datetimepicker.js')}}"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="{{asset('assets/js/jquery-jvectormap.js')}}"></script>
<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="{{asset('assets/js/nouislider.min.js')}}"></script>
<!--  Google Maps Plugin    -->
{{-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{asset('assets/js/jquery.select-bootstrap.js')}}"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="{{asset('assets/js/jquery.datatables.js')}}"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="{{asset('assets/js/sweetalert2.js')}}"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('assets/js/jasny-bootstrap.min.js')}}"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="{{asset('assets/js/fullcalendar.min.js')}}"></script>
<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{asset('assets/js/jquery.tagsinput.js')}}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{asset('assets/js/material-dashboard.js?v=1.2.1')}}"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script src="{{asset('assets/js/demo.js')}}"></script>

@yield('jsScript')

</html>