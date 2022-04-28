@extends('Layouts.Main')
@section('title', 'Create Products')


@section('links')
@endsection

@section('content')
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('dashboard.products.store') }}" method="post">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Name En</label>
                            <input name="name_en" id="name_en" type="text" class="form-control"
                                placeholder="Enter Name En">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Name Ar</label>
                            <input name="name_ar" id="name_ar" type="text" class="form-control"
                                placeholder="Enter Name Ar">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Code</label>
                            <input name="code" id="code" type="number" class="form-control" placeholder="Enter Code">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Quantity</label>
                            <input name="quantity" id="quantity" type="number" class="form-control"
                                placeholder="Enter Quantity">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Price</label>
                            <input name="price" id="price" type="number" class="form-control" placeholder="Enter Price">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" id="status" class="form-control">
                                <option>----Select Statues----</option>
                                @foreach ($statues as $value => $status)
                                    <option value="{{ $value }}"> {{ $status }} </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Brands</label>
                            <select name="brand_id" id="brand_id" class="form-control">
                                <option>----Select Brand----</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}"> {{ $brand->name_en }} </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Sub Category</label>
                            <select name="subcategory_id" id="subcategory_id" class="form-control">
                                <option>----Select SubCategory----</option>
                                @foreach ($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}"> {{ $subcategory->name_en }} </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Desc En</label>
                            <textarea rows="4" name="desc_en" id="desc_en" type="text" class="form-control"
                                placeholder="Enter Name En"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Desc Ar</label>
                            <textarea rows="4" name="desc_ar" id="desc_ar" type="text" class="form-control"
                                placeholder="Enter Name Ar"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="img">
                                <img id="image" style="cursor: pointer;" width="200px" height="200px"
                                    src="{{ asset('assets/Images/upload.png') }}" alt="upload photo">
                            </label>
                            <input class="d-none" type="file" name="img" id="img" onchange="loadfile(event)">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <button class="btn btn-primary">Create</button>
                            <button class="btn btn-primary">Create & Return</button>

                        </div>
                    </div>
                </div>
        </div>


        </form>
    </div>


@endsection

@section('scripts')
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('image');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        };
    </script>
@endsection
