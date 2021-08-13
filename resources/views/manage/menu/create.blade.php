@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Menu</div>

                    <div class="card-body">
                        <form action="{{ route('menu.menus.store') }}" method="POST">
                            @csrf
                            <div class="form-group col">
                                <div class="col-md-6">
                                    <img class="img-fluid rounded"/>
                                </div>
                            </div>
                            <div class="form-group col">
                                <label for="email" class="col-md-6 col-form-label text-md-left">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                        value="{{ old('name') }}" required autofocus>
                                </div>
                            </div>                            
                            
                            <div class="form-group col">
                                <label for="description" class="col-md-6 col-form-label text-md-left">Describe Item</label>
                                <div class="col-md-6 contenteditable="true"">
                                    <textarea id="description" class="form-control" name="description"
                                        value="{{ old('description') }}" rows="4" cols="10">
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group col">
                                <label for="price" class="col-md-6 col-form-label text-md-left">Price</label>
                                <div class="col-md-6">
                                    <input id="price" type="number" step="0.01" class="form-control" name="price"
                                        value="{{ old('price') }}" required autofocus>
                                </div>
                            </div>                             
                            
                            <div class="form-group col">
                                <label for="category" class="col-md-6 col-form-label text-md-left">Category</label>
                                <div class="col-md-6">
                                    <select name="category" class="custom-select">
                                        <option value="0"></option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if (old('category', $category->id) == 0)
                                            selected="selected"
                                            @endif> 
                                            {{ old('category', $category->name) }}
                                         </option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>    

                            <br>

                            <div class="form-group col">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
