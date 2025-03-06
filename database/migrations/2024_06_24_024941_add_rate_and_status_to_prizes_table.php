<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('prizes', function (Blueprint $table) {
            if (!Schema::hasColumn('prizes', 'winning_rate')) {
                $table->decimal('winning_rate', 5, 2)->notNull()->after('quantity');
            }
            if (!Schema::hasColumn('prizes', 'status')) {
                $table->enum('status', ['active', 'inactive'])->notNull()->after('winning_rate');
            }
        });
    }
    
    public function down()
    {
        Schema::table('prizes', function (Blueprint $table) {
            if (Schema::hasColumn('prizes', 'winning_rate')) {
                $table->dropColumn('winning_rate');
            }
            if (Schema::hasColumn('prizes', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
