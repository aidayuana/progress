<?php

use App\Models\Konfigurasi\Menu;
use App\Repositories\MenuRepository;
use Illuminate\Support\Facades\Cache;

if (! function_exists('responseError')) {
    function responseError(\Exception | string $th)
    {
        $message = 'Terjadi kesalahan, silahkan coba beberapa saat lagi';
        if ($th instanceof \Exception) {
            if (config('app.debug')) {
                $message = $th->getMessage();
                $message .= ' in line ' . $th->getLine(). ' at ' . $th->getFile();
                $data = $th->getTrace();
            }
        } else {
            $message = $th;
        }
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'errors' => $data ?? null,
        ], 500);
    }
}

if(!function_exists('responseSuccess')) {
    function responseSuccess($isEdit = false)
    {
        return response()->json([
            'status' => 'success',
            'message' => $isEdit ? 'Update data successfully' : 'Create data successfully',
        ]);
    }
}

if(!function_exists('responseSuccessDelete')) {
    function responseSuccessDelete()
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Delete data successfully',
        ]);
    }
}

if(!function_exists('menus')) {
    /**
     * @return Collection
     */
    function menus()
    {
        if (!Cache::has('menus')) {
            $menus = (new MenuRepository())->getMenus()->groupBy('category');
            
            Cache::forever('menus', $menus);
        } else {
            $menus = Cache::get('menus');
        }

        return $menus;
    }
}

if (!function_exists('urlMenu')) {
    function urlMenu()
    {
        if(!Cache::has('urlMenu')) {
            
            $menus = menus()->flatMap(fn ($item) => $item);
            
            $url = [];
            foreach ($menus as $mm) {
                $url[] = $mm->url;
                foreach ($mm->subMenus as $sm) {
                    $url[] = $sm->url;
                }
            }
            
            Cache::forever('urlMenu', $url);
        } else {
            $url = Cache::get('urlMenu');
        }
        return $url;
    }
}

if (!function_exists('notifications')) {
    function notifications()
    {
        return user()->notifications;
    }
}

if (!function_exists('user')) {
    /**
     * @param string $id
     * @return \App\Models\User | string
     */
    function user($id = null)
    {
        if ($id) {
            return request()->user()->{$id};
        }
        return request()->user();
    }
}
?>