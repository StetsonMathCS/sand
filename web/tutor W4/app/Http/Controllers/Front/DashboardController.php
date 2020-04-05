<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

class DashboardController extends Controller {

	public function __construct() {

	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function login() {
		return view('front.login');

	}
	public function register() {
		return view('front.register');

	}

	public function classes() {
		return view('front.class');

	}

	public function profileStudent(){
		return view('front.profilestudent');
	}

	public function index() {

		return view('welcome');

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('admin.artist.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		try {
			//dd($request->all());
			$validateData = $request->validate(
				[
					'name' => 'bail|required|max:100',
					'file' => 'bail|required|image|mimes:jpeg,png|max:5024',
					'sequence' => 'nullable|unique:manager_category,sequence|numeric',
				],
				[
					'name.required' => 'Name is required',
					'name.max' => 'Name should be less than 100 char',
					'file.required' => 'Please select Image',
					'file.mimes' => 'Please select only jpeg,png']);

			// upload file for desktop banner
			$file = $request->file('file');
			$destinationPath = public_path('uploads/category');
			$name = $file->getClientOriginalName();
			$name = time() . '-' . $name;
			$file->move($destinationPath, $name);
			$filename = $name;

			if (!empty($request->sequence)) {
				$sequence = $request->sequence;
			} else {
				$sequence = NULL;
			}
			$this->category->category_name = $request->name;
			$this->category->category_image = $filename;
			$this->category->sequence = $sequence;
			$this->category->status = $request->status;
			$res = $this->category->save();

			if ($res) {
				return redirect('/admin/category')->with('message', "Category has been added sucessfully.");
			} else {
				return back()->with('message', "Please Try Again!!");
			}

		} catch (Exception $e) {

		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show() {
		$category = $this->category->category_list();
		dd('aa');
		return view('admin.artist.show', compact('category'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Category $category) {
		return view('admin.artist.edit', compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Category $category) {
		$id = $category->id;
		//dd($id);
		$validateData = $request->validate(
			[
				'category_name' => 'bail|required|max:100',
				'category_image' => 'sometimes|required|image|mimes:jpeg,png|max:5024',
				'sequence' => 'nullable|numeric|unique:manager_category,sequence,' . $id,
			],
			[
				'category_name.required' => 'Name is required',
				'category_name.max' => 'Name should be less than 100 char',
				'category_image.required' => 'Please select Image',
				'category_image.mimes' => 'Please select only jpeg,png']);

		if (!empty($request->sequence)) {
			$sequence = $request->sequence;
		} else {
			$sequence = 0;
		}

		if (!empty($request->file('category_image'))) {
			$file = $request->file('category_image');
			$destinationPath = public_path('uploads/category');
			$name = $file->getClientOriginalName();
			$name = time() . '-' . $name;
			$file->move($destinationPath, $name);
			$filename = $name;
		} else {
			$filename = $category->category_image;
		}
		//dd($request->all());
		$save_data['category_name'] = $request->category_name;
		$save_data['category_image'] = $filename;
		$save_data['sequence'] = $sequence;
		$save_data['status'] = $request->status;

		$res = $category->update($save_data);

		return redirect()->route('artist.index')
			->with('success', 'Category updated successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Category $category) {
		$category->delete();
		return redirect()->route('artist.index')
			->with('success', 'Category deleted successfully');
	}
}
