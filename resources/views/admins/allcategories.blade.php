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
              <h5 class="card-title mb-4 d-inline">Genres</h5>
              <a  href="{{ route('categories.create') }}" class="btn btn-primary mb-4 text-center float-right">Create Genres</a>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">shows</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($allCategories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->shows }}</td>
                            <td><a href="{{ route('categories.delete', $category->id) }}" class="btn btn-danger  text-center ">delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>
@endsection