<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HofmannAPI</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-10 items-center lg:justify-center min-h-screen flex-col font-sans">
    <div class="flex items-center justify-center w-full max-w-7xl transition-opacity duration-700 ease-out animate-fadeIn border border-[#F53003]/50 rounded shadow-[0_0_6px_var(--tw-shadow-color)] shadow-[#F53003]">
        <main class="w-full p-6 bg-[#161615] text-[#EDEDEC] rounded-2xl shadow-xl ring-1 ring-white/10">
            <header class="mb-10">
                <h1 class="text-5xl font-bold tracking-tight text-white">
                    Hofmann<span class="text-[#F53003]">API</span>
                </h1>
                <p class="mt-1 text-[#bbb]">
                    Eine sichere, erweiterbare REST-API für strukturierte und individuelle Daten.
                </p>
                <hr class="border-t border-[#F53003]/50 shadow-[0_0_6px_var(--tw-shadow-color)] shadow-[#F53003] mt-10">
            </header>
            <section class="space-y-10">
                <!-- 🔑 Auth here -->
                <div>
                    <h2 class="text-xl font-semibold text-[#F53003]"><i class="fa-solid fa-key text-white mr-1"></i> API-Key Authentifizierung</h2>
                    <p class="mt-2 text-[#bbb] leading-loose text-base">
                        Für <em>POST</em>, <em>PUT</em> und <em>DELETE</em>-Anfragen ist ein gültiger API-Key erforderlich. Dieser kann bei Thomas Hofmann angefragt werden.<br>
                        Bitte sende den API-Key im Header
                        <code class="bg-[#1f1f1f] px-1 py-0.5 rounded text-sm font-mono text-[#ccc]">X-API-KEY</code>
                        oder als Query-Parameter
                        <code class="bg-[#1f1f1f] px-1 py-0.5 rounded text-sm font-mono text-[#ccc]">?api_key=DEIN_API_KEY</code>.<br>
                        Die Keys unterscheiden sich je nach Ressourcentyp (z. B.
                        <code class="font-mono text-sm px-1 py-0.5 rounded bg-[#1f1f1f] text-[#ccc]">books</code>,
                        <code class="font-mono text-sm px-1 py-0.5 rounded bg-[#1f1f1f] text-[#ccc]">cars</code>,
                        <code class="font-mono text-sm px-1 py-0.5 rounded bg-[#1f1f1f] text-[#ccc]">weather</code>).
                    </p>
                </div>
                <hr class="border-t border-[#F53003]/50 shadow-[0_0_6px_var(--tw-shadow-color)] shadow-[#F53003]">
                <!-- 📚 Bücher -->
                <div>
                    <h2 class="text-xl font-semibold text-[#F53003]"><i class="fa-solid fa-book text-white mr-1"></i> Bücher</h2>
                    <ul class="mt-2 space-y-2 text-[#bbb] text-sm leading-relaxed">
                        <li><strong>GET</strong> /api/books — Liste aller Bücher abrufen</li>
                        <li><strong>GET</strong> /api/books/{id} — Details eines Buches anzeigen</li>
                        <li><strong>POST</strong> /api/books — Neues Buch anlegen <em>(API-Key erforderlich)</em></li>
                        <li><strong>PUT</strong> /api/books/{id} — Buch aktualisieren <em>(API-Key erforderlich)</em></li>
                        <li><strong>DELETE</strong> /api/books/{id} — Buch löschen <em>(API-Key erforderlich)</em></li>
                    </ul>
                </div>

                <!-- 🚗 Autos -->
                <div>
                    <h2 class="text-xl font-semibold text-[#F53003]"><i class="fa-solid fa-car text-white mr-1"></i> Autos</h2>
                    <ul class="mt-2 space-y-2 text-[#bbb] text-sm leading-relaxed">
                        <li><strong>GET</strong> /api/cars — Liste aller Autos abrufen</li>
                        <li><strong>GET</strong> /api/cars/{id} — Details eines Autos anzeigen</li>
                        <li><strong>POST</strong> /api/cars — Neues Auto anlegen <em>(API-Key erforderlich)</em></li>
                        <li><strong>PUT</strong> /api/cars/{id} — Auto aktualisieren <em>(API-Key erforderlich)</em></li>
                        <li><strong>DELETE</strong> /api/cars/{id} — Auto löschen <em>(API-Key erforderlich)</em></li>
                    </ul>
                </div>

                <!-- ☀️ Wetter -->
                <div>
                    <h2 class="text-xl font-semibold text-[#F53003]"><i class="fa-solid fa-bolt text-white mr-1"></i> Wetter</h2>
                    <ul class="mt-2 space-y-2 text-[#bbb] text-sm leading-relaxed">
                        <li><strong>GET</strong> /api/weather — Alle Wetterdaten abrufen</li>
                        <li><strong>GET</strong> /api/weather/{id} — Wettereintrag per ID anzeigen</li>
                        <li><strong>POST</strong> /api/weather — Neuen Wettereintrag anlegen <em>(API-Key erforderlich)</em></li>
                        <li><strong>PUT</strong> /api/weather/{id} — Wetterdaten aktualisieren <em>(API-Key erforderlich)</em></li>
                        <li><strong>DELETE</strong> /api/weather/{id} — Wetterdaten löschen <em>(API-Key erforderlich)</em></li>
                    </ul>
                </div>
                <hr class="border-t border-[#F53003]/50 shadow-[0_0_6px_var(--tw-shadow-color)] shadow-[#F53003]">
                <!-- 📦 Custom Data (für eigene Inhalte wie Spiele, Apps etc.) -->
                <div>
                    <h2 class="text-xl font-semibold text-[#F53003]"><i class="fa-solid fa-database text-white mr-1"></i> Custom Data</h2>
                    <p class="text-sm text-[#bbb] mt-1">
                        Universeller Datenspeicher für beliebige Zwecke (z. B. Coins, Spielstände, Einstellungen, etc.).
                        <br><strong>Hinweis:</strong> Alle Daten sind mandantengetrennt (API-Key bestimmt den Client) und werden nur für den jeweiligen Client angezeigt.
                    </p>
                    <ul class="mt-2 space-y-2 text-[#bbb] text-sm leading-relaxed">
                        <li><strong>GET</strong> /api/data — Alle eigenen Einträge abrufen <em>(API-Key erforderlich)</em></li>
                        <li><strong>GET</strong> /api/data/{id} — Einzelnen Eintrag per ID anzeigen <em>(API-Key erforderlich)</em></li>
                        <li><strong>GET</strong> /api/data/category/{category} — Alle Einträge nach Kategorie filtern <em>(API-Key erforderlich)</em></li>
                        <li><strong>POST</strong> /api/data — Neuen Eintrag speichern <em>(API-Key + Kategorie erforderlich)</em></li>
                        <li><strong>PUT</strong> /api/data/{id} — Eintrag aktualisieren <em>(API-Key erforderlich)</em></li>
                        <li><strong>DELETE</strong> /api/data/{id} — Eintrag löschen <em>(API-Key erforderlich)</em></li>
                    </ul>
                    <p class="text-xs mt-2 text-[#999]">
                        Der POST-Body muss ein JSON-Objekt enthalten mit mindestens einem <code>category</code>-Feld sowie einem <code>data</code>-Objekt:
                    </p>
                    <pre class="bg-[#222] p-2 rounded text-xs text-[#ccc] mt-1 overflow-x-auto">
{
  "category": "coins",
  "data": {
    "gold": 100,
    "silver": 250
  }
}
</pre>
                </div>
                <hr class="border-t border-[#F53003]/50 shadow-[0_0_6px_var(--tw-shadow-color)] shadow-[#F53003]">
            </section>
            <footer class="mt-5 w-full text-sm text-[#F53003]">
                <p>&copy; <span id="year"></span> Thomas Hofmann</p>
            </footer>

            <script>
                document.getElementById('year').textContent = new Date().getFullYear();
            </script>
        </main>

    </div>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.8s ease-out forwards;
        }
    </style>
</body>

</html>