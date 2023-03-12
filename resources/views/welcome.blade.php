@extends('layouts.web.web')

@section('title')
<title>{{ store_data()['name'] }}</title>
@endsection
@section('content')


<?php
// dd($data);
?>

<section class="utf_block_wrapper">
    <div class="container">
        <div class="row">
            <?php foreach ($data as $key => $category_item) { ?>
                <div class="col-lg-5" 
                style="margin-right: auto; margin-top: 10px; border: 2px dotted #ff3131; padding: 10px;">
                    <div class="block color-red">
                        <h3 class="utf_block_title"><span>{{ $category_item['name'] }}</span></h3>
                        <div class="utf_list_post_block">
                            <ul class="utf_list_post">
                                <?php
                                $category_item->load('article_custom_limit');
                                $article_data = $category_item['article_custom_limit'];
                                ?>
                                <?php foreach ($article_data as $key_article => $article_item) { ?>
                                    <li class="clearfix">
                                        <div class="utf_post_block_style post-float clearfix">
                                            <div class="utf_post_content">
                                                <h2 class="utf_post_title title-small">
                                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                    <a href="{{ route('article',[$article_item['id'],$article_item['slug']]) }}">
                                                        {{ $article_item['name'] }}
                                                    </a>
                                                </h2>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                                <center>
                                    <a class="btn btn-info" href="{{ route('category',[$category_item['id'],$category_item['slug']]) }}">
                                        View All
                                    </a>
                                </center>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

@endsection