<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body style="margin:0; padding:0; background:#0a0a0a; min-height:100vh; display:flex; align-items:center; justify-content:center; font-family:'Segoe UI',sans-serif;">

        <div style="width:100%; max-width:420px; padding:16px;">

            <!-- Brand -->
            <div style="text-align:center; margin-bottom:32px;">
                <div style="display:inline-flex; align-items:center; gap:10px; margin-bottom:8px;">
                    <div style="width:36px; height:36px; background:#eab308; border-radius:8px; display:flex; align-items:center; justify-content:center;">
                        <span style="font-size:18px; font-weight:900; color:#000;">L</span>
                    </div>
                    <span style="font-size:1.4rem; font-weight:800; color:#fff; letter-spacing:-0.02em;">Login<span style="color:#eab308;">App</span></span>
                </div>
                <p style="color:#444; font-size:0.75rem; margin:0; letter-spacing:0.04em;">SISTEMA DE AUTENTICACIÓN</p>
            </div>

            <!-- Card -->
            <div style="background:#111; border:1px solid #222; border-radius:16px; padding:36px; box-shadow:0 0 40px rgba(234,179,8,0.08), 0 20px 60px rgba(0,0,0,0.5);">
                <!-- Yellow top accent -->
                <div style="height:3px; background:linear-gradient(90deg,#eab308,#f59e0b,transparent); border-radius:2px; margin-bottom:28px;"></div>
                {{ $slot }}
            </div>

            <p style="text-align:center; color:#2a2a2a; font-size:0.65rem; margin-top:20px; letter-spacing:0.06em;">
                © {{ date('Y') }} LOGINAPP — TODOS LOS DERECHOS RESERVADOS
            </p>
        </div>

    </body>
</html>