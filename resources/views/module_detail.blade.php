@extends('layouts.app')

@section('title')
    <title>Module Detail</title>
@endsection

@section('content')
<div class="container">
    <div class="row home-row" style="margin-bottom: 29px;min-height: 250px;">
        <div class="col-md-8" style="background: white;border: 2px solid #ddd;padding: 60px;">
            <div class="list-header-container">
                <h3>{{ $module->title }}</h3>
                <span><a href="{{ url('modules') }}" class="btn btn-primary" style="margin-top: 10px">Back to list</a></span>
            </div>

            <div class="form-group">
                <label for="description" class="control-label">Description</label>
                <p>{{$module->description}}</p>
            </div>

            <div class="form-group">
                <label for="created_at" class="control-label">Posted Time</label>
                <p>{{ $module->created_at }}</p>
            </div>
        </div>
    </div>
    @if(Auth::user()->type == 1)
    <div class="row home-row" style="margin-bottom: 29px;">
        <div class="col-md-8" style="background: white;border: 2px solid #ddd;padding: 60px;">
            @if(count($applicants) > 0)
            @foreach($applicants as $applicant)
            <div class="list-item">
                <div class="list-title"><a>{{$applicant->name}}</a></div>
                <div class="list-description" data-old="{{$applicant->description}}" data-new = "{!! \Illuminate\Support\Str::words($applicant->description, 50)  !!}">{!! \Illuminate\Support\Str::words($applicant->description, 50, '...  <a onclick="viewmore(this)" class="view_more">View More</a>')  !!}</div><br>
                <div style="display: flex;justify-content: space-between;">
                    <div class="list-author"><a href="{{asset($applicant->path)}}" target="_blank">View file</a></div>
                    <div class="list-author">{{$applicant->created_at}}</div>
                </div>
            </div>
            @endforeach
            @else
            <p>No data available</p>
            @endif
        </div>
    </div>
    @else
    <div class="row home-row" style="margin-bottom: 29px;min-height: 250px;">
        <div class="col-md-8" style="background: white;border: 2px solid #ddd;padding: 60px;">
            @if(count($bids) == 0)
            <div class="list-header-container">
                <h3>Reply</h3>
            </div>
            <form class="" role="form" method="POST" action="{{ url('place_bid') }}" enctype="multipart/form-data">
                        
                {{ csrf_field() }}

                <input type="hidden" name="module_id" value="{{$module->id}}">

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}" style="margin-bottom: 40px;">
                    <label for="description" class="control-label">Description</label>
                    <textarea id="description" class="form-control" name="description" data-resize="vertical" rows="4" autofocus>{{ old('description') }}</textarea>

                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('attachment') ? ' has-error' : '' }}" style="margin-bottom: 40px;">
                    <label for="attachment" class="control-label">Attachment</label>
                    <input id="attachment" type="file" class="form-control" name="attachment" autofocus>

                    @if ($errors->has('attachment'))
                        <span class="help-block">
                            <strong>{{ $errors->first('attachment') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary">
                            Reply Now
                        </button>
                    </div>
                </div>
            </form>
            @else
            @foreach($bids as $bid)
            <div class="list-header-container">
                <h3>Your Reply</h3>
            </div>
            <div class="list-item">
                <div class="list-description">{{$bid->description}}</div><br>
                <div style="display: flex;justify-content: space-between;">
                    <div class="list-author"><a href="{{asset($bid->path)}}" target="_blank">View file</a></div>
                    <div class="list-author">{{$bid->created_at}}</div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
    @endif
</div>
@endsection