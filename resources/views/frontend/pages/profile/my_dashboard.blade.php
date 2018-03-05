@extends ('frontend.layouts.master')

@section('page_title', 'View Topic')

@section('main_content')

<div class="container">
    <div class="row">
        <div class="col-lg-8 breadcrumbf">
            <a href="{{ route('home') }}">UOG Forum</a> <span class="diviver">&gt;</span> <a>My Dashboard</a>
        </div>
    </div>
</div>

<div class="container">

    <h1 style="color: #697683;">Welcome Mosharrf Hossain!</h1>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default panel-counter">
                <div class="panel-heading pnl-head">Idea</div>
                <div class="panel-body pnl-body">0</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default panel-counter">
                <div class="panel-heading pnl-head">Replies</div>
                <div class="panel-body pnl-body">0</div>
            </div>
        </div>
        
    </div>

    <div class="row profile-latest-items">
        <div class="col-md-6">
            <h3>Latest Idea</h3>
			<div class="list-group">
                <a href="https://laravel.io/forum/facebook-share-not-working-with-mobile-devices" class="list-group-item">
                    <h4 class="list-group-item-heading">Facebook Share Not Working With Mobile Devices?</h4>
                    <p class="list-group-item-text">I recently had a new project developed in Laravel, the original developer is currently out-of-town a...</p>
                </a>
            </div>
            <p class="text-center">Mosharrf Hossain has not posted any threads yet.</p>
        </div>
        <div class="col-md-6">
            <h3>Latest Replies</h3>

            <p class="text-center">Mosharrf Hossain has not posted any replies yet.</p>
        </div>
    </div>
</div>

@endsection