<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Attendance Tracking App</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <style>
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1s cubic-bezier(.4,0,.2,1) forwards;
        }
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: none;
            }
        }
        .pulse {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%, 100% { filter: drop-shadow(0 0 0 indigo); }
            50% { filter: drop-shadow(0 0 16px #6366f1); }
        }
        .icon-rotate {
            transition: transform 0.7s cubic-bezier(.4,0,.2,1);
        }
        .feature-card:hover .icon-rotate {
            transform: rotate(360deg) scale(1.1);
        }
        .feature-title {
            position: relative;
            display: inline-block;
            transition: color 0.3s;
        }
        .feature-card:hover .feature-title {
            color: #6366f1;
        }
        .feature-title::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg,#6366f1,#a5b4fc);
            transform: scaleX(0);
            transition: transform 0.4s cubic-bezier(.4,0,.2,1);
        }
        .feature-card:hover .feature-title::after {
            transform: scaleX(1);
        }
        .feature-desc {
            transition: color 0.3s, letter-spacing 0.3s;
        }
        .feature-card:hover .feature-desc {
            color: #6366f1;
            letter-spacing: 1px;
        }
    </style>
</head>
<body class="antialiased bg-gradient-to-br from-indigo-100 via-white to-indigo-200 min-h-screen">
    <div class="relative flex items-center justify-center min-h-screen py-4">
        <div class="max-w-3xl mx-auto w-full px-4">
            <div class="flex flex-col items-center">
                <div class="mb-6 fade-in" style="animation-delay:0.2s">
                    <svg class="w-24 h-24 text-indigo-600 pulse" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <rect x="3" y="7" width="18" height="13" rx="2" fill="#fff" stroke="currentColor" />
                        <path d="M8 7V5a4 4 0 0 1 8 0v2" stroke="currentColor" />
                        <circle cx="12" cy="14" r="3" stroke="currentColor" />
                    </svg>
                </div>
                <h1 class="text-4xl md:text-5xl font-extrabold text-indigo-700 mb-4 text-center fade-in" style="animation-delay:0.4s">Student Attendance Tracking App</h1>
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-8 text-center max-w-xl fade-in" style="animation-delay:0.6s">
                    Gérez et suivez la présence de vos étudiants facilement et efficacement.<br>
                    Visualisez les statistiques, exportez les rapports et améliorez l’assiduité grâce à une interface moderne et intuitive.
                </p>

                <!-- Section fonctionnalités -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10 fade-in" style="animation-delay:0.7s">
                    <div class="feature-card flex flex-col items-center bg-white rounded-xl shadow-lg p-6 transition-all duration-300 hover:scale-105 hover:bg-indigo-50 hover:shadow-2xl group">
                        <!-- Heroicon: Chart Bar -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-rotate h-10 w-10 text-indigo-500 mb-2 transition-all duration-300 group-hover:text-indigo-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zM15 17v-2a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2zM21 17v-8a2 2 0 00-2-2h-2a2 2 0 00-2 2v8a2 2 0 002 2h2a2 2 0 002-2z" /></svg>
                        <h3 class="feature-title font-bold text-indigo-700 mb-1">Statistiques en temps réel</h3>
                        <p class="feature-desc text-gray-600 text-sm text-center">Suivez l’assiduité et les tendances de présence avec des graphiques interactifs.</p>
                    </div>
                    <div class="feature-card flex flex-col items-center bg-white rounded-xl shadow-lg p-6 transition-all duration-300 hover:scale-105 hover:bg-indigo-50 hover:shadow-2xl group">
                        <!-- Heroicon: Document Download -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-rotate h-10 w-10 text-indigo-500 mb-2 transition-all duration-300 group-hover:text-indigo-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 16v-4m0 0V8m0 4l-4-4m4 4l4-4m-4 4v8m8-8a8 8 0 11-16 0 8 8 0 0116 0z" /></svg>
                        <h3 class="feature-title font-bold text-indigo-700 mb-1">Exportation de rapports</h3>
                        <p class="feature-desc text-gray-600 text-sm text-center">Générez et téléchargez des rapports de présence pour une gestion facilitée.</p>
                    </div>
                    <div class="feature-card flex flex-col items-center bg-white rounded-xl shadow-lg p-6 transition-all duration-300 hover:scale-105 hover:bg-indigo-50 hover:shadow-2xl group">
                        <!-- Heroicon: User Group -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-rotate h-10 w-10 text-indigo-500 mb-2 transition-all duration-300 group-hover:text-indigo-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20h6M3 20h5v-2a4 4 0 013-3.87M16 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                        <h3 class="feature-title font-bold text-indigo-700 mb-1">Gestion des utilisateurs</h3>
                        <p class="feature-desc text-gray-600 text-sm text-center">Administrez étudiants, enseignants et administrateurs en toute simplicité.</p>
                    </div>
                </div>

                <div class="flex justify-center mt-4 fade-in" style="animation-delay:0.8s">
                    @if (Route::has('login'))
                        <div class="space-x-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="px-6 py-2 bg-indigo-600 text-white rounded-full shadow-lg hover:bg-indigo-700 transition-all duration-300 transform hover:scale-105">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="px-6 py-2 bg-indigo-600 text-white rounded-full shadow-lg hover:bg-indigo-700 transition-all duration-300 transform hover:scale-105">Se connecter</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="px-6 py-2 bg-white text-indigo-700 rounded-full shadow-lg border border-indigo-200 hover:bg-indigo-50 transition-all duration-300 transform hover:scale-105">S'inscrire</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- Animation décorative -->
        <div class="absolute bottom-0 left-0 w-full h-32 pointer-events-none select-none">
            <svg class="w-full h-full" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill="#6366f1" fill-opacity="0.15" d="M0,160L60,165.3C120,171,240,181,360,165.3C480,149,600,107,720,117.3C840,128,960,192,1080,218.7C1200,245,1320,235,1380,229.3L1440,224L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
            </svg>
        </div>
    </div>
</body>
</html>