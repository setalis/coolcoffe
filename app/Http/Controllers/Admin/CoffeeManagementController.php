<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CoffeeOrder;
use App\Models\Coffee;
use Illuminate\Support\Facades\Storage;

class CoffeeManagementController extends Controller
{
    /**
     * Показать страницу управления кофе
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.coffee.index');
    }

    /**
     * Показать страницу со списком заказов кофе
     *
     * @return \Illuminate\View\View
     */
    public function orders()
    {
        $orders = CoffeeOrder::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.coffee.orders', compact('orders'));
    }

    public function viewOrder($id)
    {
        $order = CoffeeOrder::find($id);
        return view('admin.coffee.view_order', compact('order'));
    }

    /**
     * Удалить кофе
     *
     * @param Coffee $coffee
     * @return \Illuminate\Http\RedirectResponse
     */
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