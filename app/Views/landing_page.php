<?= $this->extend('layouts/landing') ?>

<?= $this->section('content') ?>

<nav class="fixed w-full z-50 top-0 px-6 py-4 flex justify-between items-center backdrop-blur-sm border-b border-white/10">
    <div class="flex items-center gap-3">
        <div class="w-10 h-10 bg-cyan-neon/20 border border-cyan-neon flex items-center justify-center rounded-full animate-pulse">
            <span class="font-cyber font-bold text-cyan-neon">T</span>
        </div>
        <div>
            <h1 class="font-cyber text-white tracking-widest text-sm">TARUNA AR RISALAH</h1>
            <p class="text-[10px] text-cyan-neon">SYSTEM: ONLINE</p>
        </div>
    </div>
    <div class="hidden md:flex gap-8 text-sm tracking-widest">
        <a href="#mission" class="hover:text-cyan-neon transition">MISI</a>
        <a href="#program" class="hover:text-cyan-neon transition">PROGRAM</a>
        <a href="#facility" class="hover:text-cyan-neon transition">ARSENAL</a>
    </div>
    <a href="/login" class="px-6 py-2 border border-cyan-neon text-cyan-neon hover:bg-cyan-neon hover:text-black transition font-bold tracking-widest text-sm clip-path-button">
        LOGIN COMMANDER
    </a>
</nav>

<section class="relative h-screen flex items-center justify-center bg-grid-pattern overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-void/80 to-void pointer-events-none"></div>
    
    <div class="absolute w-[500px] h-[500px] border border-white/5 rounded-full animate-[spin_10s_linear_infinite] opacity-30"></div>
    <div class="absolute w-[700px] h-[700px] border border-dashed border-cyan-neon/20 rounded-full animate-[spin_20s_linear_infinite_reverse]"></div>

    <div class="text-center z-10 px-4">
        <p id="typing-text" class="text-cyan-neon mb-4 tracking-[0.2em] text-sm md:text-base h-6"></p>
        
        <h1 class="text-5xl md:text-8xl font-cyber font-black text-white mb-6 tracking-tighter leading-none" data-aos="zoom-out">
            PROJECT <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-neon to-blue-600">GUARDIAN</span>
        </h1>
        
        <p class="max-w-xl mx-auto text-slate-400 mb-10 leading-relaxed" data-aos="fade-up" data-aos-delay="300">
            Mencetak Generasi Pemimpin Berkarakter Qurani dengan Ketangguhan Fisik & Mental. 
            Bergabunglah dalam barisan penjaga peradaban.
        </p>

        <div class="flex flex-col md:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="500">
            <a href="#" class="px-8 py-4 bg-cyan-neon text-black font-cyber font-bold tracking-widest hover:scale-105 transition shadow-[0_0_20px_rgba(0,240,255,0.5)]">
                [ TERIMA MISI ]
            </a>
            <a href="#" class="px-8 py-4 border border-slate-600 text-white font-cyber font-bold tracking-widest hover:border-white transition">
                PELAJARI PROTOKOL
            </a>
        </div>
    </div>

    <div class="absolute bottom-0 w-full bg-naval/80 border-t border-cyan-neon/30 py-2 overflow-hidden flex whitespace-nowrap">
        <div class="animate-marquee inline-block text-xs text-cyan-neon/70">
            // NEW RECRUITMENT CYCLE OPEN // TARGET: CLASS OF 2025 // PREPARE FOR DEPLOYMENT // PHYSICAL TEST REQUIRED // TAHFIDZ TARGET: 30 JUZ // 
             // NEW RECRUITMENT CYCLE OPEN // TARGET: CLASS OF 2025 // PREPARE FOR DEPLOYMENT // PHYSICAL TEST REQUIRED // TAHFIDZ TARGET: 30 JUZ // 
        </div>
    </div>
</section>

