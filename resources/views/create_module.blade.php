<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Create Module</title>

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
    </head>

    <body style="background-color: white!important">
        <div class="top-banner">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <!-- {{ config('app.name', 'Laravel') }} -->
                    <img src="{{ asset('logo.png')}}" alt = "{{ config('app.name', 'Laravel') }}" />
                </a>
            </div>
        </div>

        <div class="container" style="position:relative;top:-150px">
            <div class="row home-row">
                <div class="col-md-8" style="background: white;border: 2px solid #ddd;padding: 60px;">
                    <form class="" role="form" method="POST" action="{{ url('create_module') }}">
                        
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}" style="margin-bottom: 40px;">
                            <label for="title" class="control-label">Title</label>
                            <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" autofocus>

                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}" style="margin-bottom: 40px;">
                            <label for="description" class="control-label">Description</label>
                            <textarea id="description" class="form-control" name="description" data-resize="vertical" rows="4" autofocus>{{ old('description') }}</textarea>

                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">
                                    Create Module
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>