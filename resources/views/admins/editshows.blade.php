@extends('layouts.admin')
@section('content')    

       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Shows</h5>
          <form method="POST" action="{{ route('shows.update',$show) }}" enctype="multipart/form-data">
                <!-- Email input -->
                @csrf
                @method('PUT')
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="Name" value="{{ $show->name }}" />
                 
                </div>
                @if($errors->has('name'))
                    <p class="alert alert-danger">{{ $errors->first('name') }}</p>
                @endif
                <div class="form-outline mb-4 mt-4">
                    <img src="{{ asset('assets/img/'.$show->image.'') }}" alt="{{ $show->image }}" style="width: 50px; height: 50px; border-radius: 10%; object-fit: cover;"><p></p>
                    <input type="file" name="image" id="form2Example1" class="form-control" value="{{ $show->image }}"  />
                   
                </div>
                @if($errors->has('image'))
                    <p class="alert alert-danger">{{ $errors->first('image') }}</p>
                @endif
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $show->description }}</textarea>
                </div>
                @if($errors->has('description'))
                    <p class="alert alert-danger">{{ $errors->first('description') }}</p>
                @endif
                <div class="form-outline mb-4 mt-4">

                    <select name="type" class="form-select  form-control" aria-label="Default select example">
                      <option selected>Choose Type</option>
                      <option value="TV Series">Tv Series</option>
                      <option value="Movies">Movies</option>
                    </select>
                </div>
                @if($errors->has('type'))
                    <p class="alert alert-danger">{{ $errors->first('type') }}</p>
                @endif
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="studios" id="form2Example1" class="form-control" placeholder="studios" value="{{ $show->studios }}" />
                 
                </div>
                @if($errors->has('studios'))
                    <p class="alert alert-danger">{{ $errors->first('studios') }}</p>
                @endif
                <div class="form-outline mb-4 mt-4">
                    <input type="text" name="date_aired" id="form2Example1" class="form-control" placeholder="date_aired" value="{{ $show->date_aired }}" />
                   
                </div>
                @if($errors->has('date_aired'))
                    <p class="alert alert-danger">{{ $errors->first('date_aired') }}</p>
                @endif
                <div class="form-outline mb-4 mt-4">
                    <input type="text" name="status" id="form2Example1" class="form-control" placeholder="status" value="{{ $show->status }}" />
                   
                </div>
                @if($errors->has('status'))
                    <p class="alert alert-danger">{{ $errors->first('status') }}</p>
                @endif
                <div class="form-outline mb-4 mt-4">

                    <select name="genere" class="form-select  form-control" aria-label="Default select example">
                      <option selected>Choose Genere</option>
                      @foreach($categories as $category)
                        <option value="{{ $category->name }}" @if($category->name == $show->genere) selected @endif>{{ $category->name }}</option>
                      @endforeach
                    </select>
                </div>
                @if($errors->has('genere'))
                    <p class="alert alert-danger">{{ $errors->first('genere') }}</p>
                @endif
                <div class="form-outline mb-4 mt-4">
                    <input type="text" name="duration" id="form2Example1" class="form-control" placeholder="duration" value="{{ $show->duration }}" />
                   
                </div>
                @if($errors->has('duration'))
                    <p class="alert alert-danger">{{ $errors->first('duration') }}</p>
                @endif
                <div class="form-outline mb-4 mt-4">
                    <input type="text" name="quality" id="form2Example1" class="form-control" placeholder="quality" value="{{ $show->quality }}" />
                   
                </div>
                @if($errors->has('quality'))
                    <p class="alert alert-danger">{{ $errors->first('quality') }}</p>
                @endif
{{--                 <div class="form-outline mb-4 mt-4">
                    <input type="text" name="num_available" id="form2Example1" class="form-control" placeholder="num_available" />
                   
                </div>
                <div class="form-outline mb-4 mt-4">
                    <input type="text" name="num_total" id="form2Example1" class="form-control" placeholder="num_total" />
                   
                </div>
 --}}              

                <br>
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">save</button>
              </form>

            </div>
          </div>
        </div>
      </div>

@endsection