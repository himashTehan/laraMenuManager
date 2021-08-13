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
                    </div>

                    <div class="card-body">
                        <form action="{{ route('menu.menus.update', $menu) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group col">
                                <div class="col-md-6">
                                    <img src={{ $menu->image }} class="img-fluid rounded"/>
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

                            <br>
                            <div class="form-group col">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
