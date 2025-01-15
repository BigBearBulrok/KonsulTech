<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KonsulTech</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Include Header -->
    @include('layouts.header')

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-green-500 to-green-700 text-white text-center py-16">
        <div class="mt-64 mb-72 max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold">WELCOME!</h1>
            <p class="text-2xl mt-4">JASA KONSULTASI TEKNOLOGI TERTEPAT SESUAI KEBUTUHAN, ANGGARAN, DAN PREFERENSI ANDA</p>
            <p class="text-lg mt-6">Kami adalah layanan konsultasi yang dirancang untuk membantu Anda memilih produk elektronik terbaik sesuai kebutuhan, anggaran, dan preferensi.</p>
            <a href="https://wa.me/6280" class="mt-8 inline-block px-6 py-3 bg-white text-green-700 font-bold rounded shadow-lg hover:bg-gray-200">
                Hubungi Kami
            </a>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-16">
        <div class="mt-14 mb-14 max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center">KONSULTECH SOLUSI TEPAT UNTUK PILIHAN ELEKTRONIK ANDA</h2>
            <p class="text-center mt-4">Kami adalah layanan konsultasi yang dirancang untuk membantu Anda memilih produk elektronik (PC, Laptop, Handphone) terbaik sesuai kebutuhan, anggaran, dan preferensi.</p>

            <div class="bg-gray-300 mt-8 rounded overflow-hidden relative w-full h-[600px]">
                <img src="/assets/About.jpg" alt="Gambar tentang KonsulTech" class="w-full h-full object-cover">
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center">CARA KERJA</h2>
            <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-8">
                @php
                    $steps = [
                        "Hubungi Kami: Pilih jenis layanan dan hubungi kami melalui formulir online, WhatsApp, atau email.",
                        "Analisis Kebutuhan: Kami mengajukan beberapa pertanyaan terkait kebutuhan Anda.",
                        "Penelitian dan Rekomendasi: Membandingkan produk dan memberikan rekomendasi.",
                        "Konsultasi dan Diskusi: Berdiskusi lebih lanjut untuk memilih produk terbaik.",
                        "Keputusan Pembelian: Membantu Anda dengan proses pembelian."
                    ];
                @endphp
                @foreach ($steps as $index => $step)
                    <div class="flex flex-col items-center text-center">
                        <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center text-white text-lg font-bold">
                            {{ $index + 1 }}
                        </div>
                        <p class="mt-4">{{ $step }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="bg-gray-100 py-16">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center">JASA YANG KAMI SEDIAKAN UNTUK ANDA</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 mt-12">
                @php
                    $services = [
                        ["title" => "Konsultasi Per Sesi", "points" => ["Bayar hanya untuk sesi yang Anda butuhkan.", "Rekomendasi spesifik untuk produk tertentu."]],
                        ["title" => "Langganan Bulanan", "points" => ["Akses konsultasi kapan saja selama masa langganan.", "Rekomendasi berkelanjutan sesuai kebutuhan."]]
                    ];
                @endphp
                @foreach ($services as $service)
                    <div class="p-8 bg-white shadow rounded">
                        <h3 class="text-2xl font-bold">{{ $service['title'] }}</h3>
                        <ul class="mt-6 list-disc list-inside">
                            @foreach ($service['points'] as $point)
                                <li>{{ $point }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
            <!-- Button below the services section, outside the loop -->
            <div class="mt-12 text-center w-full">
                <a href="https://wa.me/6280" class="inline-block px-6 py-3 bg-white text-green-700 font-bold rounded shadow-lg hover:bg-gray-200">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>



    <!-- Reviews Section -->
    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center">REVIEW KAMI</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-12">
                @foreach ($reviews as $review)
                    <div class="p-6 bg-gray-50 shadow rounded">
                        <div class="bg-gray-300 h-24 w-full mb-4 rounded overflow-hidden">
                            <!-- Display image correctly using asset() -->
                            <img src="{{ asset('storage/' . $review->image) }}" alt="{{ $review->name }}" class="w-full h-full object-cover">
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
            <div class="text-center mt-8">
                <a href="{{ route('reviews') }}" class="px-4 py-2 text-white bg-green-600 hover:bg-green-700 rounded">
                    Lihat Semua Review
                </a>
            </div>
        </div>
    </section>

    <!-- Include Footer -->
    @include('layouts.footer')
</body>
</html>
