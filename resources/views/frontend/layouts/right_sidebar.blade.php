<div class="col-lg-4 col-md-4">



    <!-- -->
    <div class="sidebarblock">
        <h3>Up Coming Topics </h3>
        <div class="divline"></div>
        @foreach($topics as $topic)
            <div class="blocktxt">
                <a href="#" class="pull-left">{{ $topic->title }}</a><br>
                 <div class="posted pull-left">
                    <i class="fa fa-clock-o"></i> Opening time: {{ \Carbon\Carbon::parse($topic->end_date)->diffForHumans() }}
                </div>
            </div>
            <div class="divline"></div>
        @endforeach
        
    </div>


       <div class="sidebarblock">
        <h3>My Active Threads</h3>
        <div class="divline"></div>
        <div class="blocktxt">
            <a href="#">This Dock Turns Your iPhone Into a Bedside Lamp</a>
        </div>
        <div class="divline"></div>
        <div class="blocktxt">
            <a href="#">Who Wins in the Battle for Power on the Internet?</a>
        </div>
        <div class="divline"></div>
        <div class="blocktxt">
            <a href="#">Sony QX10: A Funky, Overpriced Lens Camera for Your Smartphone</a>
        </div>
        <div class="divline"></div>
        <div class="blocktxt">
            <a href="#">FedEx Simplifies Shipping for Small Businesses</a>
        </div>
        <div class="divline"></div>
        <div class="blocktxt">
            <a href="#">Loud and Brave: Saudi Women Set to Protest Driving Ban</a>
        </div>
    </div>
    
</div>