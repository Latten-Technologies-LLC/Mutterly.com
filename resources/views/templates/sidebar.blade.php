<!-- header -->
<div class="inner-sidebar">
    <div class="topSidebar">
        <h3><a href="{{  route('index.index') }}">Mutterly<sup style="font-size: .4em;margin-left: 5px;position: relative;top: -15px;">Beta <?php echo env('APP_VERSION'); ?></sup></a></h3>
        <p>You're not alone. Share your thoughts and ideas with the world, and get valuable feedback from the world</p>
    </div>
    <div class="middleSidebar">
        <ul class="specialLinkList">
            <?php if(!Auth::user()){ ?>
                <li><a class="modal-caller" data-type="signupUser" href='{{ route('index.index') }}'>Share your thoughts</a></li>
            <?php } else { ?>
                <li><a class="modal-caller" data-type="startNewPost" href='{{ route('index.index') }}'>Share your thoughts</a></li>
            <?php } ?>
        </ul>
        <ul class="ordinaryLinkList">
            <?php if(!auth::user()){ ?>
                <li><a href="{{ route('login') }}">Login</a></li>
            <?php } else { ?>
                <li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
            <?php } ?>
            <li><a href="{{ route('index.about') }}">About</a></li>
            <li><a href="mailto:hello@sitelyftstudios.com">Contact</a></li>
        </ul>
    </div>
    <div class="bottomSidebar">
        <p class="sidenote">A <a href="https://sitelyftstudios.com">Sitelyft Studios</A> project</p>
        <span>20<?php echo date('y'); ?> &copy; Copyright</span>
    </div>
</div>