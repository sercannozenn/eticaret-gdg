<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\CardAddRequest;
use App\Models\Card;
use App\Services\BrandService;
use App\Services\CategoryService;
use App\Services\ProductServices\ProductService;
use App\Services\SizeStockService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CardController extends Controller
{
    public function addToCard(CardAddRequest   $request,
                              SizeStockService $sizeStockService,
                              ProductService   $productService,
                              CategoryService  $categoryService,
                              BrandService     $brandService)
    {
        $productID = $request->product_id;
        $quantity  = (int)$request->quantity;
        $sizeID    = $request->size_id;
        $sizeStock = $sizeStockService->getById($sizeID);
        if (!$sizeStock || $sizeStock->remaining_stock < $quantity) {
            return response()
                ->json([
                           'errors' => ['stock' => 'Yeterli Stok Yok']
                       ], 422);
        }


        $sessionID = session()->getId();
        $userID    = auth()->check() ? auth()->id() : null;

        if ($userID) {
            $data = ['user_id' => $userID];
        }
        else {
            $data = ['session_id' => $sessionID];
        }

        $card = Card::firstOrCreate(
            $data, // Arama kriteri
            ['user_id' => $userID, 'session_id' => $sessionID]
        );

        $product          = $productService->getById($productID);
        $basePrice        = $product->final_price;
        $productDiscount  = $productService->setProduct($product)->getMaxDiscountProduct();
        $categoryDiscount = $categoryService->setCategory($product->productsMain->category)->getMaxDiscountCategory($basePrice);
        $brandDiscount    = $brandService->setBrand($product->productsMain->brand)->getMaxDiscountBrand($basePrice);
        $highestDiscount  = max($productDiscount, $categoryDiscount, $brandDiscount);
        $discountedPrice  = $basePrice - $highestDiscount;
        $finalPrice       = $discountedPrice > 0.9 ? $discountedPrice : 1.0;
        $cardItem         = $card->items()
                                 ->where('product_id', $productID)
                                 ->where('size_id', $sizeID)
                                 ->first();
        if ($cardItem) {
            $cardItem->quantity         += $quantity;
            $cardItem->price            = $basePrice;
            $cardItem->discounted_price = $finalPrice;
            $cardItem->save();
        }
        else {
            $card->items()
                 ->create([
                              'product_id'       => $productID,
                              'size_id'          => $sizeID,
                              'quantity'         => $quantity,
                              'price'            => $basePrice,
                              'discounted_price' => $finalPrice
                          ]);
        }

        return $this->renderCardView();

    }

    public function renderCardView()
    {
        $sessionID = session()->getId();
        $userID    = auth()->check() ? auth()->id() : null;

        $card = Card::query()
                    ->with(['items.product.featuredImage', 'items.sizeStock'])
                    ->where('user_id', $userID)
                    ->orWhere('session_id', $sessionID)
                    ->first();

        return view('front.partial.card', compact('card'))->render();

    }

    public function card()
    {
        return view("front.card");
    }
}
