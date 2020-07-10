<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelCategory;
use App\Models\ModelGender;
use App\Services\ServiceFunctions;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoires=new ModelCategory();
        $genders=new ModelGender();


        $data['genders']=$genders->getGenders();
        $data['categories']=$categoires->getAllCategories();
        return view('admin/pages/categories/categories',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=new ModelCategory();
        $data['maincat']=$categories->getMainCategories();
        return view('admin/pages/categories/categoriescreate',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "cat_name"=>"required",
        ]);
        $catName=$request->input('cat_name');
        $mainCat=$request->input('main');
        $date=date('Y-m-d H:i:s');
        if($mainCat==0)
        {
            $mainCat=null;
        }

        $dataCat['cat_name']=$catName;
        $dataCat['created_at']=$date;
        $dataCat['updated_at']=$date;
        $dataCat['main_cat_id']=$mainCat;

        if(ServiceFunctions::insert('categories',$dataCat))
        {
            return \redirect('/admin/categories')->with('success','Category Added');
        }
        else
        {
            return \redirect('/admin/categories')->with('error','Failed to add Category');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=new ModelCategory();
        $data['category']=$categories->getCategoryById($id);
        $data['maincat']=$categories->getMainCategories();
        $data['catid']=$id;
        return view('admin/pages/categories/categoriesedit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $catName=$request->input('cat_name');
        $mainCat=$request->input('main');
        $date=date('Y-m-d H:i:s');
        if($mainCat==0)
        {
            $mainCat=null;
        }
        $dataCat['cat_name']=$catName;
        $dataCat['updated_at']=$date;
        $dataCat['main_cat_id']=$mainCat;

        if (ServiceFunctions::update('categories',$id,$dataCat))
        {
            return \redirect('/admin/categories')->with('success','Category Updated');
        }
        else
        {
            return \redirect('/admin/categories')->with('error','Update Category failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories=new ModelCategory();
        $category=$categories->getCategoryById($id);



        if($category->main_cat_id==null)
        {
            $subCategories=$categories->getAllSubCategories($category->id);
            $okSub=true;
            foreach ($subCategories as $sub)
            {
                $okSub=$this->deleteCategories($sub->id,$categories);
            }
            if($okSub)
            {
                if(ServiceFunctions::delete('categories',$category->id))
                {
                    return \redirect('/admin/categories')->with('success','Category Deleted');
                }
                else
                {
                    return \redirect('/admin/categories')->with('error','Category failed deleting');
                }
            }
            else
            {
                return \redirect('/admin/categories')->with('error','Sub category failed deleting');
            }
        }
        else
        {
          $ok=$this->deleteCategories($id,$categories);
          if ($ok)
          {
              return \redirect('/admin/categories')->with('success','Category Deleted');
          }
          else
          {
              return \redirect('/admin/categories')->with('error','Category failed deleting');
          }
        }
    }


    public function deleteCategories($id,ModelCategory $categories)
    {
        $category_gender=$categories->getAllCategoriesGenderById($id);
        $ckok=true;
        foreach ($category_gender as $cg) {
            $products_category = $categories->getAllProductsCategoriesById($cg->id);

            $pcok = true;
            foreach ($products_category as $pc) {
                $pcok = ServiceFunctions::delete('products_categories', $cg->id, 'id_category');
            }
            if($pcok)
            {
                $ckok=ServiceFunctions::delete('category_gender',$id,'id_category');
            }
        }

        if($ckok)
        {
            $ok=ServiceFunctions::delete('categories',$id);
        }

        return $ok;

    }
}


