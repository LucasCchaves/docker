<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'BMO') ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=VT323&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'VT323', monospace; font-size: 1.2rem; }
        .pixel-font { font-family: 'Press Start 2P', cursive; }
        .ooo-sky { background: linear-gradient(to bottom, #6ec6ff 0%, #9fdcff 55%, #bdeaff 100%); }
        .ooo-cloud { background: #ffffff; border-radius: 999px; opacity: .9; position: fixed; }
        .ooo-ground { background: #52c96b; border-top: 6px solid #3fb45b; position: fixed; bottom: 0; left: 0; width: 100%; height: 4rem; }
    </style>
</head>
<body class="ooo-sky min-h-screen flex flex-col items-center py-16 px-6 relative overflow-x-hidden">

    <!-- sol -->
    <div class="fixed top-8 right-10 sm:right-20 w-20 h-20 sm:w-28 sm:h-28 rounded-full bg-[#fff2a8] border-4 border-[#ffe27a] shadow-[0_0_40px_rgba(255,242,168,0.9)]"></div>

    <!-- nuvens -->
    <div class="ooo-cloud top-12 left-8 w-24 h-8 sm:w-32 sm:h-10"></div>
    <div class="ooo-cloud top-16 left-16 w-14 h-8 sm:w-20 sm:h-10"></div>
    <div class="ooo-cloud top-24 right-1/3 w-20 h-7 sm:w-28 sm:h-9"></div>

    <!-- chão -->
    <div class="ooo-ground"></div>

    <div class="relative bg-[#b7f0d6] rounded-[2.5rem] border-8 border-[#7fc8a9] shadow-2xl p-8 sm:p-10 w-full max-w-3xl z-10 my-8">

        <!-- bracinhos -->
        <div class="absolute -left-7 top-1/3 w-10 h-16 bg-[#b7f0d6] border-8 border-[#7fc8a9] rounded-full"></div>
        <div class="absolute -right-7 top-1/3 w-10 h-16 bg-[#b7f0d6] border-8 border-[#7fc8a9] rounded-full"></div>

        <!-- perninhas -->
        <div class="absolute left-12 -bottom-9 w-8 h-14 bg-[#b7f0d6] border-8 border-[#7fc8a9] rounded-full"></div>
        <div class="absolute right-12 -bottom-9 w-8 h-14 bg-[#b7f0d6] border-8 border-[#7fc8a9] rounded-full"></div>

        <!-- pezinhos -->
        <div class="absolute left-9 -bottom-14 w-14 h-6 bg-[#7fc8a9] rounded-full"></div>
        <div class="absolute right-9 -bottom-14 w-14 h-6 bg-[#7fc8a9] rounded-full"></div>

        <!-- tela -->
        <div class="bg-[#0b3d34] rounded-2xl border-4 border-black p-5 sm:p-7 shadow-[inset_0_0_25px_rgba(0,0,0,0.6)] text-[#bff7e0] min-h-[16rem]">
            <h1 class="pixel-font text-base sm:text-xl text-center mb-6 text-[#d6fff0] leading-relaxed">
                <?= htmlspecialchars($pageTitle ?? '') ?>
            </h1>
