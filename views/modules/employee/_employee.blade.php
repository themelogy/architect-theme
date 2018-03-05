<li>
    <div class="team-box" data-top-bottom="transform: translateY(-50px);" data-bottom-top="transform: translateY(50px);">
        <div class="team-photo">
            <div class="overlay"></div>
            <img src="{{ $employee->present()->firstImage(370,450,'fit',80) }}" alt="{{ $employee->fullname }}" class="img-responsive">
        </div>
        <div class="team-info">
            <h3><a href="{{ $employee->url }}" class="ajax">{{ $employee->fullname }}</a></h3>
            <h4>{{ $employee->position }} @if(!empty($employee->biography)) / {!! strip_tags($employee->biography) !!} @endif</h4>
        </div>
    </div>
</li>