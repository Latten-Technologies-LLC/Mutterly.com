<?php
$stylesheet = "index";

use App\Libraries\PostSystem;
use App\Libraries\LocationSystem;
use App\Libraries\FilterSystem;


$postSystem = new PostSystem();
$location = new LocationSystem();
$filter = new FilterSystem();

?>


<?php $__env->startSection('content'); ?>
    <div class="website-inner">
        <div class="topBanner">
            <div class="cover">
                <div class="topPostArea">
                        <h3>Whats on your mind?</h3>
                        <p>Mutterly is a safe haven for people to come and express their thoughts anonymously to the world. It's also a way for you to get meaningful advice from other anonymous users from across the world! Express your thoughts, and we'll send you text notifications when someone reaches out to you</p>
                    </div>
                    <div class="bottomPostArea">
                        <!-- Success -->
                        <div class="modal" tabindex="-1" role="dialog" id="successModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Success!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Thanks for sharing your thoughts! Sometimes we hold things in and allow it to fester inside of us. This is a platform that allows you to get those thoughts out of your mind and into the world without having to worry about being judged</p>
                                    <p class="bottom">
                                        If you're feeling suicidal or thinking of harming yourself, please call: <a href="tel:1-800-273-8255">1-800-273-8255</a>
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn close-btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </div>
                        </div>
    
                        <!-- Form -->
                        <form action="<?php echo e(route('posts.create')); ?>" method="post" id="postMakerForm">
                            <textarea name="postText" id="postText" placeholder="Whats on your mind?" max="240"></textarea>
                            <input type="tel" name="postNumber" id="postNumber" placeholder="Phone Number" /> 
                            <input type="submit" class="btn btn-success" value="Post" />
                        </form>
                    </div>
            </div>
        </div>
        <div class="topWebsite">
            <div class="innerTopWebsite">
                <div class="bottomFeed card-columns">
                    <?php
                        $posts = $postSystem->fetchAllThoughts();
        
                        foreach($posts as $post)
                        {
                            // Vars
                            $id = $post->id;
                            $thought_id = $post->thought_id;
                            $thought_ip = $post->thought_ip;
                            $thought_content = $post->thought_content;
                            $thought_date = $post->thought_date;
                            $thought_views = $post->thought_views;
                            $thought_state = $post->thought_state;
        
                            // Comments
                            $comments = $postSystem->fetchComments($thought_id);
        
                            // Format
                            /* function timeago($date) {
                                $timestamp = strtotime($date);	
                                
                                $strTime = array("second", "minute", "hour", "day", "month", "year");
                                $length = array("60","60","24","30","12","10");

                                $currentTime = time();
                                if($currentTime >= $timestamp) {
                                    $diff     = time()- $timestamp;
                                    for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
                                    $diff = $diff / $length[$i];
                                    }

                                    $diff = round($diff);
                                    return $diff . " " . $strTime[$i] . "(s) ago ";
                                }
                            } */

                            // IP
                            $local = $location->getInfo($thought_ip);
                            $city = "";

                            if($thought_ip != "127.0.0.1")
                            {
                                if(!empty($local->geobytesregion))
                                {
                                    // Lets update the city in db
                                    DB::table('thoughts')->where('thought_id', $thought_id)->update(['thought_state' => $local->geobytesregion]);

                                    $city = $local->geobytesregion;
                                }else{
                                    $city = $thought_state;
                                }
                            }else{
                                $city = "Ohio";
                            }

                            // Likes
                            $likes = $postSystem->fetchLikes($thought_id);
                        
                            ?>
                            <div class="post card">
                                <div class="post-mold">
                                    <div class="innerPost">
                                        <div class="topPost">
                                            <p><?php echo $filter->santitize($thought_content); ?></p>
                                            <div class="actions">
                                                <a href="/thought/<?php echo $thought_id; ?>">Show support</a>
                                                <a class="likeBtn" id="likeBtn-<?php echo $thought_id; ?>" data-id="<?php echo $thought_id; ?>"><span class="icon animated" id="icon-<?php echo $thought_id; ?>"><i class="far fa-heart"></i></span> <span class="count" id="count-<?php echo $thought_id; ?>"><?php echo count($likes); ?></span></a>
                                            </div>
                                        </div>
                                        <div class="bottomPost">
                                            <div class="bottomArea">
                                                <span><?php echo $city; ?></span> <span style="float: right;"><?php //echo timeago($thought_date); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/beautifulfears/resources/views/index.blade.php ENDPATH**/ ?>