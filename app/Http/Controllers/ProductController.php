<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): Collection
    {
        return Product::all();
    }

    public function store(Request $request): Product
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required'
        ]);
        return Product::create($request->all());
    }

    public function show(int $id): Product
    {
        return Product::find($id);
    }

    public function update(Request $request, int $id): Product
    {
        $product = Product::find($id);
        $product->update($request->all());
        return $product;
    }

    public function destroy(int $id): int
    {
        return Product::destroy($id);

    }

    public function search(string $name): Product|Collection
    {
        return Product::where('name', 'like', "%{$name}%")->get();

    }
}
