@extends('layouts.admin')
@section('content')

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
                <div class="container">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                </div>
              <h5 class="card-title mb-4 d-inline">Users</h5>
             {{-- <a  href="#" class="btn btn-primary mb-4 text-center float-right">Create Users</a> --}}
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">avatar</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">comments</th>
                    <th scope="col">following shows</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($allUsers as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td><img src="{{ asset('assets/user_images/'.$user->image.'') }}" alt="{{ $user->image }}" style="width: 50px; height: 50px; border-radius: 10%;object-fit: cover;}">
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->comments }}</td>
                            <td>{{ $user->followings }}</td>
                        </tr>
                    @endforeach
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>
@endsection