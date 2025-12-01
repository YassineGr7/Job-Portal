<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
  public function index(Request $request)
  {
    $company = $request->company;
    $categories = Category::all();

    return view('categories.index', compact('company', 'categories'));
  }


  public function addForm(Request $request)
  {

    $company = $request->company;
    return view('categories.add', compact('company'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'label' => 'required|string|max:255',
      'icon' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validate the image
    ]);

    $company_label = $request->label;

    // Initialize $filePath as null to store if no icon is uploaded
    $filePath = null;

    // Handle icon file upload if provided
    if ($request->hasFile('icon')) {
      // Generate a unique file name for the icon
      $filename = 'category_icon-' . time() . '.' . $request->file('icon')->getClientOriginalExtension();

      // Store the icon in the 'public/category_icons' directory
      $filePath = $request->file('icon')->storeAs('category_icons', $filename, 'public');
    }

    // Create the new category
    Category::create([
      'label' => $company_label,
      'icon' => $filePath, // Save the icon path in the database
    ]);

    return redirect()->route('categories.index')->with('success', 'Category added successfully.');
  }

  
  public function edit(Request $request, $id)
  {
    $company = $request->company;
    $category = Category::find($id);
    return view('categories.edit', compact('company', 'category'));
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'label' => 'required|string|max:255',
      'icon' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validate the image
    ]);
    $category = Category::findOrFail($id);
    $category->label = $request->input('label');

    if ($request->hasFile('icon')) {
      // Delete the old icon if exists
      if ($category->icon) {
        Storage::delete($category->icon);
      }

      $filename = $category->icon . '-' . time() . '.' . $request->file('icon')->getClientOriginalExtension();

      // Store the new icon
      $filePath = $request->file('icon')->storeAs('category_icons', $filename, 'public');
      $category->icon = $filePath;
    }

    $category->save();

    return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
  }

  public function delete($id)
  {
    $category = Category::find($id);

    $category->delete();

    return redirect()->back();
  }
}
