<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Traits\APIResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use APIResponse;

    private $STOCK_LOW = 0;
    private $STOCK_MEDIUM = 5;
    private $STOCK_READY = 20;

    public function addForm(){
        $types = Product::pluck('type')->unique()->values();
        $units = Product::pluck('unit')->unique()->values();
        $materialFamilies = Product::pluck('material_family')->unique()->values();
        $brands = Product::pluck('brand')->unique()->values();
        return view('pages.product-form.index', compact('types', 'units', 'materialFamilies', 'brands'));
    }

    public function getProducts() {
        if(!request()->query("type")) {
            return redirect(request()->fullUrlWithQuery(["type" => "materials"]));
        }

        $type = request()->query("type");
        $filter = request()->query("active");
        $search = request()->query("search");

        $products = Product::where("type", $type)
            ->when($filter == "stock-low", function($p) {
                return $p->where("quantity", "<=", $this->STOCK_LOW);
            })
            ->when($filter == "stock-medium", function($p) {
                return $p->whereBetween("quantity", [$this->STOCK_LOW, $this->STOCK_MEDIUM]);
            })
            ->when($filter == "stock-ready", function($p) {
                return $p->where("quantity", ">=", $this->STOCK_READY);
            })
            ->when($search, fn($p) => $p->search($search))
            ->paginate(20);

        return view("pages.inventory.index", compact("products"));
    }

    public function getProduct($code) {
        $product = Product::find($code);
        if($product == null) {
            return $this->error("The product with the code $code, does not exist", 404);
        }

        $htmlString = view("pages.inventory.details.content", compact("product"))->render();
        return $this->success($htmlString, "Successfully retrieved product");
    }
}
