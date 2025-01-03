<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class FeedbackController extends Controller
{
    public function create()
    {
        return view('feedback');
    }

        public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string',
            'review' => 'required|string',
            'rating' => 'required|integer|between:1,5',
        ]);

        // Handle file upload
        if ($request->hasFile('photo')) {
            // Store the image in the public disk under reviews/photos folder
            $imagePath = $request->file('photo')->store('reviews/photos', 'public');
            $validated['image'] = $imagePath; // Store the file path
        }

        // Save the review to the database
        Review::create([
            'name' => $validated['name'],
            'image' => $validated['image'], // Store the image path
            'text' => $validated['review'],
            'rating' => $validated['rating'],
        ]);

        // Redirect to the home page with a success message
        return redirect('/')->with('success', 'Thank you for your feedback!');
    }


    public function reviews()
    {
        // Fetch all reviews for the reviews page
        $reviews = Review::latest()->get();
        return view('reviews', compact('reviews'));
    }

    public function welcome()
    {
        // Fetch the latest 3 reviews for the welcome page
        $reviews = Review::latest()->take(3)->get();
        return view('welcome', compact('reviews'));
    }
}
