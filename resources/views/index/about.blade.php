<?php
$stylesheet = "index";

use App\Libraries\PostSystem;
use App\Libraries\LocationSystem;

$postSystem = new PostSystem();
$location = new LocationSystem();
?>
@extends('layouts.index')

@section('content')
    <div class="website-inner">
        <div class="topBanner">
            <div class="cover">
                <div class="topPostArea">
                        <h3>About Mutterly</h3>
                        <p>Whats the purpose of this website?</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="topWebsite about">
            <div class="innerTopWebsite">
                <div class="bottomFeed">
                    <p>Mutterly is a safe haven for people to come and express their thoughts anonymously to the world. It's also a way for you to get meaningful advice from other anonymous users from across the world! Express your thoughts, and we'll send you text notifications when someone reaches out to you</p>
                    
                </div>
            </div>
        </div>
    </div>
@endsection