<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // SQLite doesn't support MODIFY COLUMN or ENUM, so we'll skip this migration for SQLite
        // The payment_method column is already a string type in SQLite, which accepts any value
        if (DB::getDriverName() !== 'sqlite') {
            DB::statement("ALTER TABLE donations MODIFY COLUMN payment_method ENUM('bank_transfer', 'ewallet', 'credit_card', 'midtrans') NOT NULL");
        }
    }

    public function down()
    {
        if (DB::getDriverName() !== 'sqlite') {
            DB::statement("ALTER TABLE donations MODIFY COLUMN payment_method ENUM('bank_transfer', 'ewallet', 'credit_card') NOT NULL");
        }
    }
};
