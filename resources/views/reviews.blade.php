<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Review - KonsulTech</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Header -->
    @include('layouts.header')

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-green-500 to-green-700 text-white text-center py-16">
        <h1 class="text-4xl font-bold">WELCOME!</h1>
        <p class="text-lg mt-2">DI SEMUA REVIEW KAMI</p>
    </section>

    <!-- Reviews Grid -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($reviews as $review)
                    <div class="bg-white shadow rounded p-6">
                        <!-- Displaying Review Image -->
                        <div class="bg-gray-300 h-40 mb-4 rounded overflow-hidden">
                            <!-- If there's an image, display it, otherwise display a placeholder -->
                            @if($review->image)
                                <img src="{{ asset('storage/' . $review->image) }}" alt="Review Image" class="w-full h-full object-cover">
                            @else
                                <img src="https://via.placeholder.com/300x200.png?text=No+Image" alt="No Image" class="w-full h-full object-cover">
                            @endif
                        </div>
                                <p class="text-xl font-semibold">{{ $review->name }}</p> <!-- Add reviewer's name -->
                                <p class="italic mt-2">"{{ $review->text ?? 'No review text available.' }}"</p>
                            <div class="mt-4 text-yellow-500">
                                <!-- Display rating as stars -->
                                {!! str_repeat('★', $review->rating) !!}{!! str_repeat('☆', 5 - $review->rating) !!}
                            </div>
                    </div>
                @endforeach
            </div>

            <!-- Back to Home Button -->
            <div class="text-center mt-12">
                <a href="{{ route('welcome') }}" class="px-8 py-3 bg-green-600 text-white font-bold rounded shadow-lg hover:bg-green-700">
                    Kembali ke Halaman Utama
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('layouts.footer')

</body>
</html>
