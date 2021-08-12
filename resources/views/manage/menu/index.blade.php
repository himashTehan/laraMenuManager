@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Manage Menu') }}
                        <a href="{{ route('menu.menus.create') }}">
                            <button class="btn btn-primary btn-sm float-right">New</button>
                        </a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price (Rs)</th>
                                    <th scope="col">Category</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menuList as $menu)
                                    <tr>
                                        <th scope="row">{{ $menu->id }}</th>
                                        <td>{{ $menu->name }}</td>
                                        <td>{{ $menu->price }}</td>
                                        <td>{{ implode(
                                                ',',
                                                $menu->category()->get()->pluck('name')->toArray(),
                                            ) }}
                                        </td>
                                        <td>
                                            <a href="{{ route('menu.menus.edit', $menu) }}">
                                                <button type="button" class="btn btn-secondary btn-sm">Manage</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
