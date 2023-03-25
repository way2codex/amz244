<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleCampaignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_campaign', function (Blueprint $table) {
            $table->id();
            $table->integer('store_id')->nullable();
            $table->integer('campaign_id')->nullable();
            $table->string('name')->nullable();
            $table->string('url')->nullable();
            $table->string('status')->nullable()->default('inactive')->comment('active,inactve');
            $table->integer('total_views')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_campaign');
    }
}
