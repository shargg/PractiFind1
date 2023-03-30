@extends('layouts.app')

@section('title')
    <title>Module</title>
@endsection

@section('content')

<div class="container">
    @if($errors->any())
    <div class="has-error error-container" id="has-error">
        <span class="help-block" style="padding: 8px;margin:0;background: linear-gradient(55deg,#164188,#007fed);color: white;">
            <strong>{{ $errors->first() }}</strong>
        </span>
    </div>
    @endif
    <div class="row home-row home-row-add">
        <div class="col-lg-12" style="border: 1px solid #ddd;border-radius: 4px;">
            <div class="list-header-container">
                <h3>Module list</h3>
                @if(Auth::user()->type == 1)
                <span style="margin-top: 17px"><a href="{{ url('create_module') }}" id="post_job" class="btn btn-primary">Create module</a></span>
                @endif
            </div>
            <div class="list-content" id="list-content">
                @foreach($modules as $module)
                <div class="list-item">
                    <div class="list-title"><a href = "{{url('modules/'.$module->id)}}">{{$module->title}}</a></div>
                    <div class="list-description" data-old="{{$module->description}}" data-new = "{!! \Illuminate\Support\Str::words($module->description, 50)  !!}">{!! \Illuminate\Support\Str::words($module->description, 50, '...  <a onclick="viewmore(this)" class="view_more">View More</a>')  !!}</div><br>
                    <div style="display: flex;justify-content: space-between;">
                        <div class="list-author">{{$module->name}}</div>
                        <div class="list-author">{{$module->created_at}}</div>
                    </div>
                </div>
                @endforeach
                <div class="d-flex justify-content-center paginations" style="float: right;">
                    {{ $modules->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var ele = document.getElementById('module');
    ele.classList.add("active");

    setInterval(removeError, 5000);

    function removeError() {
      var ele = document.getElementById("has-error");
      if(ele){
        ele.style.display = 'none';
      }
    }
</script>
@endsection