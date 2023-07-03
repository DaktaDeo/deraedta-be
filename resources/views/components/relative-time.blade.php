@if ($hasDateTime)
    <div>
        <span>{{$prefix}}</span>
        <relative-time
            datetime="{{$dateTime->toIso8601String()}}"
            class="no-wrap"
            title="{{$dateTime->format('l jS F Y H:i:s')}}">
            {{($dateTime->isFuture() ? 'Planned for ' : '').$dateTime->diffForHumans()}}
        </relative-time>
        <span>{{$suffix}}</span>
    </div>
@endif
