<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    public function home() {

        $testimonials = Testimonial::where('is_active', 1)
        ->latest('id')
        ->limit(3)
        ->select(['id', 'client_name', 'client_designation', 'client_message', 'client_image'])
        ->get();

        $categories = Category::where('is_active', 1)
        ->latest('id')
        ->limit(5)
        ->get();

        $products = Product::where('is_active', 1)
        ->latest('id')
        ->select('id', 'product_name', 'slug', 'product_price', 'product_stock', 'product_rating', 'product_image')
        ->paginate(12);

    return view('frontend.pages.home', compact(
        'categories',
        'products',
        'testimonials'
    ));
    }

}
