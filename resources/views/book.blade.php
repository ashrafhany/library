
@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading">{{ __('Book name') }}</div>
                <div class="row">
                        <div class="col-md-3">
                            <img src="{{asset('storage/thumbnails/'.$book->image)}}" class="img-responsive"/>
                        </div>
                        <div class="col-md-9 text-center">
                            <h2>{{$book->title}}</h2>
                            <p>{{$book->info}}</p>
                            <br/>
                            Author : {{$book->author}} <br/>
                            <a href="{{asset('storage/books/'.$book->bookfile)}}" class="btn btn-primary">Download</a>
                            <a href="#" class="btn btn-info">more info</a>
                        </div>
                    </div> 
                    <hr>
                <div class="panel-body">
                  
                </div>
            </div>
<hr>
    @include('commentbox')
@endsection
