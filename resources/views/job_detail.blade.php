@extends('layouts.app')

@section('title')
    <title>Job Detail</title>
@endsection

@section('content')
<div class="container">
    <div class="row home-row" style="margin-bottom: 29px;min-height: 250px;">
        <div class="col-md-8" style="background: white;border: 2px solid #ddd;padding: 60px;">
            <div class="list-header-container">
                <h3>{{ $job->title }}</h3>
                <span><a href="{{ url('/') }}" class="btn btn-primary" style="margin-top: 10px">Back to list</a></span>
            </div>

            <div class="form-group">
                <label for="description" class="control-label">Description</label>
                <p>{{$job->description}}</p>
            </div>

            <div class="form-group">
                <label for="created_at" class="control-label">Posted Time</label>
                <p>{{ $job->created_at }}</p>
            </div>
        </div>
    </div>
    <div class="row home-row" style="margin-bottom: 29px;min-height: 250px;">
        <div class="col-md-8" style="background: white;border: 2px solid #ddd;padding: 60px;">
            @if(count($bids) == 0)
            <div class="list-header-container">
                <h3>Apply</h3>
            </div>
            <form class="" role="form" method="POST" action="{{ url('apply_job') }}" enctype="multipart/form-data">
                        
                {{ csrf_field() }}

                <input type="hidden" name="board_id" value="{{$job->id}}">

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
                            Apply Now
                        </button>
                    </div>
                </div>
            </form>
            @else
            @foreach($bids as $bid)
            <div class="list-header-container">
                <h3>Your Application</h3>
            </div>
            <div class="list-item">
                <div class="list-description">{{$bid->description}}</div><br>
                <div style="display: flex;justify-content: space-between;">
                    <div class="list-author"></div>
                    <div class="list-author">{{$bid->created_at}}</div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection