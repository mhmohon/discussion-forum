<div class="col-lg-4 col-md-4">

    <!-- -->
    <div class="sidebarblock">
        <h3>Up Coming Topics </h3>
        <div class="divline"></div>
        @if($commingTopics->count())
            @foreach($commingTopics as $topic)
                <div class="blocktxt">
                    <a href="#" class="pull-left">{{ $topic->title }}</a><br>
                     <div class="posted pull-left">
                        <i class="fa fa-clock-o"></i> Opening time: {{ \Carbon\Carbon::parse($topic->start_date)->diffForHumans() }}
                    </div>
                </div>
                <div class="divline"></div>
            @endforeach
        @else
            <div class="blocktxt">
                <a href="#" class="pull-left">No new topic is comming.</a><br>
                 
            </div>
        @endif
        
    </div>

    @if(checkPermission(['student']))

        @foreach($activeTopics as $activeTopic)
           <div class="sidebarblock">
                <h3>My Active Topics</h3>
                <div class="divline"></div>
                <div class="blocktxt">
                    <a href="{{ route('topicShow',$activeTopic->id) }}">{{ $activeTopic->title }}</a>
                </div>
            </div>
        @endforeach
    @endif
    
</div>