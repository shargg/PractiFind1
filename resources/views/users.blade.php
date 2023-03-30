@extends('layouts.app')

@section('title')
    <title>Students</title>
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
    <div class="row">
            <h2>User list</h2>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{url('users/edit/'.$user->id)}}">Edit</a>
                            <a class="btn btn-danger" href="{{url('users/delete/'.$user->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center paginations" style="float:right">
                {{ $users->links() }}
            </div>
    </div>
</div>

<script type="text/javascript">
    var ele = document.getElementById('users');
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