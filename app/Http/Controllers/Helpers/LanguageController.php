<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
public function switchLang($lang)
    {
        if (!in_array($lang, ['en', 'id'])) {
            abort(400);
        }

        Session::put('locale', $lang);
        App::setLocale($lang);

        // Redirect back to current page with new locale
        $currentPath = request()->headers->get('referer', '/');
        $newPath = $this->replaceLocaleInUrl($currentPath, $lang);
        
        return redirect($newPath);
    }

    public function getCurrentLanguage()
    {
        return response()->json([
            'language' => app()->getLocale()
        ]);
    }

    /**
     * Replace locale in URL
     */
    private function replaceLocaleInUrl($url, $newLocale)
    {
        $parsedUrl = parse_url($url);
        $path = $parsedUrl['path'] ?? '';
        
        // Pattern untuk match /{locale}/home atau /{locale}/other-paths
        $pattern = '#^/(en|id)(/.*)?$#';
        
        if (preg_match($pattern, $path, $matches)) {
            // Replace existing locale
            $newPath = preg_replace($pattern, "/{$newLocale}$2", $path);
        } else {
            // Insert locale at beginning
            $newPath = "/{$newLocale}" . ($path === '/' ? '/home' : $path);
        }
        
        // Rebuild URL
        $newUrl = $newPath;
        if (isset($parsedUrl['query'])) {
            $newUrl .= '?' . $parsedUrl['query'];
        }
        if (isset($parsedUrl['fragment'])) {
            $newUrl .= '#' . $parsedUrl['fragment'];
        }
        
        return $newUrl;
    }
}
