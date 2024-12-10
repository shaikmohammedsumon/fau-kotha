@extends('layouts.dashboardmaster')
@section('content')

<div class="row p-5">
    <div class="col-6 ">
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
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr >
                                <th class="text-center">#</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        @forelse ( $categories as $category )
                        <tbody>
                            <tr>
                                <th scope="row" class="align-middle text-center">{{$loop->index + 1}}</th>
                                <td>
                                    <img src="{{asset('upload/category')}}/{{$category->image}}" alt="" width="70px" height="70px" style="border-radius:10%;">
                                </td>
                                <td class="align-middle text-center">{{$category->title}}</td>
                                <td class="align-middle text-center">
                                    <a href="{{route('category.status',$category->id)}}" class="@if ($category->status == 'active') btn bg-success text-white @else btn bg-danger text-white @endif ">{{$category->status}}</a>
                                </td>
                                <td class="align-middle text-center">
                                   <div class="d-flex ">

                                        <a href="{{route('category.edit',$category->id)}}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>

                                        <form action="{{route('category.destroy',$category->id)}}" method="POST" class="ml-1">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                   </div>
                                </td>

                            </tr>
                        </tbody>
                        @empty
                            <p class="text-danger text-center">No Date</p>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
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
                <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-normal" placeholder="title" name="title">
                            @error('title')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category Slug</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-normal" placeholder="slug" name="slug">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category Image</label>
                        <div class="col-sm">
                            <picture>
                                <img  id="port_image" src="{{asset('upload/defualt/defualt.jpg')}}" alt="" style="width:100%; height: 200px; object-fit:contain;">
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

@section('script')
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
