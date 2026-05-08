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
        O continúa con
    </span>
</div>

<div style="display:flex; flex-direction:column; gap:12px; margin-bottom:32px;">

    <a href="{{ route('login.google') }}" 
       style="width:100%; display:flex; align-items:center; justify-content:center; gap:10px; background:#121212; border:1px solid #2a2a2a; color:#f5f5f5; border-radius:8px; padding:11px; text-decoration:none; font-size:0.85rem; font-weight:600; transition:border-color 0.2s, background 0.2s; box-sizing:border-box;"
       onmouseover="this.style.borderColor='#eab308'; this.style.background='#1a1a1a'"
       onmouseout="this.style.borderColor='#2a2a2a'; this.style.background='#121212'">

        <img src="https://www.gstatic.com/images/branding/product/1x/gsa_512dp.png"
             alt="Google"
             width="18"
             height="18">

        Entrar con Google
    </a>

    <a href="{{ route('login.github') }}" 
       style="width:100%; display:flex; align-items:center; justify-content:center; gap:10px; background:#121212; border:1px solid #2a2a2a; color:#f5f5f5; border-radius:8px; padding:11px; text-decoration:none; font-size:0.85rem; font-weight:600; transition:border-color 0.2s, background 0.2s; box-sizing:border-box;"
       onmouseover="this.style.borderColor='#eab308'; this.style.background='#1a1a1a'"
       onmouseout="this.style.borderColor='#2a2a2a'; this.style.background='#121212'">

        <svg height="18" width="18" viewBox="0 0 16 16" fill="white">
            <path d="M8 0C3.58 0 0 3.58 0 8a8 8 0 005.47 7.59c.4.07.55-.17.55-.38
            0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13
            -.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07
            -1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12
            0 0 .67-.21 2.2.82a7.56 7.56 0 012-.27c.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82
            .44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95
            .29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0016 8
            c0-4.42-3.58-8-8-8z"/>
        </svg>

        Entrar con GitHub
    </a>

    <a href="{{ route('login.facebook') }}" 
       style="width:100%; display:flex; align-items:center; justify-content:center; gap:10px; background:#121212; border:1px solid #2a2a2a; color:#f5f5f5; border-radius:8px; padding:11px; text-decoration:none; font-size:0.85rem; font-weight:600; transition:border-color 0.2s, background 0.2s; box-sizing:border-box;"
       onmouseover="this.style.borderColor='#eab308'; this.style.background='#1a1a1a'"
       onmouseout="this.style.borderColor='#2a2a2a'; this.style.background='#121212'">

        <svg height="18" width="18" viewBox="0 0 24 24" fill="#1877F2">
            <path d="M24 12.073C24 5.405 18.627 0 12 0S0 5.405 0 12.073c0 6.019
            4.388 11.009 10.125 11.927v-8.437H7.078v-3.49h3.047V9.413
            c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953h-1.514
            c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.49h-2.796V24
            C19.612 23.082 24 18.092 24 12.073z"/>
        </svg>

        Entrar con Facebook
    </a>

</div>
</x-guest-layout>