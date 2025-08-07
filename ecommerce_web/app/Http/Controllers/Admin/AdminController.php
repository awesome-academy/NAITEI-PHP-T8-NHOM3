<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Get data for dashboard
        $categories = Category::count();
        $products = Product::count();
        $orders = Order::count();
        $recentOrders = Order::latest()->take(5)->get();
        
        // Sales data for chart
        $salesData = Order::selectRaw('MONTH(created_at) as month, SUM(total) as total')
            ->groupBy('month')
            ->get()
            ->toArray();
            
        return inertia('Admin/AdminDashboard', [
            'stats' => [
                'categories' => $categories,
                'products' => $products,
                'orders' => $orders,
            ],
            'recentOrders' => $recentOrders,
            'salesData' => $salesData,
        ]);
    }
    
    public function categories()
    {
        $categories = Category::all();
        return response()->json($categories);
    }
    
    public function storeCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        
        $category = Category::create($validated);
        
        return response()->json($category, 201);
    }
    
    public function updateCategory(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        
        $category->update($validated);
        
        return response()->json($category);
    }
    
    public function destroyCategory(Category $category)
    {
        $category->delete();
        return response()->json(null, 204);
    }
    
    // Similar methods for products and orders...
}