<section class="py-20 bg-void border-b border-slate-800 relative">
    <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-10 text-center">
        
        <div class="p-6 border border-slate-800 hover:border-cyan-neon/50 transition group" data-aos="fade-up">
            <h3 class="text-4xl font-cyber text-white mb-2 group-hover:text-cyan-neon transition">500+</h3>
            <p class="text-slate-500 tracking-widest text-sm">ACTIVE PERSONNEL</p>
        </div>
        
        <div class="p-6 border border-slate-800 hover:border-cyan-neon/50 transition group" data-aos="fade-up" data-aos-delay="100">
            <h3 class="text-4xl font-cyber text-white mb-2 group-hover:text-cyan-neon transition">30 JUZ</h3>
            <p class="text-slate-500 tracking-widest text-sm">HAFALAN TARGET</p>
        </div>
        
        <div class="p-6 border border-slate-800 hover:border-cyan-neon/50 transition group" data-aos="fade-up" data-aos-delay="200">
            <h3 class="text-4xl font-cyber text-white mb-2 group-hover:text-cyan-neon transition">100%</h3>
            <p class="text-slate-500 tracking-widest text-sm">UNIVERSITY ACCEPTANCE</p>
        </div>

    </div>
</section>

<section id="program" class="py-20 bg-naval relative">
    <div class="container mx-auto px-6">
        <div class="mb-16">
            <h2 class="text-3xl font-cyber text-white mb-2 border-l-4 border-cyan-neon pl-4">TRAINING MODULES</h2>
            <p class="text-slate-400 pl-5">Kurikulum Khas SMAIT Taruna Ar Risalah</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-void p-8 relative group overflow-hidden" data-aos="flip-left">
                <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-100 transition duration-500">
                    <svg class="w-16 h-16 text-cyan-neon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h3 class="text-xl font-cyber text-white mb-4">TAHFIDZ CAMP</h3>
                <p class="text-slate-400 text-sm mb-6">Program intensif menghafal Al-Quran dengan metode karantina dan setoran harian yang termonitor digital.</p>
                <a href="#" class="text-cyan-neon text-xs font-bold tracking-widest hover:underline">VIEW PROTOCOL >></a>
                <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-cyan-neon to-transparent transform scale-x-0 group-hover:scale-x-100 transition duration-500"></div>
            </div>

            <div class="bg-void p-8 relative group overflow-hidden" data-aos="flip-left" data-aos-delay="100">
                 <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-100 transition duration-500">
                    <svg class="w-16 h-16 text-gold-militer" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h3 class="text-xl font-cyber text-white mb-4">MILITARY DISCIPLINE</h3>
                <p class="text-slate-400 text-sm mb-6">Pembentukan karakter tangguh, kepemimpinan lapangan, dan fisik prima melalui latihan semi-militer.</p>
                <a href="#" class="text-gold-militer text-xs font-bold tracking-widest hover:underline">VIEW PROTOCOL >></a>
                <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-gold-militer to-transparent transform scale-x-0 group-hover:scale-x-100 transition duration-500"></div>
            </div>

            <div class="bg-void p-8 relative group overflow-hidden" data-aos="flip-left" data-aos-delay="200">
                 <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-100 transition duration-500">
                    <svg class="w-16 h-16 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-xl font-cyber text-white mb-4">IT & ROBOTICS</h3>
                <p class="text-slate-400 text-sm mb-6">Penguasaan teknologi masa depan, coding, dan robotika sebagai bekal persaingan global.</p>
                <a href="#" class="text-blue-500 text-xs font-bold tracking-widest hover:underline">VIEW PROTOCOL >></a>
                <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 to-transparent transform scale-x-0 group-hover:scale-x-100 transition duration-500"></div>
            </div>
        </div>
    </div>
</section>

<footer class="bg-void border-t border-slate-800 py-10 text-center">
    <p class="font-cyber text-white mb-2">SMAIT TARUNA AR RISALAH</p>
    <p class="text-xs text-slate-500 font-mono">COORDINATES: 0°55'N 104°27'E // TANJUNGPINANG SECTOR</p>
</footer>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    // ANIMASI MENGETIK (GSAP)
    gsap.registerPlugin(TextPlugin);
    
    gsap.to("#typing-text", {
        duration: 3,
        text: "SYSTEM ONLINE... SEARCHING CANDIDATES... LOCATION: TANJUNGPINANG",
        ease: "none",
        delay: 0.5
    });
</script>
<style>
    /* Animasi Running Text */
    @keyframes marquee {
        0% { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
    }
    .animate-marquee {
        animation: marquee 20s linear infinite;
    }
</style>
<?= $this->endSection() ?>