<?php

namespace App\Http\Controllers;

use App\Http\Controllers\User\VendorController;
use App\Http\Requests\ProductRequest;
use App\Models\BrandModel;
use App\Models\product\ProductImagesModel;
use App\Models\product\ProductModel;
use App\Models\product\ProductOffersModel;
use App\Models\SubCategoryModel;
use App\Models\User;
use App\MyHelpers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isNull;

class ProductController extends Controller
{
    private const PRODUCT_AVAILABLE_OFFERS = [
        'hot_deal',
        'featured_product',
        'special_offer',
        'special_deal'
    ];
    private const PRODUCT_IMAGES_PATH = 'uploads/images/product';

    /**
     * @return int
     */
    private function getVendorId(): int{
       return  DB::table('get_vendor_data')->where('id', '=', Auth::id())->get('vendor_id')[0]->vendor_id;
    }

    /**
     * @return View
     */
    public function productAdd(){
        $brands = BrandModel::all();
        $subCategories = SubCategoryModel::all();
        return view('backend.product.product_add', compact('brands', 'subCategories'));
    }

    /**
     * @param ProductRequest $request
     */
    public function productCreate(ProductRequest $request){
        $data = $request->validated();

        // handling the product thumbnail
        $data['product_thumbnail'] =
            MyHelpers::uploadImage($request->file('product_thumbnail'), self::PRODUCT_IMAGES_PATH);


        // handling the vendor id
        $data['vendor_id'] = $this->getVendorId();

        // handling the product slug
        $data['product_slug'] = $this->getProductSlug($data['product_name']);

        // status of the product
        $data['product_status'] = $request->get('product_status') ? 1 : 0;


        // inserting the product
        if ($data['product_images'])
            unset($data['product_images']);

        $insertedProductId = ProductModel::insertGetId($data);
        if ($insertedProductId){
            // handling the product images
            if ($request->file('product_images'))
                $this->handleProductMultiImages($request->file('product_images'), $insertedProductId);

            // handling the product offers
            $this->handleProductOffers($request, $insertedProductId);

            return response(['msg' => 'Product is added successfully.'], 200);
        }else return redirect('add_product')->with('error', 'Failed to add this product, try again.');

    }

    /**
     * @param string $productName
     * @return array|string|string[]
     */
    private function getProductSlug(string $productName){
        return str_replace(' ', '-', strtolower(trim($productName)));
    }

    /**
     * @param array $images
     * @param int $productId
     * @return void
     */
    private function handleProductMultiImages(array $images, int $productId): void{
        $data['image_product_id'] = $productId;
        foreach ($images as $image){
            $data['product_image'] = MyHelpers::uploadImage($image, self::PRODUCT_IMAGES_PATH );
            ProductImagesModel::insert($data);
        }
    }

    /**
     * @param Request $requestData
     * @param int $productId
     * @param bool $editCase
     * @return void
     */
    private function handleProductOffers(Request & $requestData, int $productId, bool $editCase = false): void{
        $offers['offer_product_id'] = $productId;
        foreach (self::PRODUCT_AVAILABLE_OFFERS as $offerName) {
            $offers[$offerName] = ($requestData->get($offerName)) != null? 1 : 0;
        }
        if ($editCase)
        {

            try {
                ProductOffersModel::firstOrFail()
                    ->where('offer_product_id', $productId)->update($offers);
            }   catch (ModelNotFoundException $exception) {
            }
        }
        else ProductOffersModel::insert($offers);
    }

    /**
     * @param int $productId
     * @return mixed
     */
    public static function getProductImages(int $productId){
        return ProductImagesModel::where('image_product_id', '=', $productId)->get('product_image');
    }

    /**
     * @param string $tags
     * @return array
     */
    public static function getProductSeparatedTags(string $tags): array{
        if ($tags)
            return explode(',', $tags);
        return [];
    }

    /**
     * @param string $colors
     * @return array
     */
    public static function getProductSeparatedColors(string $colors): array{
        if ($colors)
            return explode(',', $colors);
        return [];
    }

