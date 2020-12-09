@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('articles.index') }}" class="btn btn-primary btn-sm">
            Back
        </a>
        <form method="post" action="{{ route('articles.update', $article) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Your article title" value="{{ $article->title }}">
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="5">{{ $article->content }}</textarea>
            </div>
            <div class="col-md-12">
                <div class="form-group @error('g-recaptcha-response') 'has-error' @enderror">
                    <label class="col-md-4 control-label">Captcha</label>
                    <div class="col-md-6 pull-center">
                        {!! app('captcha')->display() !!}
                        @error('g-recaptcha-response')
                        <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
        {!! NoCaptcha::renderJs() !!}
    </div>
@endsection
