<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Mutterly | You're not alone</title>

        <title><?php echo config('app.name'); ?> | The premier poetry community</title>

        <!-- Meta -->
        <meta charset="UTF-8">

        <meta name="description" content="<?php echo config('app.description'); ?>">
        <meta name="keywords" content="<?php echo config('app.keywords'); ?>">
        <meta name="author" content="<?php echo config('app.author'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <link rel="alternate" hreflang="en" href="https://bea.com/" />

        <!-- Google -->
        <?php if($_SERVER['REMOTE_ADDR'] != "127.0.0.1"){ ?>
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144181603-1"></script>
            <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-144181603-1');
            </script>
        <?php } ?>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('images/mutterly_fav.png')); ?>"/>

        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

        <!-- Specific page stylesheet -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="<?php echo e(asset('css/'.$stylesheet.'.css')); ?>" rel="stylesheet" type="text/css"/>

        <!-- Script -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.2/js/all.js"></script>
    </head>
    <body>
        <div class="website row">
            <div class="sidebar-hold col-lg-3 col-md-4 d-lg-block d-md-block d-none">
                <?php echo $__env->make('templates.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="inner-website col-lg-9 col-md-8 col-sm-12 col-xs-12">
                <div style="padding: 0px;" class="header-hold col-sm-12 col-xs-12 d-xs-block d-sm-block d-xl-none d-lg-none d-md-none">
                    <?php echo $__env->make('templates.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <?php echo $__env->yieldContent('content'); ?>

                <div class="footer-hold">
                    <?php echo $__env->make('templates.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>

        <!-- Javascript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="<?php echo e(asset('js/global.js')); ?>" type="text/javascript"></script>

        <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        </script>

    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <script>
    $(function(){
        // Enable pusher logging - don't include this in production
        <?php if(env('APP_ENV') !== 'production'){ ?>
            Pusher.logToConsole = true;
        <?php } ?>

        var pusher = new Pusher("<?php echo env('PUSHER_APP_KEY'); ?>", {
            cluster: '<?php echo env('PUSHER_APP_CLUSTER'); ?>',
            encrypted: true
        });


        // Notifications
    });
    </script>
    </body>
</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/beautifulfears/resources/views/layouts/index.blade.php ENDPATH**/ ?>