    /**
     * @param Request $request
     */
    public function productRemove(Request $request){
        $productId = $request->id;
        $images = self::getProductImages($productId);
        try {
            $product = ProductModel::findOrFail($productId);
            if ($product->delete()){
                // removing the thumbnail
                MyHelpers::deleteImageFromStorage($product->product_thumbnail, self::PRODUCT_IMAGES_PATH . '/');

                // removing images
                foreach ($images as $item)
                    MyHelpers::deleteImageFromStorage($item->product_image, self::PRODUCT_IMAGES_PATH . '/');

                return redirect('vendor/products')->with('success', 'Removed Successfully.');
            }
            else return redirect('vendor/products')->with('error', 'Failed to remove this product.');
        }catch (ModelNotFoundException $exception){
            return redirect('products')->with('error', 'Failed to remove this product.');

        }
    }

    /**
     * @param int $productId
     */
    public function productEdit(int $productId){

        try {
            ProductModel::findOrFail($productId);
            $data = DB::table('get_product_data')
                ->where('offer_product_id', '=', $productId)->get()[0];
            $brands = BrandModel::all();
            $subCategories = SubCategoryModel::all();
            $productImages = ProductImagesModel::where('image_product_id', $productId)->get();
            return view('backend.product.product_edit', compact('data', 'brands', 'subCategories', 'productImages'));
        }catch (ModelNotFoundException $exception){
            return redirect()->route('vendor-product')->with('error', 'Failed, try again later.');
        }
    }

    /**
     * @param ProductRequest $request
     */
    public function productUpdate(ProductRequest $request){
        $data = $request->validated();

        $product_id = $request->get('product_id');

        // getting the old data
        try {
            $oldProduct = ProductModel::findOrFail($product_id);
        }catch (ModelNotFoundException $exception){
            return redirect()->route('vendor-product-edit')->with('error', 'Something went wrong, try again.');
        }

        // handling the product thumbnail
        if ($request->file('product_thumbnail')){
            $data['product_thumbnail'] = MyHelpers::uploadImage($request->file('product_thumbnail'),
                self::PRODUCT_IMAGES_PATH);

            // removing the old image from uploads directory
            MyHelpers::deleteImageFromStorage($oldProduct->product_thumbnail, self::PRODUCT_IMAGES_PATH .  '/');
        }


        // handling the vendor id
        $data['vendor_id'] = $this->getVendorId();

        // handling the product slug
        $data['product_slug'] = $this->getProductSlug($data['product_name']);

        // status of the product
        $data['product_status'] = $request->get('product_status') ? 1 : 0;


        // inserting the product
        if (isset($data['product_images']))
            unset($data['product_images']);

        if ($oldProduct->update($data)){
            // handling the product images
            if ($request->file('product_images')){
                // removing the old images
                $oldImages = ProductImagesModel::where('image_product_id', '=', $product_id)->get();
                foreach ($oldImages as $item)
                    MyHelpers::deleteImageFromStorage($item->product_image, self::PRODUCT_IMAGES_PATH . '/');

                ProductImagesModel::where('image_product_id', '=', $product_id)->delete();

                // inserting the new images
                $this->handleProductMultiImages($request->file('product_images'), $product_id);

            }

            // handling the product offers
            $this->handleProductOffers($request, $product_id, true);

            return response(['msg' => 'Product is updated successfully.'], 200);
        }else return redirect('update_product')->with('error', 'Failed to update this product, try again.');
    }

    /**
     * @param Request $request
     */
    public function productActivate(Request $request){
        $product_id = $request->product_id;

        // check whether activate or de-activate
        if ($request->current_status == "1"){
            return $this->productDeActivate($product_id);
        }

        try {
            ProductModel::findOrFail($product_id)->update(['product_status' => 1]);
            return response(['msg' => 'Product now is active.'], 200);
        }catch (ModelNotFoundException $exception){
            return redirect()->route('vendor-product')->with('error', 'Failed to activate this product, try again');
        }
    }

    /**
     * @param int $productId
     */
    public function productDeActivate(int $productId){
        try {
            ProductModel::findOrFail($productId)->update(['product_status' => 0]);
            return response(['msg' => 'Product now is disabled.'], 200);
        }catch (ModelNotFoundException $exception){
            return redirect()->route('vendor-product')->with('error', 'Failed to activate this product, try again');
        }
    }

    /**
     * To get the products of the current authenticated vendor/shop
     */
    public function getProducts(){

        // getting current shop id
        $currentVendorId = DB::table('vendor_shop')
            ->where('user_id', Auth::id())->get('vendor_id')[0]->vendor_id;

        // selecting all products related to this shop
        $data = ProductModel::where('vendor_id', $currentVendorId)->get();
        return view('backend.product.product_default', compact('data'));
    }



}
