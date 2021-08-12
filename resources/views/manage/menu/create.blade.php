@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Menu</div>

                    <div class="card-body">
                        <form>
                            <div class="form-group col">
                                <div class="col-md-6">
                                    <img class="img-fluid rounded"/>
                                </div>
                            </div>
                            <div class="form-group col">
                                <label for="email" class="col-md-6 col-form-label text-md-left">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="email" class="form-control" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
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
