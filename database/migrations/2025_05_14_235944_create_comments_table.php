<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //  テーブルの構造を定義
    public function up(): void {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();              // id（主キー）カラムを作成
            $table->string('body');    // コメント本文を保存する文字列型カラム
            $table->timestamps();      // created_at と updated_at を自動で作成
            $table
                ->foreignId('post_id')         // postsテーブルのIDと関連づける外部キー用カラム。単数なので注意。
                ->constrained()                // 外部キー制約を設定（posts.id に自動で関連づけ）
                ->cascadeOnDelete();           // 関連する投稿が削除されたら、コメントも自動削除される
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
