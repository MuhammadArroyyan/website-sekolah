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
        <a href="#mission" class="nav-link text-slate-400 hover:text-cyan-neon transition duration-300">MISI</a>
        
        <a href="#leaderboard" class="nav-link text-slate-400 hover:text-cyan-neon transition duration-300">LEADERBOARD</a>
        
        <a href="#program" class="nav-link text-slate-400 hover:text-cyan-neon transition duration-300">PROGRAM</a>
        
        <a href="#facility" class="nav-link text-slate-400 hover:text-cyan-neon transition duration-300">ARSENAL</a>
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

<section id="mission" class="py-24 bg-void relative border-t border-slate-800">
    <div class="container mx-auto px-6">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <h2 class="text-4xl font-cyber text-white mb-6 leading-tight">
                    OPERATIONAL <br>
                    <span class="text-cyan-neon">OBJECTIVES</span>
                </h2>
                <p class="text-slate-400 mb-6 text-lg leading-relaxed">
                    Membangun karakter pemimpin yang tidak hanya kuat secara fisik dan intelektual, 
                    tetapi juga memiliki fondasi spiritual yang kokoh sebagai penjaga nilai-nilai Al-Quran.
                </p>
                
                <div class="space-y-4">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-slate-800 border border-cyan-neon rounded flex items-center justify-center shrink-0">
                            <span class="text-cyan-neon font-bold">01</span>
                        </div>
                        <div>
                            <h4 class="text-white font-bold mb-1">INTEGRITAS QURANI</h4>
                            <p class="text-xs text-slate-500">Menjadikan Al-Quran sebagai panduan utama dalam setiap pengambilan keputusan.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-slate-800 border border-gold-militer rounded flex items-center justify-center shrink-0">
                            <span class="text-gold-militer font-bold">02</span>
                        </div>
                        <div>
                            <h4 class="text-white font-bold mb-1">KETANGGUHAN FISIK</h4>
                            <p class="text-xs text-slate-500">Membentuk raga yang sehat dan kuat melalui disiplin semi-militer yang terukur.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-slate-800 border border-blue-500 rounded flex items-center justify-center shrink-0">
                            <span class="text-blue-500 font-bold">03</span>
                        </div>
                        <div>
                            <h4 class="text-white font-bold mb-1">WAWASAN GLOBAL</h4>
                            <p class="text-xs text-slate-500">Menguasai sains dan teknologi untuk bersaing di kancah internasional.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative h-full flex justify-center items-center" data-aos="zoom-in">
                <div class="absolute w-64 h-64 border border-cyan-neon/20 rounded-full animate-[spin_10s_linear_infinite]"></div>
                <div class="absolute w-80 h-80 border border-dashed border-slate-700 rounded-full animate-[spin_15s_linear_infinite_reverse]"></div>
                
                <div class="relative z-10 bg-slate-800 p-2 rounded-lg rotate-3 hover:rotate-0 transition duration-500 border border-slate-600">
                    <img src="https://source.unsplash.com/random/400x500/?military,student" alt="Mission Visual" class="rounded grayscale hover:grayscale-0 transition duration-500">
                    <div class="absolute bottom-4 left-4 bg-black/80 px-3 py-1 rounded border-l-2 border-cyan-neon">
                        <p class="text-[10px] text-cyan-neon font-mono">STATUS: ON MISSION</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<section id="leaderboard" class="py-20 bg-naval relative overflow-hidden border-t border-slate-800"></section>
    <div class="absolute inset-0 bg-grid-pattern opacity-20 pointer-events-none"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-cyber text-white mb-4">ELITE SQUAD</h2>
            <p class="text-cyan-neon tracking-[0.3em] text-sm">TOP PERFORMING CADETS // LIVE DATA</p>
            <div class="w-24 h-1 bg-cyan-neon mx-auto mt-6 shadow-[0_0_15px_#00f0ff]"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-end max-w-5xl mx-auto">
            
            <?php 
                // Ambil Top 3 Saja
                $top3 = array_slice($elites, 0, 3); 
            ?>

            <?php if(count($top3) >= 3): ?>

                <div class="order-2 md:order-1 bg-void border border-slate-700 p-6 rounded-lg relative group hover:-translate-y-2 transition duration-500" data-aos="fade-right" data-aos-delay="200">
                    <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-slate-800 border border-slate-600 text-slate-300 px-4 py-1 rounded-full text-xs font-bold tracking-widest">
                        RANK 02
                    </div>
                    <div class="text-center mt-4">
                        <img src="<?= base_url('assets/images/taruna/'.$top3[1]->photo) ?>" onerror="this.src='<?= base_url('assets/images/ui/default-avatar-l.png') ?>'" class="w-24 h-24 rounded-full mx-auto border-2 border-slate-500 object-cover mb-4 grayscale group-hover:grayscale-0 transition duration-500">
                        <h3 class="text-white font-bold text-lg font-cyber mb-1 truncate"><?= $top3[1]->full_name ?></h3>
                        <p class="text-slate-500 text-xs font-mono mb-4"><?= $top3[1]->class_name ?></p>
                        
                        <div class="flex justify-center gap-4 border-t border-slate-800 pt-4">
                            <div class="text-center">
                                <p class="text-[10px] text-slate-500">POINTS</p>
                                <p class="text-cyan-neon font-mono font-bold"><?= $top3[1]->total_points ?></p>
                            </div>
                            <div class="text-center">
                                <p class="text-[10px] text-slate-500">QURAN</p>
                                <p class="text-green-400 font-mono font-bold"><?= $top3[1]->juz_completed ?> Juz</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="order-1 md:order-2 bg-gradient-to-b from-slate-900 to-void border border-gold-militer p-8 rounded-xl relative shadow-[0_0_30px_rgba(212,175,55,0.15)] transform md:-translate-y-8" data-aos="zoom-in">
                    <div class="absolute -top-5 left-1/2 -translate-x-1/2 bg-gold-militer text-black px-6 py-2 rounded-full text-sm font-bold font-cyber tracking-widest shadow-lg">
                        CHAMPION
                    </div>
                    <div class="text-center mt-6">
                        <div class="relative inline-block">
                            <img src="<?= base_url('assets/images/taruna/'.$top3[0]->photo) ?>" onerror="this.src='<?= base_url('assets/images/ui/default-avatar-l.png') ?>'" class="w-32 h-32 rounded-full mx-auto border-4 border-gold-militer object-cover mb-4 shadow-[0_0_20px_rgba(212,175,55,0.4)]">
                            <div class="absolute -bottom-2 -right-2 bg-black rounded-full p-2 border border-gold-militer">
                                <svg class="w-6 h-6 text-gold-militer" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            </div>
                        </div>
                        <h3 class="text-gold-militer font-bold text-xl font-cyber mb-1"><?= $top3[0]->full_name ?></h3>
                        <p class="text-slate-400 text-sm font-mono mb-6"><?= $top3[0]->class_name ?></p>
                        
                        <div class="grid grid-cols-2 gap-4 bg-slate-800/50 rounded border border-slate-700 p-4">
                            <div class="text-center">
                                <p class="text-[10px] text-slate-500 uppercase">Discipline</p>
                                <p class="text-2xl text-white font-mono font-bold"><?= $top3[0]->total_points ?></p>
                            </div>
                            <div class="text-center">
                                <p class="text-[10px] text-slate-500 uppercase">Tahfidz</p>
                                <p class="text-2xl text-green-400 font-mono font-bold"><?= $top3[0]->juz_completed ?> <span class="text-xs">Juz</span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="order-3 md:order-3 bg-void border border-slate-700 p-6 rounded-lg relative group hover:-translate-y-2 transition duration-500" data-aos="fade-left" data-aos-delay="400">
                    <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-slate-800 border border-orange-700 text-orange-500 px-4 py-1 rounded-full text-xs font-bold tracking-widest">
                        RANK 03
                    </div>
                    <div class="text-center mt-4">
                        <img src="<?= base_url('assets/images/taruna/'.$top3[2]->photo) ?>" onerror="this.src='<?= base_url('assets/images/ui/default-avatar-l.png') ?>'" class="w-24 h-24 rounded-full mx-auto border-2 border-orange-700 object-cover mb-4 grayscale group-hover:grayscale-0 transition duration-500">
                        <h3 class="text-white font-bold text-lg font-cyber mb-1 truncate"><?= $top3[2]->full_name ?></h3>
                        <p class="text-slate-500 text-xs font-mono mb-4"><?= $top3[2]->class_name ?></p>
                        
                        <div class="flex justify-center gap-4 border-t border-slate-800 pt-4">
                            <div class="text-center">
                                <p class="text-[10px] text-slate-500">POINTS</p>
                                <p class="text-cyan-neon font-mono font-bold"><?= $top3[2]->total_points ?></p>
                            </div>
                            <div class="text-center">
                                <p class="text-[10px] text-slate-500">QURAN</p>
                                <p class="text-green-400 font-mono font-bold"><?= $top3[2]->juz_completed ?> Juz</p>
                            </div>
                        </div>
                    </div>
                </div>

            <?php else: ?>
                <div class="col-span-3 text-center py-10 border border-dashed border-slate-700 rounded">
                    <p class="text-slate-500 font-mono">DATA RANKING BELUM TERSEDIA. MENUNGGU SIKLUS PENILAIAN.</p>
                </div>
            <?php endif; ?>

        </div>

        <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="600">
            <p class="text-slate-400 text-xs mb-4">Ingin melihat peringkat lengkap?</p>
            <a href="/login" class="inline-flex items-center px-8 py-3 border border-cyan-neon text-cyan-neon hover:bg-cyan-neon hover:text-black transition font-cyber font-bold tracking-widest text-sm">
                LOGIN UNTUK AKSES PENUH
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
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

