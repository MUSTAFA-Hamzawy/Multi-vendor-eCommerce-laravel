<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubCategoryRequest;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\MyHelpers;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function subCategoryAdd(){
        $data = DB::table('get_sub_categories')->get();
        $categories = CategoryModel::all();
        return view('backend.sub_category.sub_category_default', compact('data', 'categories'));
    }

    use ImageHandlerTrait;

    /**
     * @param SubCategoryRequest $request
     */
    public function subCategoryCreate(SubCategoryRequest $request){
        // validate
        $data = $request->validated();

        // handling the image
        $data['sub_category_image'] = $this->handleRequestImage($request->file('sub_category_image'), 'uploads/images/sub_category');
        $data['sub_category_slug'] = $this->getCategorySlug($data['sub_category_name']);

        // insert
        if (SubCategoryModel::insert($data))
            return response(['msg' => 'Sub Category is added successfully.'], 200);
        else
            return redirect('sub_categories')->with('error', 'Failed to add this sub Category, try again.');
    }

    /**
     * @param string $sub_categoryName
     * @return array|string|string[]
     */
    private function getCategorySlug(string $sub_categoryName){
        return str_replace(' ', '-', strtolower(trim($sub_categoryName)));
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function subCategoryRemove(Request $request){
        try {
            $sub_category = SubCategoryModel::findOrFail($request->id);
            MyHelpers::deleteImageFromStorage($sub_category->sub_category_image , 'uploads/images/sub_category/');
            if ($sub_category->delete())
                return redirect()->route('sub-category')->with('success', 'Successfully removed.');
            else
                return redirect('sub_categories')->with('error', 'Failed to remove this sub Category.');
        }catch (ModelNotFoundException $exception){
            return redirect('sub_categories')->with('error', 'Failed to remove this sub Category.');
        }
    }

    /**
     * @param SubCategoryRequest $request
     */
    public function subCategoryUpdate(SubCategoryRequest $request){
        // validation
        $data = $request->validated();

        // get the current sub_category ( which being updated )
        try {
            $sub_category = SubCategoryModel::findOrFail($request->get('sub_category_id'));
        }catch (ModelNotFoundException $exception){
            return redirect()->route('admin-sub-category')->with('error', 'Something went wrong, try again.');
        }

        // handling if the request has an image
        $newImage = $request->file('sub_category_image');
        if ($newImage)
        {

            $data['sub_category_image'] = $this->handleRequestImage($newImage, 'uploads/images/sub_category');
            MyHelpers::deleteImageFromStorage($sub_category->sub_category_image, 'uploads/images/sub_category/');
        }

        // update
        $data['sub_category_slug'] = $this->getCategorySlug($data['sub_category_name']);
        if ($sub_category->update($data))
            return response(['msg' => 'Sub Category is updated successfully.'], 200);
        else
            return redirect()->route('admin-sub-category')->with('error', 'Something went wrong, try again.');
    }
}
