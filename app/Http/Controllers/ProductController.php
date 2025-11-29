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

    public function getProductForm(){
        $brands = Product::pluck('brand')->unique()->values();
        $materialFamilies = Product::pluck('material_family')->unique()->values();
        $units = Product::pluck('unit')->unique()->values();
        $types = Product::pluck('type')->unique()->values();
        return view('pages.product-form.index', compact( 'brands', 'units', 'materialFamilies', 'types'));
    }

    public function addProduct(Request $request) {
        $brands = Product::pluck('brand')->unique()->values()->all();
        $materialFamilies = Product::pluck('material_family')->unique()->values()->all();
        $units = Product::pluck('unit')->unique()->values()->all();

        $validated = $request->validate([
            'price' => 'required|integer|min:1',
            'quantity' => 'required|integer|min:1',
            'brand' => 'required|string|in:' . implode(',', $brands),
            'description' => 'required|string|min:10|max:1000',
            'size' => 'required|numeric|min:1',
            'sch' => 'required|string|max:10',
            'hs_code' => 'required|string|max:50|min:3',
            'country_origin' => 'required|string|max:50|min:2',
            'material_family' => 'required|string|in:' . implode(',', $materialFamilies),
            'sni_required' => 'boolean',
            'lartas_required' => 'boolean',
            'unit' => 'required|string|in:' . implode(',', $units),
            'type' => 'required|in:materials,chemicals,raw-parts,consumables',
            'requirement' => 'required|string|min:1'
        ]);

        $latestCode = Product::max('code');
        if ($latestCode) {
            $number = (int) substr($latestCode, 3);
        } else {
            $number = 0;
        }
        $validated['code'] = 'PRD' . str_pad($number + 1, 3, '0', STR_PAD_LEFT);

        $requirements = explode(',', $request->requirement ?? ''); $validated['sni_required'] = in_array('sni_required', $requirements); $validated['lartas_required'] = in_array('lartas_required', $requirements);

        Product::create($validated);
        return redirect()->route('inventory')->with('success', 'Produk berhasil ditambahkan!');
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
            ->orderBy("created_at", "desc")
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

    public function deleteProduct($code) {
        Product::findOrFail($code)->delete();
        return back();
    }
}
