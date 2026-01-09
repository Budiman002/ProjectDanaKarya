<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Check if using SQLite
        if (DB::getDriverName() === 'sqlite') {
            // SQLite doesn't support ALTER COLUMN, so we need to recreate the table
            // First, create a temporary table with the new structure
            DB::statement('CREATE TABLE donations_new (
                id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                user_id INTEGER NOT NULL,
                campaign_id INTEGER NOT NULL,
                amount NUMERIC(15, 2) NOT NULL,
                payment_method TEXT NOT NULL CHECK(payment_method IN (\'transfer_bank\', \'e_wallet\', \'midtrans\')) DEFAULT \'transfer_bank\',
                payment_proof TEXT,
                status TEXT NOT NULL CHECK(status IN (\'pending\', \'confirmed\', \'failed\')) DEFAULT \'pending\',
                transaction_code VARCHAR(50) NOT NULL UNIQUE,
                message TEXT,
                snap_token TEXT,
                bank_name VARCHAR(100),
                va_number VARCHAR(50),
                created_at DATETIME,
                updated_at DATETIME,
                FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE,
                FOREIGN KEY(campaign_id) REFERENCES campaigns(id) ON DELETE CASCADE
            )');

            // Copy data from old table to new table
            DB::statement('INSERT INTO donations_new SELECT * FROM donations');

            // Drop old table
            DB::statement('DROP TABLE donations');

            // Rename new table to original name
            DB::statement('ALTER TABLE donations_new RENAME TO donations');
        } else {
            // For MySQL/PostgreSQL
            DB::statement("ALTER TABLE donations MODIFY COLUMN payment_method ENUM('transfer_bank', 'e_wallet', 'midtrans') DEFAULT 'transfer_bank'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Check if using SQLite
        if (DB::getDriverName() === 'sqlite') {
            // Recreate table without midtrans
            DB::statement('CREATE TABLE donations_new (
                id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                user_id INTEGER NOT NULL,
                campaign_id INTEGER NOT NULL,
                amount NUMERIC(15, 2) NOT NULL,
                payment_method TEXT NOT NULL CHECK(payment_method IN (\'transfer_bank\', \'e_wallet\')) DEFAULT \'transfer_bank\',
                payment_proof TEXT,
                status TEXT NOT NULL CHECK(status IN (\'pending\', \'confirmed\', \'failed\')) DEFAULT \'pending\',
                transaction_code VARCHAR(50) NOT NULL UNIQUE,
                message TEXT,
                snap_token TEXT,
                bank_name VARCHAR(100),
                va_number VARCHAR(50),
                created_at DATETIME,
                updated_at DATETIME,
                FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE,
                FOREIGN KEY(campaign_id) REFERENCES campaigns(id) ON DELETE CASCADE
            )');

            DB::statement('INSERT INTO donations_new SELECT * FROM donations WHERE payment_method != \'midtrans\'');
            DB::statement('DROP TABLE donations');
            DB::statement('ALTER TABLE donations_new RENAME TO donations');
        } else {
            DB::statement("ALTER TABLE donations MODIFY COLUMN payment_method ENUM('transfer_bank', 'e_wallet') DEFAULT 'transfer_bank'");
        }
    }
};
