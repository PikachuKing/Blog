<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->comment('用户ID');
            $table->unsignedBigInteger('category_id')->comment('分类ID');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('title')->nullable(false)->comment('标题');
            $table->string('slug')->unique();
            $table->string('description')->nullable()->comment('摘要');
            $table->text('content')->nullable(false)->comment('内容');
            $table->boolean('is_draft')->default(false)->comment('是否是草稿');
            $table->integer('view_number')->default(0)->comment('阅读数');
            $table->timestamp('published_at')->nullable()->comment('发布时间');
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
        Schema::dropIfExists('articles');
    }
}
