@extends('layouts.app')
@section('content')

<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                    {{-- <a href="./categories.html">Categories</a> --}}
                    <span>{{ $category_name }}</span>
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
                                        <h4>{{ $category_name }}</h4>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <div class="row">
                            @foreach($shows as $show)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="{{ asset('assets/img/'.$show->image.'') }}" onclick="window.location.href='{{ route('anime.details', $show->id) }}'" title="{{ $show->name }}">
                                            <h5><a href="{{ route('anime.details', $show->id) }}">{{ $show->name }}</a></h5>
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                <li>Active</li>
                                                <li>TV Show</li>
                                            </ul>
                                            <h5><a href="{{ route('anime.details', $show->id) }}">{{ $show->name}}</a></h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
    <div class="product__sidebar__comment">
        <div class="section-title">
            <h5>FOR YOU</h5>
        </div>
        @foreach($forYouShows as $show)
            <div class="product__sidebar__comment__item">
                <div class="product__sidebar__comment__item__pic" onclick="window.location.href='{{ route('anime.details', $show->id) }}'" title="{{ $show->name }}">
                    <img src="{{ asset('assets/img/'.$show->image.'') }}" alt="">
                </div>
                <div class="product__sidebar__comment__item__text">
                    <ul>
                        <li>Active</li>
                        <li>TV Show</li>
                    </ul>
                    <h5><a href="{{ route('anime.details', $show->id) }}">{{ $show->name }}</a></h5>
                    {{-- <span><i class="fa fa-eye"></i> 19.141 Viewes</span> --}}
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>
</div>
</div>
</section>

@endsection