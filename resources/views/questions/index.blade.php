@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex alight-items-center">
                        <h2>All Questions</h2>
                        <div class="ml-auto">
                            <a href="{{route('questions.create')}}" class="btn btn-outline-secondary">Ask Question</a>  
                        </div>
                    </div>

                </div>

                <div class="card-body">
                    @include('layouts._messages')
                    @foreach($questions as $question)
                    <div class="media">
                        <div class="d-flex flex-column counters">
                            <div class="vote">
                                <strong>{{$question->votes}} </strong>{{str_plural('vote', $question->votes )}}
                            </div>

                            <div class="answer">
                                <strong>{{$question->answers}} </strong>{{str_plural('answer', $question->answers )}}
                            </div>

                            <div class="view">
                                {{$question->views}} {{str_plural('view', $question->votes )}}
                            </div>

                        </div>

                        <div class="media-body">
                            <div class="d-flex alight-items-center">
                                <h3 class="mt-0"><a href={{$question->url}}>{{$question->title}}</a></h3>
                                <div class="ml-auto">
                                    <a href="{{route('questions.edit', $question->id)}}" class="btn btn-sm btn-outline-info">Edit</a>
                                    <form class="form-delete" action="{{route('questions.destroy', $question->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        
                                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')" >Delete</button>
                                        
                                    </form>
                                </div>
                            </div>
                            <p class="lead">
                                Asked by <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                <small class="text-muted">{{$question->created_date}}</small>
                            </p>
                            <p>
                                {{str_limit($question->body, 250)}}
                            </p>
                        </div>
                    </div>
                    <hr/>
                    @endforeach
                    <div class="text-center">
                        {{$questions->links()}}
                    </div>

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




