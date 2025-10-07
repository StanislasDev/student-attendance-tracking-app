
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
        <style>
            body {
                background: #18181b;
            }
            .quote-card {
                background: #232336;
                box-shadow: 0 2px 8px 0 rgba(99,102,241,0.10);
                border-radius: 1rem;
                padding: 1.5rem;
                color: #e5e7eb;
                position: relative;
                overflow: hidden;
                animation: fadeInUp 1s cubic-bezier(.4,0,.2,1) forwards;
            }
            @keyframes fadeInUp {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: none; }
            }
            .quote-card blockquote {
                font-size: 1.1rem;
                font-style: italic;
                margin-bottom: 0.5rem;
            }
            .quote-card footer {
                font-size: 0.95rem;
                font-weight: 500;
                opacity: 0.8;
                color: #a5b4fc;
            }
            .form-card {
                background: #232336;
                border-radius: 1rem;
                box-shadow: 0 2px 8px 0 rgba(99,102,241,0.10);
                transition: box-shadow 0.3s, transform 0.3s;
                padding: 2rem 1.5rem;
                color: #e5e7eb;
            }
            .form-card:hover {
                box-shadow: 0 4px 16px 0 rgba(99,102,241,0.18);
                transform: scale(1.01);
            }
        </style>
    </head>
    <body class="min-h-screen antialiased">
        <div class="relative grid h-dvh flex-col items-center justify-center px-8 sm:px-0 lg:max-w-none lg:grid-cols-2 lg:px-0">
            <!-- Colonne gauche décorative -->
            <div class="relative hidden h-full flex-col p-10 text-gray-200 lg:flex dark:border-e dark:border-neutral-800 justify-between">
                <div class="absolute inset-0">
                    <svg viewBox="0 0 400 400" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-full absolute top-0 left-0">
                        <circle cx="200" cy="200" r="140" fill="#6366f1" fill-opacity="0.05" />
                        <g id="orbit-group">
                            <circle id="orbit-path" cx="200" cy="200" r="90" fill="none" stroke="#6366f1" stroke-opacity="0.08" stroke-width="2" />
                            <circle id="orbit-dot" r="18" fill="#a5b4fc" fill-opacity="0.18" />
                        </g>
                    </svg>
                    <style>
                        /* Animation orbitale du cercle interne */
                        #orbit-dot {
                            transform-box: fill-box;
                            transform-origin: 200px 200px;
                            animation: orbit-move 6s linear infinite;
                        }
                        @keyframes orbit-move {
                            0%   { transform: rotate(0deg) translate(90px) rotate(0deg); }
                            100% { transform: rotate(360deg) translate(90px) rotate(-360deg); }
                        }
                    </style>
                </div>
                <a href="{{ route('home') }}" class="relative z-20 flex items-center text-xl font-semibold tracking-tight" wire:navigate>
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-900/40 shadow">
                        <x-app-logo-icon class="me-2 h-7 fill-current text-indigo-300" />
                    </span>
                    <span class="ms-2">{{ config('app.name', 'Laravel') }}</span>
                </a>
                @php
                    [$message, $author] = str(Illuminate\Foundation\Inspiring::quotes()->random())->explode('-');
                @endphp
                <div class="relative z-20 mt-auto mb-8">
                    <div class="quote-card">
                        <blockquote>&ldquo;{{ trim($message) }}&rdquo;</blockquote>
                        <footer>— {{ trim($author) }}</footer>
                    </div>
                </div>
            </div>
            <!-- Colonne droite formulaire -->
            <div class="w-full lg:p-8 flex items-center justify-center">
                <div class="form-card mx-auto flex w-full flex-col justify-center space-y-6 sm:w-[350px]">
                    <a href="{{ route('home') }}" class="z-20 flex flex-col items-center gap-2 font-medium lg:hidden" wire:navigate>
                        <span class="flex h-9 w-9 items-center justify-center rounded-md bg-indigo-900/40">
                            <x-app-logo-icon class="size-8 fill-current text-indigo-300" />
                        </span>
                        <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                    </a>
                    {{ $slot }}
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>
