@extends('layouts.dashboardmaster')
@section('content')
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">

            <!-- Page-body start -->
            <div class="page-body">
                <!-- Row start -->
                <div class="row">
                    <!-- Multiple Open Accordion start -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-header-text">Profile</h5>
                            </div>
                            <div class="card-block accordion-block ">


                                @if ($errors->has('name') || $errors->has('error_pass'))
                                    <div id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="accordion-panel">
                                            <div class="accordion-heading" role="tab" id="headingOne">
                                                <h3 class="card-title accordion-title">
                                                    <a class="accordion-msg waves-effect waves-dark scale_active" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        Profile Details
                                                    </a>
                                                </h3>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="accordion-content accordion-desc">
                                                    <div class="accordion-panel">
                                                        <div class="accordion-heading" role="tab" id="headingName">
                                                            <h3 class="card-title accordion-title">
                                                                <a class="accordion-msg waves-effect waves-dark scale_active" data-toggle="collapse" data-parent="#accordionProfile" href="#collapseName" aria-expanded="true" aria-controls="collapseName">
                                                                    Change Name
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        <div id="collapseName" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingName">
                                                            <div class="accordion-content accordion-desc">
                                                                <form action="{{route('profile.name')}}" method="POST" class="form-material" id="name_ID">
                                                                    @csrf
                                                                    <div class="ml-5">
                                                                        <label for="">New Name</label>
                                                                        <div class="form-group form-primary form-static-label">
                                                                            <input type="text"  class="form-control @error('name') is-invalid @enderror" placeholder="Type new name" name="name" value="{{old('name')}}">
                                                                            @error('name')
                                                                                <p class="text-danger">{{$message}}</p>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group form-primary form-static-label">
                                                                            <input type="password"  class="form-control @error('password') is-invalid @enderror" placeholder="password" name="password">
                                                                            @error('password')
                                                                                <p class="text-danger">{{$message}}</p>
                                                                            @enderror

                                                                            @error('error_pass')
                                                                                <p class="text-danger">{{$message}}</p>
                                                                            @enderror
                                                                        </div>
                                                                        <button class="btn waves-effect waves-light btn-primary btn-skew" type="submit">Save</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Add other sections here if needed -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else

                                    @if ($errors->has('current_password') || $errors->has('password') || $errors->has('old_pass'))

                                    <div id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="accordion-panel">
                                            <div class="accordion-heading" role="tab" id="headingOne">
                                                <h3 class="card-title accordion-title">
                                                    <a class="accordion-msg waves-effect waves-dark scale_active" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        Profile Details
                                                    </a>
                                                </h3>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="accordion-content accordion-desc">
                                                    <div class="accordion-panel">
                                                        <div class="accordion-heading" role="tab" id="headingName">
                                                            <h3 class="card-title accordion-title">
                                                                <a class="accordion-msg waves-effect waves-dark scale_active" data-toggle="collapse" data-parent="#accordionProfile" href="#collapseName" aria-expanded="true" aria-controls="collapseName">
                                                                    Change Password
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        <div id="collapseName" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingName">
                                                            <div class="accordion-content accordion-desc">
                                                                <form action="{{route('profile.password')}}" method="POST" class="form-material" id="name_ID">
                                                                    @csrf
                                                                    <div class="ml-5">
                                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Old Passwoed</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="inputEmail3" placeholder="Old Passwoed" name="current_password" value="{{old('current_password')}}">
                                                                            @error('current_password')
                                                                                <p class="text-danger">{{$message}}</p>
                                                                            @enderror
                                                                            @error('old_pass')
                                                                            <p class="text-danger">{{$message}}</p>
                                                                            @enderror

                                                                        </div>

                                                                        <div class="form-group form-primary form-static-label">
                                                                            <label for="inputEmail3" class="col-sm-3 col-form-label">New Passwoed</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputEmail3" placeholder="new password" name="password" value="{{old('password')}}">
                                                                                @error('password')
                                                                                    <p class="text-danger">{{$message}}</p>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group form-primary form-static-label">
                                                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Confirm Passwoed</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="inputEmail3" placeholder="password confirmation" name="password_confirmation" value="{{old('password_confirmation')}}">
                                                                                @error('password_confirmation')
                                                                                    <p class="text-danger">{{$message}}</p>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                        <button class="btn waves-effect waves-light btn-primary btn-skew" type="submit">Save</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Add other sections here if needed -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @endif
                                    <div id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="accordion-panel">
                                            <div class="accordion-heading" role="tab" id="headingOne">
                                                <h3 class="card-title accordion-title">
                                                    <a class="accordion-msg waves-effect waves-dark scale_active collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                    profile Delails
                                                </a>
                                            </h3>
                                        </div>

                                        <div id="collapseOne" class="panel-collapse in collapse" role="tabpanel" aria-labelledby="headingOne" style="">
                                            <div class="accordion-content accordion-desc">
                                                <p>
                                                    <div id="accordionEmail" role="tablist" aria-multiselectable="true">
                                                        <div class="accordion-panel">
                                                            <div class="accordion-heading" role="tab" id="headingEmail">
                                                                <h3 class="card-title accordion-title">
                                                                    <a class="accordion-msg waves-effect waves-dark scale_active collapsed" data-toggle="collapse" data-parent="#accordionEmail" href="#collapseEmail" aria-expanded="false" aria-controls="collapseOne">
                                                                    View Email
                                                                </a>
                                                            </h3>
                                                        </div>

                                                        <div id="collapseEmail" class="panel-collapse in collapse" role="tabpanel" aria-labelledby="headingEmail" style="">
                                                            <div class="accordion-content accordion-desc">
                                                                <p>
                                                                    {{Auth::user()->email}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-panel">
                                                        <div class="accordion-heading" role="tab" id="headingName">
                                                            <h3 class="card-title accordion-title">
                                                                <a class="accordion-msg waves-effect waves-dark scale_active collapsed" data-toggle="collapse" data-parent="#accordionProfile" href="#collapseName" aria-expanded="false" aria-controls="collapseTwo">
                                                                    Change Name
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        <div id="collapseName" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingName" style="">
                                                            <div class="accordion-content accordion-desc">
                                                                <p>
                                                                    <form action="{{route('profile.name')}}" method="POST" class="form-material" id="name_ID">
                                                                        @csrf
                                                                        <div class="ml-5">
                                                                            <label for="">New Name</label>
                                                                            <div class="form-group form-primary form-static-label">
                                                                                <input type="text"  class="form-control @error('name') is-invalid @enderror" placeholder="Type new name" name="name" >
                                                                                @error('name')
                                                                                    <p class="text-danger">{{$message}}</p>
                                                                                @enderror
                                                                            </div>

                                                                            <div class="form-group form-primary form-static-label">
                                                                                <input type="password"  class="form-control @error('password') is-invalid @enderror" placeholder="password" name="password" >
                                                                                @error('password')
                                                                                    <p class="text-danger">{{$message}}</p>
                                                                                @enderror
                                                                            </div>
                                                                            <button class="btn waves-effect waves-light btn-primary btn-skew" type="submit">Save</button>
                                                                        </div>
                                                                    </form>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="accordion-panel">
                                                        <div class="accordion-heading" role="tab" id="headingPassword    ">
                                                            <h3 class="card-title accordion-title">
                                                                <a class="accordion-msg waves-effect waves-dark scale_active collapsed" data-toggle="collapse" data-parent="#accordionProfile" href="#collapsePassword" aria-expanded="false" aria-controls="collapseTwo">
                                                                    Change Password
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        <div id="collapsePassword" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingPassword" style="">
                                                            <div class="accordion-content accordion-desc">
                                                                <p>
                                                                    <form action="{{route('profile.password')}}" method="POST" class="form-material" id="name_ID">
                                                                        @csrf
                                                                        <div class="ml-5">
                                                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Old Passwoed</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="inputEmail3" placeholder="Old Passwoed" name="current_password" value="{{old('current_password')}}">
                                                                                @error('current_password')
                                                                                    <p class="text-danger">{{$message}}</p>
                                                                                @enderror
                                                                                @error('error_pass')
                                                                                <p class="text-danger">{{$message}}</p>
                                                                                @enderror

                                                                            </div>

                                                                            <div class="form-group form-primary form-static-label">
                                                                                <label for="inputEmail3" class="col-sm-3 col-form-label">New Passwoed</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputEmail3" placeholder="new password" name="password" value="{{old('password')}}">
                                                                                    @error('password')
                                                                                        <p class="text-danger">{{$message}}</p>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group form-primary form-static-label">
                                                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Confirm Passwoed</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="inputEmail3" placeholder="password confirmation" name="password_confirmation" value="{{old('password_confirmation')}}">
                                                                                    @error('password_confirmation')
                                                                                        <p class="text-danger">{{$message}}</p>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <button class="btn waves-effect waves-light btn-primary btn-skew" type="submit">Save</button>
                                                                        </div>
                                                                    </form>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </p>

                                            </div>
                                        </div>
                                    </div>


                                @endif







                                <div class="accordion-panel">
                                    <div class="accordion-heading" role="tab" id="headingTwo">
                                        <h3 class="card-title accordion-title">
                                            <a class="accordion-msg waves-effect waves-dark scale_active collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Lorem Message 2
                                            </a>
                                        </h3>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" style="">
                                        <div class="accordion-content accordion-desc">
                                            <p>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                                                survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                                                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-panel">
                                    <div class="accordion-heading" role="tab" id="headingthree">
                                        <h3 class="card-title accordion-title">
                                            <a class="accordion-msg waves-effect waves-dark scale_active collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
                                                Lorem Message 3
                                            </a>
                                        </h3>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingthree" style="">
                                        <div class="accordion-content accordion-desc">
                                            <p>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                                                survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                                                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



@endsection

@section('script')
<script>
    @if(session('name'))
    Toastify({
    text: "{{session('name')}}",
    duration: 3000,
    destination: "https://github.com/apvarun/toastify-js",
    newWindow: true,
    close: true,
    gravity: "top", // `top` or `bottom`
    position: "center", // `left`, `center` or `right`
    stopOnFocus: true, // Prevents dismissing of toast on hover
    style: {
    background: "linear-gradient(to right, #00b09b, #96c93d)",
    },
    onClick: function(){} // Callback after click
    }).showToast();
    @endif
</script>


@endsection
