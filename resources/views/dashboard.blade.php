<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size:1.1rem; font-weight:800; color:#eab308; letter-spacing:-0.01em;">
            Dashboard
        </h2>
    </x-slot>

    <div style="padding:32px 16px; max-width:900px; margin:0 auto;">

        <!-- Welcome -->
        <div style="background:#111; border:1px solid #222; border-radius:14px; padding:32px; margin-bottom:24px; box-shadow:0 0 30px rgba(234,179,8,0.06);">
            <div style="height:3px; background:linear-gradient(90deg,#eab308,#f59e0b,transparent); border-radius:2px; margin-bottom:20px; width:60px;"></div>
            <h3 style="font-size:1.4rem; font-weight:800; color:#fff; margin:0 0 8px 0;">
                Bienvenido, <span style="color:#eab308;">{{ Auth::user()->name }}</span> 👋
            </h3>
            <p style="font-size:0.78rem; color:#555; margin:0;">
                Has iniciado sesión correctamente. Este es tu panel de control.
            </p>
        </div>

        <!-- Stats Grid -->
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px,1fr)); gap:16px;">

            <div style="background:#111; border:1px solid #222; border-radius:12px; padding:24px; text-align:center;">
                <div style="font-size:0.65rem; color:#eab308; text-transform:uppercase; letter-spacing:0.1em; margin-bottom:10px;">Estado</div>
                <div style="font-size:1.4rem; font-weight:800; color:#fff;">Activo</div>
                <div style="width:8px; height:8px; background:#22c55e; border-radius:50%; margin:8px auto 0;"></div>
            </div>

            <div style="background:#111; border:1px solid #222; border-radius:12px; padding:24px; text-align:center;">
                <div style="font-size:0.65rem; color:#eab308; text-transform:uppercase; letter-spacing:0.1em; margin-bottom:10px;">Correo</div>
                <div style="font-size:0.8rem; font-weight:700; color:#fff; word-break:break-all;">{{ Auth::user()->email }}</div>
            </div>

            <div style="background:#111; border:1px solid #222; border-radius:12px; padding:24px; text-align:center;">
                <div style="font-size:0.65rem; color:#eab308; text-transform:uppercase; letter-spacing:0.1em; margin-bottom:10px;">Miembro desde</div>
                <div style="font-size:1.1rem; font-weight:800; color:#fff;">{{ Auth::user()->created_at->format('d/m/Y') }}</div>
            </div>

        </div>

        <!-- Logout -->
        <div style="margin-top:24px; text-align:right;">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    style="background:transparent; border:1px solid #333; color:#666; font-size:0.75rem; padding:8px 20px; border-radius:6px; cursor:pointer; transition:all 0.2s;"
                    onmouseover="this.style.borderColor='#eab308'; this.style.color='#eab308'"
                    onmouseout="this.style.borderColor='#333'; this.style.color='#666'">
                    Cerrar sesión →
                </button>
            </form>
        </div>

    </div>
</x-app-layout>