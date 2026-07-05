<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. About Us
        $aboutUsItems = DB::table('about_us')->get();
        foreach ($aboutUsItems as $item) {
            DB::table('about_us')->where('id', $item->id)->update([
                'subtitle' => json_encode(['id' => $item->subtitle, 'en' => $item->subtitle]),
                'title' => json_encode(['id' => $item->title, 'en' => $item->title]),
                'content' => json_encode(['id' => $item->content, 'en' => $item->content]),
            ]);
        }
        Schema::table('about_us', function (Blueprint $table) {
            $table->json('subtitle')->change();
            $table->json('title')->change();
            $table->json('content')->change();
        });

        // 2. Services
        $services = DB::table('services')->get();
        foreach ($services as $item) {
            $features = json_decode($item->features, true);
            DB::table('services')->where('id', $item->id)->update([
                'title' => json_encode(['id' => $item->title, 'en' => $item->title]),
                'description' => json_encode(['id' => $item->description, 'en' => $item->description]),
                'features' => json_encode(['id' => $features, 'en' => $features]),
            ]);
        }
        Schema::table('services', function (Blueprint $table) {
            $table->json('title')->change();
            $table->json('description')->change();
            // features is already json, but we resave it just in case
        });

        // 3. Service Settings
        $serviceSettings = DB::table('service_settings')->get();
        foreach ($serviceSettings as $item) {
            DB::table('service_settings')->where('id', $item->id)->update([
                'subtitle' => json_encode(['id' => $item->subtitle, 'en' => $item->subtitle]),
                'title' => json_encode(['id' => $item->title, 'en' => $item->title]),
                'quote_title' => json_encode(['id' => $item->quote_title, 'en' => $item->quote_title]),
                'quote_subtitle' => json_encode(['id' => $item->quote_subtitle, 'en' => $item->quote_subtitle]),
            ]);
        }
        Schema::table('service_settings', function (Blueprint $table) {
            $table->json('subtitle')->change();
            $table->json('title')->change();
            $table->json('quote_title')->change();
            $table->json('quote_subtitle')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reverting from JSON back to strings is possible by extracting the 'id' value.
        // For simplicity, we just change the column types back to text/varchar in down().
        Schema::table('about_us', function (Blueprint $table) {
            $table->string('subtitle')->change();
            $table->string('title')->change();
            $table->text('content')->change();
        });

        Schema::table('services', function (Blueprint $table) {
            $table->string('title')->change();
            $table->text('description')->change();
        });

        Schema::table('service_settings', function (Blueprint $table) {
            $table->string('subtitle')->change();
            $table->string('title')->change();
            $table->string('quote_title')->change();
            $table->string('quote_subtitle')->change();
        });
    }
};
