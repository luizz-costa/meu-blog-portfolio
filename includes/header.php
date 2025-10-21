<?php $basePath = '/'; ?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luiz F. Costa</title>

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="<?= $basePath ?>favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="<?= $basePath ?>favicon/favicon.svg" />
    <link rel="shortcut icon" href="/meu-blog-portfolio/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $basePath ?>favicon/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="Luiz F. Costa" />
    <link rel="manifest" href="<?= $basePath ?>favicon/site.webmanifest" />

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Devicons -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel=stylesheet>
    <link rel="stylesheet" href="<?= $basePath ?>assets/css/style.css">

    <script>
        (function() {
            const isDark = localStorage.getItem("color-theme") === "dark" ||
                (!("color-theme" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches);
            if (isDark) document.documentElement.classList.add("dark");
            else document.documentElement.classList.remove("dark");
        })();
    </script>

</head>

<body class="min-h-screen bg-bg-primary-light dark:bg-bg-primary-dark text-text-primary-light dark:text-text-primary-dark">
    <header class="py-6 relative">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex justify-between items-center"><a href="<?= $basePath ?>" class="text-xl font-bold text-text-primary-light dark:text-text-primary-dark hover:text-accent-light dark:hover:text-accent-dark transition-colors duration-300">Luiz F. Costa</a><button id=mobile-menu-button class="md:hidden text-text-secondary-light dark:text-text-secondary-dark hover:text-text-primary-light dark:hover:text-text-primary-dark focus:outline-none"><svg class="w-6 h-6" fill="none" stroke="currentcolor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg></button></div>
                <nav class="hidden md:flex flex-wrap justify-center items-center gap-4 md:gap-6">
                    <a href="<?= $basePath ?>about.php" class="inline-block text-lg text-text-primary-light dark:text-text-primary-dark hover:text-text-primary-light dark:hover:text-text-primary-dark transition-colors duration-300">Sobre</a>
                    <a href="<?= $basePath ?>experience.php" class="inline-block text-lg text-text-primary-light dark:text-text-primary-dark hover:text-text-primary-light dark:hover:text-text-primary-dark transition-colors duration-300">Experiência</a>
                    <a href="<?= $basePath ?>projects.php" class="inline-block text-lg text-text-primary-light dark:text-text-primary-dark hover:text-text-primary-light dark:hover:text-text-primary-dark transition-colors duration-300">Projetos</a>
                    <a href="<?= $basePath ?>blog.php" class="inline-block text-lg text-text-primary-light dark:text-text-primary-dark hover:text-text-primary-light dark:hover:text-text-primary-dark transition-colors duration-300">Blog</a>
                    <a href="<?= $basePath ?>contact.php" class="inline-block text-lg text-text-primary-light dark:text-text-primary-dark hover:text-text-primary-light dark:hover:text-text-primary-dark transition-colors duration-300">Contato</a>
                </nav>
                <div class="hidden md:flex justify-end items-center">
                    <div class="flex items-center">

                        <!-- <div class="language-switcher ml-4">
                        <div class="language-switcher-btn text-lg text-text-primary-light dark:text-text-primary-dark hover:text-text-primary-light dark:hover:text-text-primary-dark transition-colors duration-300 p-2 rounded-md">BR<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6" />
                            </svg></div>
                        <div class=language-dropdown><a href="index.php" class="language-active text-text-primary-light dark:text-text-primary-dark hover:text-text-primary-light dark:hover:text-text-primary-dark transition-colors duration-300">English </a></div>
                    </div> -->
                        <button id=theme-toggle-button-desktop class="ml-4 inline-block text-lg text-text-primary-light dark:text-text-primary-dark hover:text-text-primary-light dark:hover:text-text-primary-dark transition-colors duration-300 p-2 rounded-md"><svg id="theme-toggle-dark-icon-desktop" width="24" height="24" viewBox="0 0 24 24" fill="none" class="w-5 h-5">
                                <path d="M21.7519 15.0021C20.597 15.484 19.3296 15.7501 18 15.7501c-5.3848.0-9.75-4.3652-9.75-9.74999C8.25 4.67052 8.51614 3.40308 8.99806 2.24817 5.47566 3.71798 3 7.19493 3 11.2501c0 5.3848 4.36522 9.75 9.75 9.75 4.0552.0 7.5321-2.4756 9.0019-5.998z" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg><svg id="theme-toggle-light-icon-desktop" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentcolor" aria-hidden="true" data-slot="icon" class="w-5 h-5 hidden">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75.0 11-7.5.0 3.75 3.75.0 017.5.0z" />
                            </svg></button>
                    </div>
                </div>
            </div>
            <div id=mobile-menu class="fixed inset-0 bg-bg-secondary-light dark:bg-bg-secondary-dark z-50 hidden transition-all duration-300 backdrop-blur-2xl">
                <div class="flex flex-col h-full">
                    <div class="flex justify-between items-center p-6"><span class="text-xl font-bold text-text-primary-light dark:text-text-primary-dark">Menu</span>
                        <div class="flex items-center gap-4">
                            <!-- <div class=language-switcher>
                            <div class="language-switcher-btn text-text-secondary-light dark:text-text-secondary-dark hover:text-text-primary-light dark:hover:text-text-primary-dark transition-colors duration-300 flex items-center p-2 rounded-md">BR<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m6 9 6 6 6-6" />
                                </svg></div>
                            <div class=language-dropdown><a href="" class="language-active text-text-secondary-light dark:text-text-secondary-dark hover:text-text-primary-light dark:hover:text-text-primary-dark transition-colors duration-300">English </a></div>
                        </div> -->
                            <button id=theme-toggle-button-mobile class="text-text-secondary-light dark:text-text-secondary-dark hover:text-text-primary-light dark:hover:text-text-primary-dark transition-colors duration-300 flex items-center p-2 rounded-md">
                                <svg id="theme-toggle-dark-icon-mobile" width="24" height="24" viewBox="0 0 24 24" fill="none" class="w-5 h-5">
                                    <path d="M21.7519 15.0021C20.597 15.484 19.3296 15.7501 18 15.7501c-5.3848.0-9.75-4.3652-9.75-9.74999C8.25 4.67052 8.51614 3.40308 8.99806 2.24817 5.47566 3.71798 3 7.19493 3 11.2501c0 5.3848 4.36522 9.75 9.75 9.75 4.0552.0 7.5321-2.4756 9.0019-5.998z" stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <svg id="theme-toggle-light-icon-mobile" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentcolor" aria-hidden="true" data-slot="icon" class="w-5 h-5 hidden">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75.0 11-7.5.0 3.75 3.75.0 017.5.0z" />
                                </svg>
                            </button>
                            <button id=mobile-menu-close class="text-text-secondary-light dark:text-text-secondary-dark hover:text-text-primary-light dark:hover:text-text-primary-dark transition-colors duration-300 focus:outline-none"><svg class="w-6 h-6" fill="none" stroke="currentcolor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6M6 6l12 12" />
                                </svg></button>
                        </div>
                    </div>
                    <nav class="flex flex-col p-6 space-y-4">
                        <a href="<?= $basePath ?>" class="text-xl text-text-secondary-light dark:text-text-secondary-dark hover:text-text-primary-light dark:hover:text-text-primary-dark transition-colors duration-300" data-menu-link>Início</a>
                        <a href="<?= $basePath ?>about.php" class="text-xl text-text-secondary-light dark:text-text-secondary-dark hover:text-text-primary-light dark:hover:text-text-primary-dark transition-colors duration-300" data-menu-link>Sobre</a>
                        <a href="<?= $basePath ?>experience.php" class="text-xl text-text-secondary-light dark:text-text-secondary-dark hover:text-text-primary-light dark:hover:text-text-primary-dark transition-colors duration-300" data-menu-link>Experiência</a>
                        <a href="<?= $basePath ?>projects.php" class="text-xl text-text-secondary-light dark:text-text-secondary-dark hover:text-text-primary-light dark:hover:text-text-primary-dark transition-colors duration-300" data-menu-link>Projetos</a>
                        <a href="<?= $basePath ?>blog.php" class="text-xl text-text-secondary-light dark:text-text-secondary-dark hover:text-text-primary-light dark:hover:text-text-primary-dark transition-colors duration-300" data-menu-link>Blog</a>
                        <a href="<?= $basePath ?>contact.php" class="text-xl text-text-secondary-light dark:text-text-secondary-dark hover:text-text-primary-light dark:hover:text-text-primary-dark transition-colors duration-300" data-menu-link>Contato</a>
                    </nav>
                    <div class="mt-auto p-6">
                        <div class="flex items-center justify-center"><span class="text-lg text-text-secondary-light dark:text-text-secondary-dark mr-2">Hora:</span>
                            <div id=mobile-local-time class="text-lg text-text-secondary-light dark:text-text-secondary-dark"></div>
                        </div>
                    </div>
                </div>
            </div>
    </header>

    <main>