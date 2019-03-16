
<div class="container pt-5">

    <div class="row">

        <div class="col-8">
            <h2>Recent tweets</h2>
            
            <div id="tweets"><?php display_tweets("public"); ?></div>
        
        </div>

        <div class="col-4">
        
            <?php display_search(); ?>
            
            <?php display_tweet_box(); ?>
        
        </div>

    </div>

</div>

