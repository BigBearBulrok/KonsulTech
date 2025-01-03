@extends('layouts.app')

@section('content')
<section class="bg-white py-12">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-2xl font-bold text-center">Semua Review</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
            @foreach ($allReviews as $review)
                <div class="p-6 bg-gray-100 shadow">
                    <div class="bg-gray-300 h-24 w-full mb-4"></div> <!-- Image Placeholder -->
                    <p class="italic">"{{ $review->text }}"</p>
                    <div class="mt-4 text-yellow-500">
                        @for ($i = 0; $i < $review->rating; $i++)
                            ★
                        @endfor
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
