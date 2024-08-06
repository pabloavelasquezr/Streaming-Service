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
              <h5 class="card-title mb-4 d-inline">Followings</h5>
             {{-- <a  href="#" class="btn btn-primary mb-4 text-center float-right">Create Users</a> --}}
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">image</th>
                    <th scope="col">Show</th>
                    <th scope="col">following user</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($allFollowings as $following)
                        <tr>
                            <th scope="row">{{ $following->id }}</th>
                            <td><img src="{{ asset('assets/img/'.$following->show_image.'') }}" alt="{{ $following->show_image }}" style="width: 50px; height: 50px; border-radius: 10%;object-fit: cover;}">
                            <td>{{ $following->show_name }}</td>
                            <td>{{ $following->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>
@endsection