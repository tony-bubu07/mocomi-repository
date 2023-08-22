<?php
// php artisan make:migration add_column_role_users_table --table=usersで作成したもの

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// class AddColumnRoleUsersTable extends Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //  //roleカラムをTINYINT型でpasswordカラムの後に追加。更にインデックスを付与。
        // comment('ユーザーの種類')に変更
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('role')->default(0)->after('password')->index('index_role')->comment('ユーザーの種類');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');  //追記
        });
    }
};

// artisanコマンドでマイグレーションを実行 「php artisan migrate」