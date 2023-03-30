@extends('layouts.app')

@section('title')
    <title>Message</title>
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size: 30px;">Chats</div>

                <div class="panel-body" style="overflow-y: auto;height: 405px;">
                    <chat-messages :messages="messages"></chat-messages>
                </div>

                <div class="panel-footer">
                    <chat-form
                        v-on:messagesent="addMessage"
                        :user="{{ Auth::user() }}"
                    ></chat-form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var ele = document.getElementById('chat');
    ele.classList.add("active");
</script>
@endsection