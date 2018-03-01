<div class="headernav">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-xs-3 col-sm-2 col-md-2 logo "><a href="index.html"><img src="images/logo.jpg" alt=""  /></a></div>
            <div class="col-lg-3 col-xs-9 col-sm-5 col-md-3 selecttopic">
                <div class="dropdown">
                    <a>UOG Forum</a> 
                   
                </div>
            </div>
            <div class="col-lg-4 search hidden-xs hidden-sm col-md-3">
                <div class="wrap">
                    <form action="#" method="post" class="form">
                        <div class="pull-left txt"><input type="text" class="form-control" placeholder="Search Topics"></div>
                        <div class="pull-right"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-xs-12 col-sm-5 col-md-4 avt">

                <div class="avatar pull-right dropdown">
                    <a data-toggle="dropdown" href="#"><img src="{{ asset('photos/avatar.png') }}" alt="" /></a> <b class="caret"></b>
                    
                    <ul class="dropdown-menu divider" role="menu">
                        @if(checkPermission(['admin','qac','qam','staff']))
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">{{ Auth::user()->staff->first_name . ' ' . Auth::user()->staff->last_name }}</a></li>
                        <div class="divline"></div>
                        <li role="presentation"><a role="menuitem" tabindex="-2" href="#">Go to dashboard</a></li>
                        
                        @endif
                        @if(checkPermission(['student']))
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">{{ Auth::user()->student->first_name . ' ' . Auth::user()->student->last_name }}</a></li>
                            
                        @endif

                        <div class="divline"></div>

                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">My Profile</a></li>
                        
                        <li role="presentation"><a role="menuitem" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" tabindex="-3" href="#">Log Out</a></li>
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </div>
                
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>