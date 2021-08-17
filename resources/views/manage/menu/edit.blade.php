@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit -
                        <span class="font-weight-bold">
                            {{ $menu->name }}
                        </span>
                        <button type="button" class="btn btn-outline-danger btn-sm float-right" data-toggle="modal"
                            data-target="#myModal">Remove</button>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('menu.menus.update', $menu) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group col">
                                <div class="col-md-6">
                                    @if (str_contains($menu->image, 'via.placeholder.com'))
                                        <img src={{ $menu->image }} class="card-img-top">
                                    @else
                                        <img src={{ asset('img/' . $menu->image) }} class="card-img-top rounded">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col">
                                <label for="name" class="col-md-6 col-form-label text-md-left">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                        value="{{ $menu->name }}" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group col">
                                <label for="price" class="col-md-6 col-form-label text-md-left">Price</label>
                                <div class="col-md-6">
                                    <input id="price" type="number" step="0.01" class="form-control" name="price"
                                        value="{{ $menu->price }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group col">
                                <label for="category" class="col-md-6 col-form-label text-md-left">Category</label>
                                <div class="col-md-6">
                                    <select name="category" id="category" class="custom-select" @error('category')
                                        is-invalid @enderror">
                                        <option value="">Select One</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $menu->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <br>
                            <div class="form-group col">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </div>
                            </div>
                        </form>
                        <!-- The Modal -->
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Delete Menu</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Are you sure you want to delete {{ $menu->name }} ?
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <form action="{{ route('menu.menus.destroy', $menu) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Yes</button>
                                        </form>
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
