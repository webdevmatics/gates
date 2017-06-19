@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $post->title }}
                    <a class="btn btn-sm btn-default pull-right" href="{{ route('list_posts') }}">Return</a>
                </div>

                <div class="panel-body">
                    {{ $post->body }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection