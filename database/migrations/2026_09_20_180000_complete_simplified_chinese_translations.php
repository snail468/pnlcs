<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

return new class extends Migration
{
    /**
     * Complete Simplified Chinese (zh) localization migration:
     * 1. Synchronizes all lang/zh/*.php translation keys into the dynamic_translations table.
     * 2. Sets 'zh' (Simplified Chinese) to is_active = true in the languages table.
     * 3. Flushes translation cache to ensure immediate activation.
     */
    public function up(): void
    {
        $dir = lang_path('zh');
        if (File::isDirectory($dir)) {
            $now = now();
            foreach (File::files($dir) as $file) {
                if ($file->getExtension() !== 'php') {
                    continue;
                }
                $group = $file->getFilenameWithoutExtension();
                $values = require $file->getPathname();
                if (! is_array($values)) {
                    continue;
                }
                foreach ($this->flatten($values) as $key => $value) {
                    if (! is_string($value) || trim($value) === '') {
                        continue;
                    }
                    $exists = DB::table('dynamic_translations')
                        ->where(['language' => 'zh', 'group' => $group, 'key' => $key])
                        ->exists();

                    if (! $exists) {
                        DB::table('dynamic_translations')->insert([
                            'language' => 'zh',
                            'group' => $group,
                            'key' => $key,
                            'value' => $value,
                            'is_auto_translated' => false,
                            'is_reviewed' => true,
                            'created_at' => $now,
                            'updated_at' => $now,
                        ]);
                    }
                }
            }
        }

        // Activate Simplified Chinese in languages table
        DB::table('languages')->where('code', 'zh')->update([
            'name' => 'Simplified Chinese',
            'native_name' => '简体中文',
            'is_active' => true,
            'flag_code' => 'cn',
            'direction' => 'ltr',
        ]);

        // Invalidate translation cache
        try {
            foreach (['admin', 'client', 'common', 'email', 'messages', 'sections', 'auth', 'errors', 'pdf'] as $group) {
                Cache::forget("translations:zh:{$group}");
            }
        } catch (\Throwable $e) {
        }
    }

    public function down(): void
    {
        // Keep user data safe; no clobbering on rollback
    }

    private function flatten(array $values, string $prefix = ''): array
    {
        $result = [];
        foreach ($values as $key => $value) {
            $fullKey = $prefix === '' ? (string) $key : $prefix.'.'.$key;
            if (is_array($value)) {
                foreach ($this->flatten($value, $fullKey) as $nestedKey => $nestedValue) {
                    $result[$nestedKey] = $nestedValue;
                }
            } elseif (is_string($value)) {
                $result[$fullKey] = $value;
            }
        }
        return $result;
    }
};
