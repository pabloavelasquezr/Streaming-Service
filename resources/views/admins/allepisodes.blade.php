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
              <h5 class="card-title mb-4 d-inline">Episodes</h5>
              <a  href="{{ route('episodes.create') }}" class="btn btn-primary mb-4 text-center float-right">Create Episodes</a>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">video</th>
                    <th scope="col">thumbnail</th>
                    <th scope="col">name</th>
                    <th scope="col">show id</th>
                    <th scope="col">Show</th>
                    <th scope="col">created_at</th>
                    <th scope="col">edit</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($allEpisodes as $episode)
                        <tr>
                            <th scope="row">{{ $episode->id }}</th>
                            <td>
                              <video id="player" style="width: 50px; height: 50px;" playsinline controls data-poster="{{ asset('assets/thumbnails/'.$episode->thumbnail.'') }}">
                                  <source src="{{ asset('assets/videos/'.$episode->video.'') }}" type="video/mp4" />
                                  <!-- Captions are optional -->
                                  <track kind="captions" label="English captions" src="#" srclang="en" default />
                              </video>
                            </td>

                            <td><img src="{{ asset('assets/thumbnails/'.$episode->thumbnail.'') }}" alt="{{ $episode->thumbnail }}" style="width: 50px; height: 50px; border-radius: 10%;object-fit: cover;"></td>
                            
                            <td>ep {{ $episode->episode_name }}</td>
                            <td>{{ $episode->show_id }}</td>
                            <td>{{ $episode->show_name }}</td>
                            <td>{{ $episode->created_at }}</td>
                            <td><a href="{{ route('episodes.edit',$episode->id) }}" class="btn btn-primary text-center">edit</a></td>
                            <td><a href="{{ route('episodes.delete',$episode->id) }}" class="btn btn-danger  text-center ">delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>

@endsection