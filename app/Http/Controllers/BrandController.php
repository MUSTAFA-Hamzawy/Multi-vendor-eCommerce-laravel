<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\BrandModel;
use App\MyHelpers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    use ImageHandlerTrait;

    /**
     * @param BrandRequest $request
     */
    public function brandCreate(BrandRequest $request){
        // validate
        $data = $request->validated();

        // handling the image
        $image = $request->file('brand_image');
        $data['brand_image'] = $this->handleRequestImage($request->file('brand_image'), 'uploads/images/brand');
        $data['brand_slug'] = $this->getBrandSlug($data['brand_name']);

        // insert
        if (BrandModel::insert($data))
            return response(['msg' => 'Brand is added successfully.'], 200);
        else
            return redirect('brands')->with('error', 'Failed to add this brand, try again.');
    }

    /**
     * @param string $brandName
     * @return array|string|string[]
     */
    private function getBrandSlug(string $brandName){
        return str_replace(' ', '-', strtolower(trim($brandName)));
    }

    /**
     * @param Request $request
     */
    public function brandRemove(Request $request){
        try {
            $brand = BrandModel::findOrFail($request->id);
            MyHelpers::deleteImageFromStorage($brand->brand_image , 'uploads/images/brand/');
            if ($brand->delete())
                return redirect()->route('brand')->with('success', 'Successfully removed.');
            else
                return redirect('brands')->with('error', 'Failed to remove this brand.');
        }catch (ModelNotFoundException $exception){
            return redirect('brands')->with('error', 'Failed to remove this brand.');
        }
    }

    /**
     * @param BrandRequest $request
     */
    public function brandUpdate(BrandRequest $request){
        // validation
        $data = $request->validated();

        // get the current brand ( which being updated )
        try {
            $brand = BrandModel::findOrFail($request->get('brand_id'));
        }catch (ModelNotFoundException $exception){
            return redirect()->route('admin-brand')->with('error', 'Something went wrong, try again.');
        }

        // handling if the request has an image
        $newImage = $request->file('brand_image');
        if ($newImage)
        {
            $data['brand_image'] = $this->handleRequestImage($request->file('brand_image'), 'uploads/images/brand');
            MyHelpers::deleteImageFromStorage($brand->brand_image, 'uploads/images/brand/');
        }

        // update
        $data['brand_slug'] = $this->getBrandSlug($data['brand_name']);
        if ($brand->update($data))
            return response(['msg' => 'Brand is updated successfully.'], 200);
        else
            return redirect()->route('admin-brand')->with('error', 'Something went wrong, try again.');
    }
}
