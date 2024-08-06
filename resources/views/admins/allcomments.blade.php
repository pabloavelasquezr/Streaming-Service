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
              <h5 class="card-title mb-4 d-inline">Comments</h5>
             {{-- <a  href="#" class="btn btn-primary mb-4 text-center float-right">Create Users</a> --}}
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">comment</th>
                    <th scope="col">user image</th>
                    <th scope="col">user</th>
                    <th scope="col">show</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($allComments as $comment)
                        <tr>
                            <th scope="row">{{ $comment->id }}</th>
                            <td>{{ $comment->comment }}</td>
                            <td><img src="{{ asset('assets/user_images/'.$comment->image.'') }}" alt="{{ $comment->image }}" style="width: 50px; height: 50px; border-radius: 10%;object-fit: cover;}">
                            <td>{{ $comment->user_name }}</td>
                            <td>{{ $comment->show_name }}</td>
                        </tr>
                    @endforeach
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>
@endsection