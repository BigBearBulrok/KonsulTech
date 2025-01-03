<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Include Header -->
    @include('layouts.header')

    <!-- Feedback Section -->
    <section class="bg-gradient-to-r from-green-500 to-green-700 text-center bg-gray-200 py-16">
        <div class="max-w-4xl mx-auto px-4">
            <h1 class="text-white text-center text-3xl font-bold mb-8">THANKS!<br>TELAH MEMAKAI JASA KAMI</h1>
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('feedback.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 shadow-lg rounded">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Photo Upload -->
                    <div>
                        <label for="photo" class="block text-gray-700 font-semibold mb-2">Foto yang Anda Berikan</label>
                        <input type="file" name="photo" id="photo" class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-green-600" required>
                        @error('photo')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
    
                    <!-- Name Input -->
                    <div>
                        <label for="name" class="block text-gray-700 font-semibold mb-2">Nama Anda</label>
                        <input type="text" name="name" id="name" class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-green-600" placeholder="Nama Anda" required>
                        @error('name')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
    
                    <!-- Review Input -->
                    <div class="col-span-2">
                        <label for="review" class="block text-gray-700 font-semibold mb-2">Review Anda</label>
                        <textarea name="review" id="review" rows="4" class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-green-600" placeholder="Tulis review Anda di sini" required></textarea>
                        @error('review')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
    
                    <!-- Star Rating -->
                    <div class="col-span-2">
                        <label for="rating" class="block text-gray-700 font-semibold mb-2">Bintang yang Anda Berikan</label>
                        <select name="rating" id="rating" class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-green-600" required>
                            <option value="5">★★★★★ - 5</option>
                            <option value="4">★★★★☆ - 4</option>
                            <option value="3">★★★☆☆ - 3</option>
                            <option value="2">★★☆☆☆ - 2</option>
                            <option value="1">★☆☆☆☆ - 1</option>
                        </select>
                        @error('rating')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
    
                <!-- Submit Button -->
                <div class="text-center mt-8">
                    <button type="submit" class="px-8 py-3 bg-green-600 text-white font-bold rounded shadow-lg hover:bg-green-700">Kirim Review</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Include Footer -->
    @include('layouts.footer')
</body>
</html>
