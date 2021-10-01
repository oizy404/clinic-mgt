@extends("layouts.master")
    @section('title')
        ACD CLINIC
    @stop
    @section('content')

<div class="bg-image" style="background-image: url('images/acdcover.jpg'); height: 650px; width: 1360px; background-size: cover;">
        <div class="text-center">
            <button type="button" class="btn btn-primary pull-left" data-toggle="modal" data-target="#modal-dept" style="margin-top: 6px;">Log in </button>
            <img src="images/acdLogo.png" alt="acd logo" class="rounded mx-auto d-block" style="margin-top: 250px;" id="acdlogin"><br>
                <div class="container text-info">
                    <h1>Assumption College of Davao Clinic</<h1>
                </div>    
        </div>    
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="modal-dept">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <!-- modal header -->
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <center><img src="images/acdclinicLogo.jpg" alt="acd clinic logo" class="acdclinic-Logo" id="acdclinicLogo"></center>    
                            <!-- modal body -->
                            <div class="modal-body">
                                <ul class="nav nav-pills">
                                    <li class="active"><a data-toggle="pill" href="#home">Admin</a></li>
                                    <li><a data-toggle="pill" href="#menu1">Doctor</a></li>
                                    <li><a data-toggle="pill" href="#menu2">Supervisor</a></li>

                                </ul>
                                <div class="tab-content">
                                    <!-- -->
                                    <div id="home" class="tab-pane fade in active">
                                        <h3>Admin</h3>
                                        <form action="{{route('login')}}" method="post" id="admin-form">
                                        @csrf
                                        @method('post')
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="username" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="password" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" value="Login"  class="btn btn-info">Log in</button>
                                                <button class="btn btn-danger">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- -->
                                    <div id="menu1" class="tab-pane fade">
                                        <h3>Doctor</h3>
                                        <form action="{{route('loginDoctor')}}" method="post" id="doctor-form">
                                        @csrf
                                        @method('post')
                                            <div class="form-group">
                                                <input type="name" class="form-control" name="username" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="password" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" value="Login"  class="btn btn-info">Log in</button>
                                                <button class="btn btn-danger">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!--  -->
                                    <div id="menu2" class="tab-pane fade">
                                        <h3>Supervisor</h3>
                                        <form action="{{route('loginSupervisor')}}" method="post" id="supervisor-form">
                                        @csrf
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="username" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="password" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" value="Login"  class="btn btn-info signin-button-supervisor">Log in</button>
                                                <button class="btn btn-danger">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        <!-- <div class="alert alert-danger mt-3" style="display:none" role="alert">
                                        {{$errors->first()}}
                        </div>    -->

                <!-- end modal -->  
</div>

<!-- @include('pages.admin-login')
@include('pages.doctor-login')
@include('pages.supervisor-login') -->
@stop

@section('scripts')
<script>

$(function() {
    var $forms = $("form");
    $forms.focusin(function() {
        $forms.removeClass("active-form");
        $(this).addClass("active-form");        
    });

</script>   
@stop








