<div class="container pt-5">
    
    <div class="row">
        <div class="col-8">
            <h2>Your tweets</h2>
            
            <div id="tweets"><?php display_tweets("yourTweets"); ?></div>
        
        </div>
        <div class="col-4">
        
            <?php display_search(); ?>
            
            <?php display_tweet_box(); ?>
        
        </div>
    </div>

</div>