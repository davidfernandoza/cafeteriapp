<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
	public function showCategories()
	{
		$categories = $this->getCategories(true);
		return view('category', compact('categories'));
	}

	public function getCategories($forView = null)
	{
		$categories = Category::get();
		if ($forView) {
			return $categories;
		}
		return response()->json($categories, 200);
	}

	public function saveCategory(Request $request)
	{
		$Category = new Category($request->all());
		$Category->save();
		return response()->json(['status' => true]);
	}

	public function updateCategory(Category $category, Request $request)
	{
		$category->update($request->all());
		return response()->json(['status' => true]);
	}

	public function deleteCategory(Category $category)
	{
		$category->delete();
		return response()->json(['status' => true]);
	}
}
