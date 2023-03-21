<div class="col-lg-4 col-md-12">
    <div class="sidebar utf_sidebar_right">
        <!-- <div class="widget">
            <h3 class="utf_block_title"><span>Follow Us</span></h3>
            <ul class="social-icon">
                <li><a href="#" target="_blank"><i class="fa fa-rss"></i></a></li>
                <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>
                <li><a href="#" target="_blank"><i class="fa fa-youtube"></i></a></li>
            </ul>
        </div> -->
        <?php if (store_data()['sidebar_script'] != "") { ?>
            <div class="widget widget-tags">
                <?php echo store_data()['sidebar_script']; ?>
            </div>
        <?php } ?>
        <div class="widget color-default">
            <h3 class="utf_block_title"><span>Popular</span></h3>
            <div class="utf_list_post_block">
                <ul class="utf_list_post">
                    <?php foreach (popular_article(10) as $key => $item) { ?>
                        <li class="clearfix">
                            <div class="utf_post_block_style post-float col-md-12 clearfix">
                                <a href="<?php echo route('article', [$item['id'], $item['slug']]); ?>">
                                    <div class="utf_post_thumb">
                                        <img class="img-fluid" src="<?php echo  asset('uploads/article') . '/' . $item['image']; ?>" alt="" />
                                    </div>
                                </a>
                              
                            </div>
                        </li>
                    <?php } ?>

                </ul>
            </div>
        </div>
        <div class="widget widget-tags">
            <h3 class="utf_block_title"><span>Categories</span></h3>
            <ul class="unstyled clearfix">
                <?php foreach (all_category() as $key => $all_category_item) { ?>
                    <li> <a href="<?php echo route('category', [$all_category_item['id'], $all_category_item['slug']]); ?>">{{ $all_category_item['name'] }}</a> </li>
                <?php } ?>
            </ul>
        </div>
       
    </div>
</div>