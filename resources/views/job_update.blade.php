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
    @if ($jobs->lastPage() > 1)
    <ul class="pagination">
        <li class="{{ ($jobs->currentPage() == 1) ? ' disabled' : '' }}">
            <a onclick="paginate(1)" class="pagination-item">«</a>
        </li>
        @for ($i = 1; $i <= $jobs->lastPage(); $i++)
            <li class="{{ ($jobs->currentPage() == $i) ? ' active' : '' }}">
                <a onclick="paginate({{$i}})" class="pagination-item">{{ $i }}</a>
            </li>
        @endfor
        <li class="{{ ($jobs->currentPage() == $jobs->lastPage()) ? ' disabled' : '' }}">
            @if($jobs->currentPage() < $jobs->lastPage())
            <a onclick="paginate({{$jobs->currentPage()+1}})" class="pagination-item">»</a>
            @else
            <a class="pagination-item">»</a>
            @endif
        </li>
    </ul>
    @endif
</div>