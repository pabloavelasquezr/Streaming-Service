@extends('layouts.app')
@section('content')

<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                    {{-- <a href="./categories.html">Categories</a> --}}
                    <span>You followed Shows</span>
                </div>
            </div>
        </div>
    </div>
</div>


    <section class="product-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product__page__content">
                        <div class="product__page__title">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-6">
                                    <div class="section-title">
                                        <h4>You followed Shows</h4>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <div class="row">
                            @if($followedShows->count() > 0)
                                @foreach($followedShows as $show)
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="product__item">
                                            <div onclick="location.href='{{ route('anime.details', $show->show_id) }}'" title="{{ $show->name }}" class="product__item__pic set-bg" data-setbg="{{ asset('assets/img/'.$show->show_image.'') }}">
                                                {{-- <div class="ep">18 / 18</div>
                                                <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                                <div class="view"><i class="fa fa-eye"></i> 9141</div> --}}
                                                <h5><a href="{{ route('anime.details', $show->show_id) }}">{{ $show->show_name }}</a></h5>
                                            </div>
                                            <div class="product__item__text">
                                                <ul>
                                                    <li>Active</li>
                                                    <li>TV Show</li>
                                                </ul>
                                                <h5><a href="{{ route('anime.details', $show->show_id) }}">{{ $show->show_name}}</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-danger">You have not followed any show yet</div>
                            @endif
                        </div>
                    </div>
                   
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__view">
                        </div>
                    <!-- </div>
                </div>         -->
    </div>
</div>
</div>
</div>
</div>
</section>

@endsection