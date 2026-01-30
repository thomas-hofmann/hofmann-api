<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HofmannAPI</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600|space-grotesk:400,500,600,700" rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="min-h-screen bg-[#08090b] text-white/90 font-sans antialiased">
    <div class="relative isolate min-h-screen">
        <div class="absolute inset-0 -z-10 overflow-hidden">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,#1b1b24_0%,#0a0a0d_55%,#050505_100%)]"></div>
            <div class="absolute -top-40 right-[-6%] h-96 w-96 rounded-full bg-[#F53003]/35 blur-[130px]"></div>
            <div class="absolute top-24 right-[12%] h-56 w-56 rounded-full bg-[#F53003]/18 blur-[90px]"></div>
            <div class="absolute bottom-[-25%] left-[-10%] h-96 w-96 rounded-full bg-[#ffb703]/15 blur-[140px]"></div>
            <div class="absolute inset-0 opacity-40 bg-[linear-gradient(120deg,rgba(255,255,255,0.04)_1px,transparent_1px)] bg-[length:18px_18px]"></div>
        </div>

        <div class="mx-auto w-full max-w-6xl px-0 py-6 sm:px-6 sm:py-10 lg:py-14">
            <main data-aos="zoom-in" class="rounded-none border border-white/10 bg-white/5 p-6 shadow-[0_40px_100px_rgba(0,0,0,0.55)] sm:rounded-3xl lg:p-10">
                <header class="flex flex-col gap-4 border-b border-white/10 pb-8">
                    <div class="flex flex-wrap items-center gap-3 text-xs uppercase tracking-[0.3em] text-white/50" data-aos="fade-left" data-aos-delay="200">
                        <span class="rounded-full border border-white/10 bg-white/10 px-3 py-1 text-[0.65rem] font-semibold tracking-[0.35em]">REST</span>
                        <span class="text-white/40">Private API Workspace</span>
                    </div>
                    <div>
                        <h1 class="font-display text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl" data-aos="fade-left" data-aos-delay="400">
                            Hofmann<span class="text-[#F53003]">API</span>
                        </h1>
                        <p class="mt-3 max-w-2xl text-base text-white/70" data-aos="fade-left" data-aos-delay="600">
                            Eine sichere, erweiterbare REST-API für strukturierte und individuelle Daten.
                        </p>
                    </div>
                </header>

                <section class="mt-8 grid gap-6 lg:grid-cols-3">
                    <div class="rounded-2xl border border-white/10 bg-[#101014]/80 p-6 shadow-[0_25px_60px_rgba(0,0,0,0.35)] backdrop-blur lg:col-span-3">
                        <h2 class="flex items-center gap-2 text-lg font-semibold text-white">
                            <span class="text-[#F53003]"><i class="fa-solid fa-key"></i></span>
                            API-Key Authentifizierung
                        </h2>
                        <p class="mt-3 text-sm leading-relaxed text-white/70">
                            Für <em>POST</em>, <em>PUT</em> und <em>DELETE</em>-Anfragen ist ein gültiger API-Key erforderlich. Dieser kann bei Thomas Hofmann angefragt werden.
                            Bitte sende den API-Key im Header <code>X-API-KEY</code> oder als Query-Parameter <code>?api_key=DEIN_API_KEY</code>.
                            Die Keys unterscheiden sich je nach Ressourcentyp (z. B. <code>books</code>, <code>cars</code>, <code>weather</code>).
                        </p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-[#0f1013]/70 p-6 shadow-[0_20px_50px_rgba(0,0,0,0.35)]">
                        <h2 class="flex items-center gap-2 text-lg font-semibold text-white">
                            <span class="text-[#F53003]"><i class="fa-solid fa-book"></i></span>
                            Bücher
                        </h2>
                        <ul class="mt-4 space-y-2 text-sm text-white/70">
                            <li><strong>GET</strong> /api/books — Liste aller Bücher abrufen</li>
                            <li><strong>GET</strong> /api/books/{id} — Details eines Buches anzeigen</li>
                            <li><strong>POST</strong> /api/books — Neues Buch anlegen <em>(API-Key erforderlich)</em></li>
                            <li><strong>PUT</strong> /api/books/{id} — Buch aktualisieren <em>(API-Key erforderlich)</em></li>
                            <li><strong>DELETE</strong> /api/books/{id} — Buch löschen <em>(API-Key erforderlich)</em></li>
                        </ul>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-[#0f1013]/70 p-6 shadow-[0_20px_50px_rgba(0,0,0,0.35)]">
                        <h2 class="flex items-center gap-2 text-lg font-semibold text-white">
                            <span class="text-[#F53003]"><i class="fa-solid fa-car"></i></span>
                            Autos
                        </h2>
                        <ul class="mt-4 space-y-2 text-sm text-white/70">
                            <li><strong>GET</strong> /api/cars — Liste aller Autos abrufen</li>
                            <li><strong>GET</strong> /api/cars/{id} — Details eines Autos anzeigen</li>
                            <li><strong>POST</strong> /api/cars — Neues Auto anlegen <em>(API-Key erforderlich)</em></li>
                            <li><strong>PUT</strong> /api/cars/{id} — Auto aktualisieren <em>(API-Key erforderlich)</em></li>
                            <li><strong>DELETE</strong> /api/cars/{id} — Auto löschen <em>(API-Key erforderlich)</em></li>
                        </ul>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-[#0f1013]/70 p-6 shadow-[0_20px_50px_rgba(0,0,0,0.35)]">
                        <h2 class="flex items-center gap-2 text-lg font-semibold text-white">
                            <span class="text-[#F53003]"><i class="fa-solid fa-bolt"></i></span>
                            Wetter
                        </h2>
                        <ul class="mt-4 space-y-2 text-sm text-white/70">
                            <li><strong>GET</strong> /api/weather — Alle Wetterdaten abrufen</li>
                            <li><strong>GET</strong> /api/weather/{id} — Wettereintrag per ID anzeigen</li>
                            <li><strong>POST</strong> /api/weather — Neuen Wettereintrag anlegen <em>(API-Key erforderlich)</em></li>
                            <li><strong>PUT</strong> /api/weather/{id} — Wetterdaten aktualisieren <em>(API-Key erforderlich)</em></li>
                            <li><strong>DELETE</strong> /api/weather/{id} — Wetterdaten löschen <em>(API-Key erforderlich)</em></li>
                        </ul>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-[#101014]/80 p-6 shadow-[0_25px_60px_rgba(0,0,0,0.35)] backdrop-blur lg:col-span-3">
                        <h2 class="flex items-center gap-2 text-lg font-semibold text-white">
                            <span class="text-[#F53003]"><i class="fa-solid fa-database"></i></span>
                            Custom Data
                        </h2>
                        <p class="mt-3 text-sm text-white/70">
                            Universeller Datenspeicher für beliebige Zwecke (z. B. Coins, Spielstände, Einstellungen, etc.).
                            <strong class="text-white/80">Hinweis:</strong> Alle Daten sind mandantengetrennt (API-Key bestimmt den Client) und werden nur für den jeweiligen Client angezeigt.
                        </p>
                        <ul class="mt-4 space-y-2 text-sm text-white/70">
                            <li><strong>GET</strong> /api/data — Alle eigenen Einträge abrufen <em>(API-Key erforderlich)</em></li>
                            <li><strong>GET</strong> /api/data/{id} — Einzelnen Eintrag per ID anzeigen <em>(API-Key erforderlich)</em></li>
                            <li><strong>GET</strong> /api/data/category/{category} — Alle Einträge nach Kategorie filtern <em>(API-Key erforderlich)</em></li>
                            <li><strong>POST</strong> /api/data — Neuen Eintrag speichern <em>(API-Key + Kategorie erforderlich)</em></li>
                            <li><strong>PUT</strong> /api/data/{id} — Eintrag aktualisieren <em>(API-Key erforderlich)</em></li>
                            <li><strong>DELETE</strong> /api/data/{id} — Eintrag löschen <em>(API-Key erforderlich)</em></li>
                        </ul>
                        <p class="mt-4 text-xs text-white/60">
                            Der POST-Body muss ein JSON-Objekt enthalten mit mindestens einem <code>category</code>-Feld sowie einem <code>data</code>-Objekt:
                        </p>
                        <pre class="mt-3 overflow-x-auto">
{
  "category": "coins",
  "data": {
    "gold": 100,
    "silver": 250
  }
}
</pre>
                    </div>
                </section>

                <footer class="mt-10 flex flex-wrap items-center justify-between gap-4 border-t border-white/10 pt-6 text-xs text-white/50">
                    <p>&copy; <span id="year"></span> Thomas Hofmann</p>
                    <p class="uppercase tracking-[0.2em]">Hofmann API</p>
                </footer>

                <script>
                    document.getElementById('year').textContent = new Date().getFullYear();
                </script>
            </main>
        </div>
    </div>
</body>

</html>
