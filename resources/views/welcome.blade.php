<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HofmannAPI</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-10 items-center lg:justify-center min-h-screen flex-col font-sans">
    <div class="flex items-center justify-center w-full max-w-7xl transition-opacity duration-700 ease-out animate-fadeIn">
        <main class="flex w-full flex-col-reverse lg:flex-row">
            <div class="flex-1 p-6 bg-white dark:bg-[#161615] text-[#1a1a1a] dark:text-[#EDEDEC] rounded-2xl shadow-xl ring-1 ring-black/5 dark:ring-white/10">
                <h1 class="mb-8 pb-2 text-5xl font-bold tracking-tight text-[#1a1a1a] dark:text-white border-b border-[#e5e5e5] dark:border-[#2a2a2a]">
                    Hofmann<span class="text-[#F53003]">API</span>
                </h1>

                <section class="space-y-10">

                    <!-- 🔑 Auth -->
                    <div>
                        <h2 class="text-xl font-semibold text-[#1a1a1a] dark:text-white">🔑 API-Key Authentifizierung</h2>
                        <p class="mt-2 text-[#5c5c5c] dark:text-[#bbb] leading-loose text-base">
                            Für <em>POST</em>, <em>PUT</em> und <em>DELETE</em>-Anfragen ist ein gültiger API-Key erforderlich.<br>
                            Bitte sende den API-Key im Header
                            <code class="bg-[#f6f6f6] dark:bg-[#1f1f1f] px-1 py-0.5 rounded text-sm font-mono text-[#333] dark:text-[#ccc]">X-API-KEY</code>
                            oder als Query-Parameter
                            <code class="bg-[#f6f6f6] dark:bg-[#1f1f1f] px-1 py-0.5 rounded text-sm font-mono text-[#333] dark:text-[#ccc]">?api_key=DEIN_API_KEY</code>.<br>
                            Die Keys unterscheiden sich je nach Ressourcentyp (z. B.
                            <code class="font-mono text-sm px-1 py-0.5 rounded bg-[#f6f6f6] dark:bg-[#1f1f1f] text-[#333] dark:text-[#ccc]">books</code>,
                            <code class="font-mono text-sm px-1 py-0.5 rounded bg-[#f6f6f6] dark:bg-[#1f1f1f] text-[#333] dark:text-[#ccc]">cars</code>,
                            <code class="font-mono text-sm px-1 py-0.5 rounded bg-[#f6f6f6] dark:bg-[#1f1f1f] text-[#333] dark:text-[#ccc]">weather</code>).
                        </p>
                    </div>
                    <!-- 📦 Custom Data (für eigene Inhalte wie Spiele, Apps etc.) -->
                    <div>
                        <h2 class="text-xl font-semibold text-[#1a1a1a] dark:text-white">📦 Custom Data</h2>
                        <p class="text-sm text-[#5c5c5c] dark:text-[#bbb] mt-1">
                            Universeller Datenspeicher für beliebige Zwecke (z. B. Coins, Spielstände, Einstellungen, etc.).
                            <br><strong>Hinweis:</strong> Alle Daten sind mandantengetrennt (API-Key bestimmt den Client) und werden nur für den jeweiligen Client angezeigt.
                        </p>
                        <ul class="mt-2 space-y-2 text-[#5c5c5c] dark:text-[#bbb] text-sm leading-relaxed">
                            <li><strong>GET</strong> /api/data — Alle eigenen Einträge abrufen <em>(API-Key erforderlich)</em></li>
                            <li><strong>GET</strong> /api/data/{id} — Einzelnen Eintrag per ID anzeigen <em>(API-Key erforderlich)</em></li>
                            <li><strong>GET</strong> /api/data/category/{category} — Alle Einträge nach Kategorie filtern <em>(API-Key erforderlich)</em></li>
                            <li><strong>POST</strong> /api/data — Neuen Eintrag speichern <em>(API-Key + Kategorie erforderlich)</em></li>
                            <li><strong>PUT</strong> /api/data/{id} — Eintrag aktualisieren <em>(API-Key erforderlich)</em></li>
                            <li><strong>DELETE</strong> /api/data/{id} — Eintrag löschen <em>(API-Key erforderlich)</em></li>
                        </ul>
                        <p class="text-xs mt-2 text-[#777] dark:text-[#999]">
                            Der POST-Body muss ein JSON-Objekt enthalten mit mindestens einem <code>category</code>-Feld sowie einem <code>data</code>-Objekt:
                        </p>
                        <pre class="bg-[#f4f4f4] dark:bg-[#222] p-2 rounded text-xs text-[#333] dark:text-[#ccc] mt-1 overflow-x-auto">
{
  "category": "coins",
  "data": {
    "gold": 100,
    "silver": 250
  }
}
</pre>
                    </div>

                    <!-- 📚 Bücher -->
                    <div>
                        <h2 class="text-xl font-semibold text-[#1a1a1a] dark:text-white">📚 Bücher</h2>
                        <ul class="mt-2 space-y-2 text-[#5c5c5c] dark:text-[#bbb] text-sm leading-relaxed">
                            <li><strong>GET</strong> /api/books — Liste aller Bücher abrufen</li>
                            <li><strong>GET</strong> /api/books/{id} — Details eines Buches anzeigen</li>
                            <li><strong>POST</strong> /api/books — Neues Buch anlegen <em>(API-Key erforderlich)</em></li>
                            <li><strong>PUT</strong> /api/books/{id} — Buch aktualisieren <em>(API-Key erforderlich)</em></li>
                            <li><strong>DELETE</strong> /api/books/{id} — Buch löschen <em>(API-Key erforderlich)</em></li>
                        </ul>
                    </div>

                    <!-- 🚗 Autos -->
                    <div>
                        <h2 class="text-xl font-semibold text-[#1a1a1a] dark:text-white">🚗 Autos</h2>
                        <ul class="mt-2 space-y-2 text-[#5c5c5c] dark:text-[#bbb] text-sm leading-relaxed">
                            <li><strong>GET</strong> /api/cars — Liste aller Autos abrufen</li>
                            <li><strong>GET</strong> /api/cars/{id} — Details eines Autos anzeigen</li>
                            <li><strong>POST</strong> /api/cars — Neues Auto anlegen <em>(API-Key erforderlich)</em></li>
                            <li><strong>PUT</strong> /api/cars/{id} — Auto aktualisieren <em>(API-Key erforderlich)</em></li>
                            <li><strong>DELETE</strong> /api/cars/{id} — Auto löschen <em>(API-Key erforderlich)</em></li>
                        </ul>
                    </div>

                    <!-- ☀️ Wetter -->
                    <div>
                        <h2 class="text-xl font-semibold text-[#1a1a1a] dark:text-white">☀️ Wetter</h2>
                        <ul class="mt-2 space-y-2 text-[#5c5c5c] dark:text-[#bbb] text-sm leading-relaxed">
                            <li><strong>GET</strong> /api/weather — Alle Wetterdaten abrufen</li>
                            <li><strong>GET</strong> /api/weather/{id} — Wettereintrag per ID anzeigen</li>
                            <li><strong>POST</strong> /api/weather — Neuen Wettereintrag anlegen <em>(API-Key erforderlich)</em></li>
                            <li><strong>PUT</strong> /api/weather/{id} — Wetterdaten aktualisieren <em>(API-Key erforderlich)</em></li>
                            <li><strong>DELETE</strong> /api/weather/{id} — Wetterdaten löschen <em>(API-Key erforderlich)</em></li>
                        </ul>
                    </div>

                </section>
                <footer class="mt-10 w-full border-t border-[#e5e5e5] dark:border-[#2a2a2a] pt-2 text-sm text-[#666] dark:text-[#aaa]">
                    <p>&copy; <span id="year"></span> Thomas Hofmann</p>
                </footer>

                <script>
                    // Setzt automatisch die aktuelle Jahreszahl
                    document.getElementById('year').textContent = new Date().getFullYear();
                </script>
            </div>
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