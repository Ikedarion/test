<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;


class ContactController extends Controller
{
    public function show()
    {
        $categories = Category::all();

        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $input = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel', 'address', 'building', 'detail', 'category_id']);

        return view('confirm', compact('input'));
    }

    public function complete(ContactRequest $request)
    {
        $input = $request->only(['first_name', 'last_name', 'gender', 'email','tel', 'address', 'building', 'detail', 'category_id']);

        if ($request->has("back")) {
            return redirect()->action("ContactController@show")
                ->withInput($input);
        } else {
            Contact::create($input);
        }

        return view('thanks');
    }


    public function index()
    {
        $items = Contact::with('category')->get();

        $categories = Category::all();
        return view('admin', compact('items','categories'));
    }

    public function search(Request $request)
    {
        $items = Contact::with('category')
            ->CategorySearch($request->category_id)
            ->GenderSearch($request->gender)
            ->DateSearch($request->date)
            ->KeywordSearch($request->keyword)
            ->get();

        $categories = Category::all();

        return view('admin', compact('items','categories'));
    }

    public function modal()
    {
        
    }

}