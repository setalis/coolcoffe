<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoffeeController extends Controller
{
    public function index()
    {
        $coffees = Coffee::where('active', true)->get();
        return view('admin.coffee.index', compact('coffees'));
    }

    public function adminIndex()
    {
        $coffees = Coffee::all();
        \Log::info('Загружены кофе:', ['count' => $coffees->count()]);
        return view('admin.coffee.index', compact('coffees'));
    }

    public function order(Coffee $coffee)
    {
        return view('coffee.order', compact('coffee'));
    }

    public function destroy(Coffee $coffee)
    {
        try {
            // Удаляем изображение, если оно есть
            if ($coffee->image) {
                Storage::disk('public')->delete($coffee->image);
            }
            
            $coffee->delete();
            
            return redirect()->route('admin.coffee.index')
                ->with('success', 'Кофе успешно удален');
        } catch (\Exception $e) {
            return redirect()->route('admin.coffee.index')
                ->with('error', 'Ошибка при удалении кофе: ' . $e->getMessage());
        }
    }
}
