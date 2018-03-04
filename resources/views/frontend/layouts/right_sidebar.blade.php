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
        @if($activeTopics->count())

        @foreach($activeTopics as $activeTopic)
           <div class="sidebarblock">
                <h3>My Active Topics</h3>
                <div class="divline"></div>
                <div class="blocktxt">
                    <a href="{{ route('topicShow',$activeTopic->id) }}">{{ $activeTopic->title }}</a>
                </div>
            </div>
        @endforeach

        @else
            <div class="sidebarblock">
                <h3>My Active Topics</h3>
                <div class="divline"></div>
                <div class="blocktxt">
                    <h2>You has not posted any idea yet.</h2>
                </div>
            </div>
        @endif
    @endif

    @if(checkPermission(['qac','qam','staff']))

        @if($activeIdeas->count())

        @foreach($activeIdeas as $activeIdea)
           <div class="sidebarblock">
                <h3>My Latest Replies</h3>
                <div class="divline"></div>
                <div class="blocktxt">
                    <a href="{{ route('ideaShow',$activeIdea->id) }}">{{ $activeIdea->title }}</a>
                </div>
            </div>
        @endforeach
        @else
            <div class="sidebarblock">
                <h3>My Latest Replies</h3>
                <div class="divline"></div>
                <div class="blocktxt">
                    <h2>You has not posted any comment yet.</h2>
                </div>
            </div>
        @endif

    @endif
    
</div>