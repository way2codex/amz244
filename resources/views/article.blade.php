@extends('layouts.web.web')
@section('title')
<title><?php echo $data['name']; ?> - {{ store_data()['name'] }} </title>
@endsection
@section('content')


<!-- 1rd Block Wrapper Start -->
<section class="utf_block_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="single-post">
                    <div class="utf_post_title-area"> <a class="utf_post_cat" href="#"><?php echo $data['category']['name']; ?></a>
                        <h2 class="utf_post_title"><?php echo $data['name']; ?></h2>
                        <!-- <div class="utf_post_meta"> <span class="utf_post_author"> By <a href="#">John Wick</a> </span> <span class="utf_post_date"><i class="fa fa-clock-o"></i> 15 Jan, 2022</span> <span class="post-hits"><i class="fa fa-eye"></i> 21</span> <span class="post-comment"><i class="fa fa-comments-o"></i> <a href="#" class="comments-link"><span>01</span></a></span> </div> -->
                    </div>

                    <div class="utf_post_content-area">
                        
                        <div style="text-align: center;" class="entry-content">
                            <?php
                            if ($data['article_widget']->where('store_id', store_id())->first()) {
                                $widget_data = $data['article_widget']->where('store_id', store_id())->first()['widget_data'];
                            } else {
                                $widget_data = "";
                            }
                            echo $widget_data;
                            ?>
                        </div>
                        <div class="post-media post-featured-image">
                            
                                <img src="<?php echo  asset('uploads/article') . '/' . $data['image']; ?>" class="img-fluid" alt="">
                            
                        </div>
                        <div class="entry-content">
                            {!! $data['body']; !!}
                        </div>
                        <div style="text-align: center;" class="entry-content">
                            <?php
                            echo $widget_data;
                            ?>
                        </div>

                    </div>
                </div>



                <div class="related-posts block">
                    <h3 class="utf_block_title"><span>Related Posts</span></h3>
                    <div id="utf_latest_news_slide" class="row">
                        <?php foreach ($related_data as $key => $item) { ?>
                            <div class="col-md-3 col-sm-12 col-lg-3">
                                <div class="utf_post_block_style clearfix">
                                    <div class="">
                                        <a href="<?php echo route('article', [$item['id'], $item['slug']]); ?>">
                                            <img style="margin-bottom: 20px;" class="img-fluid" src="<?php echo  asset('uploads/article') . '/' . $item['image']; ?>" alt="" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            </div>
            @include('sidebar')

        </div>
    </div>
</section>
<!-- 1rd Block Wrapper End -->


@endsection