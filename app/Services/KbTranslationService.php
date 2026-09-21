<?php

namespace AppServices;

class KbTranslationService
{
    private static ?array $translations = null;
    private static ?array $reverseMap = null;

    /**
     * Load knowledge base Chinese translations from lang/zh/kb.php or config/kb_zh.php.
     */
    private static function load(): array
    {
        if (self::$translations !== null) {
            return self::$translations;
        }

        $path = lang_path('zh/kb.php');
        if (file_exists($path)) {
            $data = require $path;
            if (is_array($data)) {
                self::$translations = $data;
                return self::$translations;
            }
        }

        $configPath = config_path('kb_zh.php');
        if (file_exists($configPath)) {
            $data = require $configPath;
            if (is_array($data)) {
                self::$translations = $data;
                return self::$translations;
            }
        }

        self::$translations = ['categories' => [], 'articles' => []];
        return self::$translations;
    }

    /**
     * Build reverse mapping (Chinese -> English) for fallback when database content is in Chinese.
     */
    private static function getReverseMap(): array
    {
        if (self::$reverseMap !== null) {
            return self::$reverseMap;
        }

        $data = self::load();
        $revCats = [];
        foreach ($data['categories'] ?? [] as $eng => $zh) {
            if (isset($zh['name'])) {
                $revCats[$zh['name']] = [
                    'name' => $eng,
                    'description' => $zh['eng_description'] ?? null,
                ];
            }
        }

        $revArts = [];
        foreach ($data['articles'] ?? [] as $eng => $zh) {
            if (isset($zh['title'])) {
                $revArts[$zh['title']] = [
                    'title' => $eng,
                    'article' => $zh['eng_article'] ?? null,
                ];
            }
        }

        self::$reverseMap = ['categories' => $revCats, 'articles' => $revArts];
        return self::$reverseMap;
    }

    /**
     * Check if the current application locale is Chinese.
     */
    public static function isZh(): bool
    {
        $locale = (string) app()->getLocale();
        return $locale === 'zh' || str_starts_with($locale, 'zh');
    }

    /**
     * Translate category name.
     */
    public static function translateCategoryName(?string $name): ?string
    {
        if (! $name) {
            return $name;
        }

        $data = self::load();

        if (self::isZh()) {
            return $data['categories'][$name]['name'] ?? $name;
        }

        $rev = self::getReverseMap();
        return $rev['categories'][$name]['name'] ?? $name;
    }

    /**
     * Translate category description.
     */
    public static function translateCategoryDescription(?string $desc, ?string $catName = null): ?string
    {
        if (! $desc) {
            return $desc;
        }

        $data = self::load();

        if (self::isZh()) {
            if ($catName && isset($data['categories'][$catName]['description'])) {
                return $data['categories'][$catName]['description'];
            }
            return $desc;
        }

        if ($catName) {
            $rev = self::getReverseMap();
            if (isset($rev['categories'][$catName]['description'])) {
                return $rev['categories'][$catName]['description'];
            }
        }

        return $desc;
    }

    /**
     * Translate article title.
     */
    public static function translateArticleTitle(?string $title): ?string
    {
        if (! $title) {
            return $title;
        }

        $data = self::load();

        if (self::isZh()) {
            return $data['articles'][$title]['title'] ?? $title;
        }

        $rev = self::getReverseMap();
        return $rev['articles'][$title]['title'] ?? $title;
    }

    /**
     * Translate article body.
     */
    public static function translateArticleBody(?string $body, ?string $title = null): ?string
    {
        if (! $body) {
            return $body;
        }

        $data = self::load();

        if (self::isZh()) {
            if ($title && isset($data['articles'][$title]['article'])) {
                return $data['articles'][$title]['article'];
            }
            return $body;
        }

        if ($title) {
            $rev = self::getReverseMap();
            if (isset($rev['articles'][$title]['article'])) {
                return $rev['articles'][$title]['article'];
            }
        }

        return $body;
    }
}
