<div class="row">
    <div class="col-lg-12 text-break header_tags">
        <form method="POST">
            <button type="submit" name="recent" class="border-0"> Recent</button> 
            <?php
            $headertalink=mysqli_query($con, "SELECT CONCAT(YEAR(posts.date),'-',MONTHNAME(posts.date)) as motn,
                COUNT(*) as total,
                YEAR(posts.date) as Yearr, 
                posts.date as realdate 
                FROM posts,users,follow where 
            posts.user_unique_id=users.unique_id and (follow.follower='$user_identity' or 
            follow.following='$user_identity') and 
            (follow.follower=posts.user_unique_id or 
            follow.following=posts.user_unique_id) and
            (follow.follower=users.unique_id or
            follow.following=users.unique_id) and 
            follow.follow=1  GROUP BY motn ");





            if ($headertalink): 
               while ($extract=mysqli_fetch_array($headertalink)):
                if($extract['Yearr']==date("Y")):
               ?>
               <input type="hidden" name="sort_date" value="<?php echo$extract['motn']?>">
               <button class="border-0" name="sorting_date"> <?php echo$extract['motn'].", ". $extract['total'];?></button>
               <?php
            endif;
        endwhile; 
            endif;
            ?> 
        </form>
    </div>
</div> 
