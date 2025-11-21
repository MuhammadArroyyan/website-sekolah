<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMAIT Taruna Ar Risalah | Future Guardians</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Share+Tech+Mono&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'void': '#050b14',      // Hitam Pekat
                        'naval': '#0f172a',     // Biru Gelap
                        'cyan-neon': '#00f0ff', // Cyan Cyberpunk
                        'gold-militer': '#d4af37',
                    },
                    fontFamily: {
                        'cyber': ['"Orbitron"', 'sans-serif'],
                        'code': ['"Share Tech Mono"', 'monospace'],
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #050b14; }
        ::-webkit-scrollbar-thumb { background: #1e293b; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #00f0ff; }
        
        /* Grid Background Pattern */
        .bg-grid-pattern {
            background-size: 40px 40px;
            background-image: linear-gradient(to right, rgba(0, 240, 255, 0.05) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(0, 240, 255, 0.05) 1px, transparent 1px);
        }
    </style>
</head>
<body class="bg-void text-slate-300 font-code overflow-x-hidden selection:bg-cyan-neon selection:text-black">

    <?= $this->renderSection('content') ?>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/TextPlugin.min.js"></script>
    
    <script>
        // Inisialisasi AOS
        AOS.init({
            duration: 1000,
            once: true,
        });
    </script>
    
    <?= $this->renderSection('scripts') ?>
</body>
</html>