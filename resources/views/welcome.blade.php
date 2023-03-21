@extends('layouts.web.web')

@section('title')
<title>{{ store_data()['name'] }}</title>
@endsection
@section('content')

<!-- Page Title Start -->
<!-- <div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li>Technology</li>
                </ul>
            </div>
        </div>
    </div>
</div> -->
<!-- Page title end -->


<section class="utf_block_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="block category-listing category-style2">
                    <!-- <h3 class="utf_block_title"><span>Technology News</span></h3>
                    <ul class="subCategory unstyled">
                        <li><a href="#">Traveling</a></li>
                        <li><a href="#">Games</a></li>
                        <li><a href="#">Lifestyle</a></li>
                    </ul> -->
                    <div class="utf_post_block_style post-list clearfix">
                        <div class="row">
                            <?php foreach ($data as $key => $item) { ?>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <a href="<?php echo route('article', [$item['id'], $item['slug']]); ?>">
                                        <!-- <div class="utf_post_thumb thumb-float-style"> -->
                                            <img style="padding-bottom: 10px;" class="img-fluid" src="<?php echo  asset('uploads/article') . '/' . $item['image']; ?>" alt="{{ $item['name'] }}" />
                                            <!-- <a class="utf_post_cat" style="color: white;">{{ $item['category']['name'] }}</a> -->
                                        <!-- </div> -->
                                    </a>
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                </div>

                {!! $data->links() !!}
            </div>

            @include('sidebar')

        </div>
    </div>
</section>

@endsection