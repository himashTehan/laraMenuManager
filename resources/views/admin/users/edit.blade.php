@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('messages.manage_user') }}<span
                            class="font-weight-bold">{{ $user->name }}</span></div>

                    <div class="card-body">

                        <div class="col">
                            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group col">
                                    <label for="role"
                                        class="col-md-6 col-form-label text-md-left">{{ __('Role') }}</label>

                                    <div class="col-md-6">
                                        @foreach ($roles as $role)
                                            <div class="form-check">
                                                <input type="checkbox" name="roles[]" value="{{ $role->id }}" @if ($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                                <label>{{ $role->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group col">
                                    <label for="email"
                                        class="col-md-6 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ $user->email }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-6 float-left">
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </div>

                            </form>
                        </div>


                        <br>
                        <hr>
                        <div class="float-right">
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#myModal">Delete User</button>


                        </div>
                    </div>
                    <!-- The Modal -->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete User</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    Are you sure you want to delete user {{ $user->name }} ?
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" >Delete</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
