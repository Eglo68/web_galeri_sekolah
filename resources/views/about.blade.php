@extends('layout')
@section('title', 'Tentang')
@section('content')
<x-page-header title="Tentang sekolah" :desc="config('school.tagline')" :crumbs="['Tentang' => null]" />

<div class="mx-auto max-w-7xl space-y-6 px-4 py-12">

  <div class="grid items-stretch gap-6 md:grid-cols-[3fr_7fr]">
    <div class="flex flex-col gap-6">
      <section class="flex-1 rounded-lg border border-line bg-mist p-6">
        <h2 class="font-serif text-xl font-bold text-navy">Visi</h2>
        <p class="mt-2 text-sm leading-relaxed text-slate-600">Terwujudnya sekolah yang tangguh dalam imtaq, terampil, mandiri, berbasis Teknologi Informasi dan Komunikasi, dan berwawasan lingkungan.</p>
      </section>
      <section class="flex-1 rounded-lg bg-navy p-6 text-slate-300">
        <h2 class="font-serif text-xl font-bold text-white">Misi</h2>
        <p class="mt-2 text-sm leading-relaxed">SMK Negeri 4 Kota Bogor berkomitmen untuk meningkatkan keimanan dan ketaqwaan kepada Tuhan Yang Maha Esa sekaligus mengembangkan keterampilan siswa agar kompeten di bidang keahliannya.</p>
      </section>
    </div>

    <img src="{{ asset('images/tentang.jpg') }}" alt="{{ config('school.full_name') }}"
         onerror="this.onerror=null;this.src='{{ asset('images/lapangan2.JPG') }}'"
         class="h-full min-h-72 w-full rounded-lg bg-mist object-cover shadow-lg">
  </div>

  {{-- PROFIL SEKOLAH (satu paragraf) --}}
  <section class="rounded-lg border-l-4 border-gold bg-navy p-8 text-slate-200">
    <h2 class="mb-3 font-serif text-2xl font-bold text-white">Profil sekolah</h2>
    <p class="leading-relaxed">SMK Negeri 4 Bogor adalah institusi pendidikan vokasi terkemuka yang berdedikasi untuk mencetak generasi unggul di bidang teknologi dan rekayasa. Dirintis sejak tahun 2008 dan resmi berdiri pada 15 Juni 2009, kami konsisten mengintegrasikan kurikulum nasional dengan kebutuhan riil dunia kerja. Berlokasi di lingkungan yang kondusif di Bogor Selatan, kami menyediakan fasilitas belajar modern dan ekosistem digital untuk mendukung bakat setiap peserta didik, sehingga lulusan siap bekerja, melanjutkan pendidikan, maupun berwirausaha dengan keterampilan teknis, karakter berintegritas, dan semangat belajar sepanjang hayat.</p>
  </section>

</div>
@endsection