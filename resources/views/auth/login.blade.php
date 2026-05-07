<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h2 style="font-size:1.5rem; font-weight:800; color:#fff; margin:0 0 4px 0; letter-spacing:-0.02em;">Iniciar Sesión</h2>
    <p style="font-size:0.75rem; color:#555; margin:0 0 28px 0;">Ingresa tus credenciales para continuar</p>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div style="margin-bottom:18px;">
            <label for="email" style="display:block; font-size:0.7rem; font-weight:600; color:#eab308; text-transform:uppercase; letter-spacing:0.08em; margin-bottom:8px;">
                Correo electrónico
            </label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                style="width:100%; background:#0d0d0d; border:1px solid #2a2a2a; color:#f5f5f5; border-radius:8px; padding:12px 16px; font-size:0.9rem; outline:none; transition:border-color 0.2s, box-shadow 0.2s; box-sizing:border-box;"
                onfocus="this.style.borderColor='#eab308'; this.style.boxShadow='0 0 0 3px rgba(234,179,8,0.15)'"
                onblur="this.style.borderColor='#2a2a2a'; this.style.boxShadow='none'">
            <x-input-error :messages="$errors->get('email')" class="mt-2" style="color:#f87171; font-size:0.72rem;" />
        </div>

        <div style="margin-bottom:20px;">
            <label for="password" style="display:block; font-size:0.7rem; font-weight:600; color:#eab308; text-transform:uppercase; letter-spacing:0.08em; margin-bottom:8px;">
                Contraseña
            </label>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                style="width:100%; background:#0d0d0d; border:1px solid #2a2a2a; color:#f5f5f5; border-radius:8px; padding:12px 16px; font-size:0.9rem; outline:none; transition:border-color 0.2s, box-shadow 0.2s; box-sizing:border-box;"
                onfocus="this.style.borderColor='#eab308'; this.style.boxShadow='0 0 0 3px rgba(234,179,8,0.15)'"
                onblur="this.style.borderColor='#2a2a2a'; this.style.boxShadow='none'">
            <x-input-error :messages="$errors->get('password')" class="mt-2" style="color:#f87171; font-size:0.72rem;" />
        </div>

        <div style="display:flex; align-items:center; justify-content:space-between; gap:12px; margin-bottom:28px;">
            <div style="display:flex; align-items:center; gap:8px;">
                <input id="remember_me" type="checkbox" name="remember" style="accent-color:#eab308; width:15px; height:15px; cursor:pointer;">
                <label for="remember_me" style="font-size:0.78rem; color:#666; cursor:pointer;">Recordarme</label>
            </div>
            
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" style="font-size:0.72rem; color:#555; text-decoration:none; transition:color 0.2s;"
                   onmouseover="this.style.color='#eab308'" onmouseout="this.style.color='#555'">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif
        </div>

        <div style="margin-bottom:24px;">
            <button type="submit"
                style="width:100%; background:#eab308; color:#000; font-weight:800; font-size:0.85rem; letter-spacing:0.06em; text-transform:uppercase; padding:12px; border-radius:8px; border:none; cursor:pointer; transition:background 0.2s, transform 0.1s;"
                onmouseover="this.style.background='#ca8a04'; this.style.transform='translateY(-1px)'"
                onmouseout="this.style.background='#eab308'; this.style.transform='translateY(0)'">
                Entrar →
            </button>
        </div>
    </form>

    <div style="margin-top:24px; text-align:center; position:relative; margin-bottom:20px;">
        <div style="position:absolute; top:50%; left:0; width:100%; height:1px; background:#1a1a1a; z-index:1;"></div>
        <span style="font-size:0.75rem; color:#555; background:#111; padding:0 12px; font-weight:500; position:relative; z-index:2;">
            O entra con Google
        </span>
    </div>

    <div style="margin-bottom:32px;">
        <a href="{{ route('login.google') }}" 
           style="width:100%; display:flex; align-items:center; justify-content:center; gap:10px; background:#121212; border:1px solid #2a2a2a; color:#f5f5f5; border-radius:8px; padding:11px; text-decoration:none; font-size:0.85rem; font-weight:600; transition:border-color 0.2s, background 0.2s; box-sizing:border-box;"
           onmouseover="this.style.borderColor='#eab308'; this.style.background='#1a1a1a'"
           onmouseout="this.style.borderColor='#2a2a2a'; this.style.background='#121212'">
            <img src="https://www.gstatic.com/images/branding/product/1x/gsa_512dp.png" alt="Google" width="18px" height="18px">
            Entrar con Google
        </a>
    </div>

    <div style="padding-top:24px; border-top:1px solid #1a1a1a; text-align:center;">
        <span style="font-size:0.75rem; color:#444;">¿No tienes cuenta? </span>
        <a href="{{ route('register') }}" style="font-size:0.75rem; color:#eab308; text-decoration:none; font-weight:600;"
           onmouseover="this.style.color='#f59e0b'" onmouseout="this.style.color='#eab308'">
            Regístrate aquí
        </a>
    </div>
</x-guest-layout>