<section id="facility" class="py-24 bg-naval relative">
    <div class="container mx-auto px-6">
        
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl font-cyber text-white mb-2">BASE <span class="text-gold-militer">INFRASTRUCTURE</span></h2>
            <p class="text-slate-400 text-sm tracking-widest uppercase">ARSENAL & FASILITAS PENDUKUNG</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            
            <div class="group relative h-64 overflow-hidden rounded-lg border border-slate-700 cursor-pointer" data-aos="fade-up" data-aos-delay="0">
                <img src="https://source.unsplash.com/random/400x600/?mosque" class="w-full h-full object-cover transition duration-700 group-hover:scale-110 opacity-60 group-hover:opacity-100">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
                <div class="absolute bottom-4 left-4">
                    <p class="text-xs text-gold-militer font-mono mb-1">SECTOR A</p>
                    <h3 class="text-white font-bold font-cyber tracking-wide">MASJID JAMI'</h3>
                </div>
            </div>

            <div class="group relative h-64 overflow-hidden rounded-lg border border-slate-700 cursor-pointer" data-aos="fade-up" data-aos-delay="100">
                <img src="https://source.unsplash.com/random/400x600/?dormitory" class="w-full h-full object-cover transition duration-700 group-hover:scale-110 opacity-60 group-hover:opacity-100">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
                <div class="absolute bottom-4 left-4">
                    <p class="text-xs text-cyan-neon font-mono mb-1">SECTOR B</p>
                    <h3 class="text-white font-bold font-cyber tracking-wide">BARRACKS (ASRAMA)</h3>
                </div>
            </div>

            <div class="group relative h-64 overflow-hidden rounded-lg border border-slate-700 cursor-pointer" data-aos="fade-up" data-aos-delay="200">
                <img src="https://source.unsplash.com/random/400x600/?sports" class="w-full h-full object-cover transition duration-700 group-hover:scale-110 opacity-60 group-hover:opacity-100">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
                <div class="absolute bottom-4 left-4">
                    <p class="text-xs text-green-500 font-mono mb-1">SECTOR C</p>
                    <h3 class="text-white font-bold font-cyber tracking-wide">TRAINING GROUND</h3>
                </div>
            </div>

            <div class="group relative h-64 overflow-hidden rounded-lg border border-slate-700 cursor-pointer" data-aos="fade-up" data-aos-delay="300">
                <img src="https://source.unsplash.com/random/400x600/?computer,lab" class="w-full h-full object-cover transition duration-700 group-hover:scale-110 opacity-60 group-hover:opacity-100">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
                <div class="absolute bottom-4 left-4">
                    <p class="text-xs text-blue-500 font-mono mb-1">SECTOR D</p>
                    <h3 class="text-white font-bold font-cyber tracking-wide">CYBER LABS</h3>
                </div>
            </div>

        </div>

    </div>
</section>

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
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('.nav-link');

    window.addEventListener('scroll', () => {
        let current = '';
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            
            // Deteksi jika kita sudah scroll sampai ke wilayah section ini
            // (-200 adalah offset agar menu berubah sebelum benar-benar pas di garis)
            if (scrollY >= (sectionTop - 200)) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            // Hapus efek nyala dari semua link
            link.classList.remove('text-cyan-neon', 'font-bold', 'drop-shadow-[0_0_5px_rgba(0,240,255,0.8)]');
            link.classList.add('text-slate-400'); // Kembalikan ke warna redup

            // Jika href link ini cocok dengan id section yang aktif...
            if (link.getAttribute('href').includes(current)) {
                // ...Nyalakan efek neon!
                link.classList.remove('text-slate-400');
                link.classList.add('text-cyan-neon', 'font-bold', 'drop-shadow-[0_0_5px_rgba(0,240,255,0.8)]');
            }
        });
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