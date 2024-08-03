@extends('layouts.admin')
@section('content')

       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Edit Episodes</h5>
          <form method="POST" action="{{ route('episodes.update',$episode) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-outline mb-4 mt-4">
                  <label>name</label>
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" value="{{ $episode->episode_name }}" />
                 
                </div>
                @if($errors->has('name'))
                    <p class="alert alert-danger">{{ $errors->first('name') }}</p>
                @endif
                <div class="form-outline mb-4 mt-4">
                    <label>thumbnail</label><br><p></p>
                    <img src="{{ asset('assets/img/'.$episode->thumbnail.'') }}" alt="{{ $episode->thumbnail }}" style="width: 200px; height: 100px; border-radius: 10%;object-fit: cover;">
                    <br><span style="font-size: 0.7em">{{ 'assets/img/'.$episode->thumbnail }}</span><p></p>
                    <input type="file" name="thumbnail" id="form2Example1" class="form-control"/>
                   
                </div>
                @if($errors->has('thumbnail'))
                    <p class="alert alert-danger">{{ $errors->first('thumbnail') }}</p>
                @endif
                <div class="form-outline mb-4 mt-4">
                    <label>video</label><br><p></p>
                    <video id="player" style="width: 200px; height: 100px;" playsinline controls data-poster="{{ asset('assets/thumbnails/'.$episode->thumbnail.'') }}">
                                  <source src="{{ asset('assets/videos/'.$episode->video.'') }}" type="video/mp4" />
                                  <!-- Captions are optional -->
                                  <track kind="captions" label="English captions" src="#" srclang="en" default />
                              </video>
                    <br><span style="font-size: 0.7em">{{ $episode->video }}</span><p></p>
                    <input type="file" name="video" id="form2Example1" class="form-control">
                   
                </div>
                @if($errors->has('video'))
                    <p class="alert alert-danger">{{ $errors->first('video') }}</p>
                @endif
                <div class="form-outline mb-4 mt-4">
                    <label>Shows</label>
                    <select name="show_id" class="form-select  form-control" aria-label="Default select example">
                      <option selected>Choose Shows</option>
                      @foreach($shows as $show)
                        <option value="{{ $show->id }}" @if($show->id == $episode->show_id) selected @endif>{{ $show->name }}</option>
                      @endforeach

                    </select>
                </div>
                @if($errors->has('show_id'))
                    <p class="alert alert-danger">{{ $errors->first('show_id') }}</p>
                @endif
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">save</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
@endsection