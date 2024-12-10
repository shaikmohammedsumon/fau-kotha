@extends('layouts.dashboardmaster')
@section('content')

<div class="row align-items-center justify-content-center" style="min-height: 100vh; margin-top: -50px;">
    <div class="col-6">
        <div class="card">

            <div class="card-header">
                <h5>Category Table</h5>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                        <li><i class="fa fa-window-maximize full-card"></i></li>
                        <li><i class="fa fa-minus minimize-card"></i></li>
                        <li><i class="fa fa-refresh reload-card"></i></li>
                        <li><i class="fa fa-trash close-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                <form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-normal" placeholder="title" name="title" value="{{$category->title}}">
                            @error('title')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category Slug</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-normal" placeholder="slug" name="slug" value="{{$category->slug}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category Image</label>
                        <div class="col-sm">
                            <picture>
                                <img  id="port_image" src="{{ ($category->image == 'defualt.jpg')  ? asset('upload/defualt/defualt.jpg') : (asset('upload/category') .'/' .$category->image) }} " alt="" style="width:100%; height: 200px; object-fit:contain;">
                            </picture>

                            <input onchange="document.getElementById('port_image').src =window.URL.createObjectURL(this.files[0])" type="file" class="form-control form-control-normal @error('image') is-invalid @enderror" id="inputEmail3" placeholder="image" name="image">
                            @error('image')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="justify-content-end row">
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('content')
    <script>
        @if(session('create_category'))
        Toastify({
        text: "{{session('create_category')}}",
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
