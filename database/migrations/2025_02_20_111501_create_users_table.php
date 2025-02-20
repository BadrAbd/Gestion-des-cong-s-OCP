<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Remove this line, the ID likely already exists
            // $table->id();
            
            // Add your new columns
            $table->string('nom');
            $table->string('prenom');
            $table->foreignId('service_id')->constrained();
            
            // If timestamps don't exist yet
            if (!Schema::hasColumn('users', 'created_at')) {
                $table->timestamps();
            }
        });
    }
    
    public function down()
    {
        // This would drop the entire users table which may not be what you want
        // Instead, you should drop only the columns you added
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['nom', 'prenom']);
            $table->dropConstrainedForeignId('service_id');
        });
    }
};