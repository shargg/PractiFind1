@extends('layouts.app')

@section('title')
    <title>Home</title>
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
        <div class="col-lg-2 sort-bar">
            <h3>Sort</h3>
            <ul class="sort-ul">
                <li class="sort-li">
                    <input type="checkbox" name="alphabet" id="alphabet" onchange="onChangeAlphabet(this)" /> <label for="alphabet">Alphabetically</label>
                </li>
                <li class="sort-li">
                    <input type="checkbox" name="chronology" id="chronology"  onchange="onChangeChronology(this)" /> <label for="chronology">Chronologically</label>
                </li>
            </ul>
        </div>

        <div class="col-md-9 sort-list">
            <div class="list-header-container">
                <h3>Job list</h3>
                @if(Auth::user()->type == 1)
                <span style="margin-top: 17px"><a href="{{ url('post_job') }}" id="post_job" class="btn btn-primary">Post a Job</a></span>
                @endif
            </div>
            <div class="list-content" id="list-content">
                @foreach($jobs as $job)
                <div class="list-item">
                    <div class="list-title"><a href="{{url('job_detail/'.$job->id)}}">{{$job->title}}</a></div>
                    <div class="list-description" data-old="{{$job->description}}" data-new = "{!! \Illuminate\Support\Str::words($job->description, 50)  !!}">{!! \Illuminate\Support\Str::words($job->description, 50, '...  <a onclick="viewmore(this)" class="view_more">View More</a>')  !!}</div><br>
                    <div style="display: flex;justify-content: space-between;">
                        <div class="list-author"></div>
                        <div class="list-author">{{$job->created_at}}</div>
                    </div>
                </div>
                @endforeach
                <div class="d-flex justify-content-center paginations" style="float: right;">
                    {{ $jobs->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var ele = document.getElementById('home');
    ele.classList.add("active");

    setInterval(removeError, 5000);

    function removeError() {
      var ele = document.getElementById("has-error");
      if(ele){
        ele.style.display = 'none';
      }
    }

    function onChangeAlphabet(element) {
        if(element.checked === true){
            ele = document.getElementById('chronology');
            var chronology = 0;
            if(ele.checked === true){
                chronology = 1;
            }else{
                chronology = 0
            }
            var alphabet = 1;
            $.ajax({
                url: "{{url('job_update')}}",
                type: "POST",
                data: {_token : "{{csrf_token()}}", alphabet:alphabet, chronology:chronology},
                success: function(result){
                    $('#list-content').html(result);
                }
            });
        }else{
            ele = document.getElementById('chronology');
            var chronology = 0;
            var alphabet = 0;
            if(ele.checked === true){
                chronology = 1;
            }else{
                chronology = 0
            }
            $.ajax({
                url: "{{url('job_update')}}",
                type: "POST",
                data: {_token : "{{csrf_token()}}", alphabet:alphabet, chronology:chronology},
                success: function(result){
                    $('#list-content').html(result);
                }
            });
        }
    }

    function onChangeChronology(element) {
        if(element.checked === true){
            ele = document.getElementById('alphabet');
            var alphabet = 0;
            if(ele.checked === true){
                alphabet = 1;
            }else{
                alphabet = 0
            }
            var chronology = 1;
            $.ajax({
                url: "{{url('job_update')}}",
                type: "POST",
                data: {_token : "{{csrf_token()}}", alphabet:alphabet, chronology:chronology},
                success: function(result){
                    $('#list-content').html(result);
                }
            });
        }else{
            ele = document.getElementById('alphabet');
            var chronology = 0;
            var alphabet = 0;
            if(ele.checked === true){
                alphabet = 1;
            }else{
                alphabet = 0
            }
            $.ajax({
                url: "{{url('job_update')}}",
                type: "POST",
                data: {_token : "{{csrf_token()}}", alphabet:alphabet, chronology:chronology},
                success: function(result){
                    $('#list-content').html(result);
                }
            });
        }
    }

    function paginate(element){
        ele1 = document.getElementById('alphabet');
        ele2 = document.getElementById('chronology');
        var chronology = 0;
        var alphabet = 0;
        if(ele1.checked === true){
            alphabet = 1;
        }else{
            alphabet = 0
        }
        if(ele2.checked === true){
            chronology = 1;
        }else{
            chronology = 0
        }
        $.ajax({
            url: "{{url('job_update?page=')}}" + element,
            type: "POST",
            data: {_token : "{{csrf_token()}}", alphabet:alphabet, chronology:chronology},
            success: function(result){
                $('#list-content').html(result);
            }
        });
    }

</script>
@endsection