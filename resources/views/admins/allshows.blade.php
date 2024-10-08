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
                <div class="container">
                    @if(session()->has('delete'))
                        <div class="alert alert-success">
                            {{ session()->get('delete') }}
                        </div>
                    @endif
                </div>
              <h5 class="card-title mb-4 d-inline">Shows</h5>
              <a  href="{{ route('shows.create') }}" class="btn btn-primary mb-4 text-center float-right">Create Shows</a>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">image</th>
                    <th scope="col">type</th>
                    <th scope="col">date_aired</th>
                    <th scope="col">status</th>
                    <th scope="col">genre</th>
                    <th scope="col">created_at</th>
                    <th scope="col">episodes</th>
                    <th scope="col">followings</th>
                    <th scope="col">comments</th>
                    <th scope="col">edit</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($allShows as $show)
                        <tr>
                            <th scope="row">{{ $show->id }}</th>
                            <td>{{ $show->name }}</td>
                            <td><img src="{{ asset('assets/img/'.$show->image.'') }}" alt="{{ $show->image }}" style="width: 50px; height: 50px; border-radius: 10%;object-fit: cover;}">
                            <td>{{ $show->type }}</td>
                            <td>{{ $show->date_aired }}</td>
                            <td>{{ $show->status }}</td>
                            <td>{{ $show->genere }}</td>
                            <td>{{ $show->created_at }}</td>
                            <td>{{ $show->episodes }}</td>
                            <td>{{ $show->followings }}</td>
                            <td>{{ $show->comments }}</td>
                            <td><a href="{{ route('shows.edit', $show->id) }}" class="btn btn-primary text-center">edit</a></td>
                            <td><a href="{{ route('shows.delete', $show->id) }}" class="btn btn-danger  text-center ">delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>

@endsection