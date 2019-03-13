<div class="container pt-5">

    <div class="row">
        <div class="col-8">

            <?php if(isset($_GET["userid"])){ ?>
            
                <div id="tweets"><?php display_tweets($_GET["userid"]); ?></div>
                
            <?php } else { ?>

                <h2>Active Users</h2>

                <div><?php display_users(); ?></div>

            <?php } ?>

        </div>
        <div class="col-4">

            <?php display_search(); ?>

            <?php display_tweet_box(); ?>

        </div>
    </div>

</div>