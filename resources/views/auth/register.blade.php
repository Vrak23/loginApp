<x-guest-layout>
    <!-- Title -->
    <h2 style="font-size:1.5rem; font-weight:800; color:#fff; margin:0 0 4px 0; letter-spacing:-0.02em;">Crear Cuenta</h2>
    <p style="font-size:0.75rem; color:#555; margin:0 0 28px 0;">Completa el formulario para registrarte</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div style="margin-bottom:16px;">
            <label for="name" style="display:block; font-size:0.7rem; font-weight:600; color:#eab308; text-transform:uppercase; letter-spacing:0.08em; margin-bottom:8px;">Nombre</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                style="width:100%; background:#0d0d0d; border:1px solid #2a2a2a; color:#f5f5f5; border-radius:8px; padding:12px 16px; font-size:0.9rem; outline:none; box-sizing:border-box;"
                onfocus="this.style.borderColor='#eab308'; this.style.boxShadow='0 0 0 3px rgba(234,179,8,0.15)'"
                onblur="this.style.borderColor='#2a2a2a'; this.style.boxShadow='none'">
            <x-input-error :messages="$errors->get('name')" class="mt-1" style="color:#f87171; font-size:0.72rem;" />
        </div>

        <!-- Email -->
        <div style="margin-bottom:16px;">
            <label for="email" style="display:block; font-size:0.7rem; font-weight:600; color:#eab308; text-transform:uppercase; letter-spacing:0.08em; margin-bottom:8px;">Correo electrónico</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                style="width:100%; background:#0d0d0d; border:1px solid #2a2a2a; color:#f5f5f5; border-radius:8px; padding:12px 16px; font-size:0.9rem; outline:none; box-sizing:border-box;"
                onfocus="this.style.borderColor='#eab308'; this.style.boxShadow='0 0 0 3px rgba(234,179,8,0.15)'"
                onblur="this.style.borderColor='#2a2a2a'; this.style.boxShadow='none'">
            <x-input-error :messages="$errors->get('email')" class="mt-1" style="color:#f87171; font-size:0.72rem;" />
        </div>

        <!-- Password -->
        <div style="margin-bottom:16px;">
            <label for="password" style="display:block; font-size:0.7rem; font-weight:600; color:#eab308; text-transform:uppercase; letter-spacing:0.08em; margin-bottom:8px;">Contraseña</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                style="width:100%; background:#0d0d0d; border:1px solid #2a2a2a; color:#f5f5f5; border-radius:8px; padding:12px 16px; font-size:0.9rem; outline:none; box-sizing:border-box;"
                onfocus="this.style.borderColor='#eab308'; this.style.boxShadow='0 0 0 3px rgba(234,179,8,0.15)'"
                onblur="this.style.borderColor='#2a2a2a'; this.style.boxShadow='none'">
            <x-input-error :messages="$errors->get('password')" class="mt-1" style="color:#f87171; font-size:0.72rem;" />
        </div>

        <!-- Confirm Password -->
        <div style="margin-bottom:28px;">
            <label for="password_confirmation" style="display:block; font-size:0.7rem; font-weight:600; color:#eab308; text-transform:uppercase; letter-spacing:0.08em; margin-bottom:8px;">Confirmar Contraseña</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                style="width:100%; background:#0d0d0d; border:1px solid #2a2a2a; color:#f5f5f5; border-radius:8px; padding:12px 16px; font-size:0.9rem; outline:none; box-sizing:border-box;"
                onfocus="this.style.borderColor='#eab308'; this.style.boxShadow='0 0 0 3px rgba(234,179,8,0.15)'"
                onblur="this.style.borderColor='#2a2a2a'; this.style.boxShadow='none'">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" style="color:#f87171; font-size:0.72rem;" />
        </div>

        <!-- Actions -->
        <div style="display:flex; align-items:center; justify-content:space-between; gap:12px;">
            <a href="{{ route('login') }}" style="font-size:0.72rem; color:#555; text-decoration:none;"
               onmouseover="this.style.color='#eab308'" onmouseout="this.style.color='#555'">
                ¿Ya tienes cuenta?
            </a>
            <button type="submit"
                style="background:#eab308; color:#000; font-weight:800; font-size:0.85rem; letter-spacing:0.06em; text-transform:uppercase; padding:12px 28px; border-radius:8px; border:none; cursor:pointer; transition:background 0.2s;"
                onmouseover="this.style.background='#ca8a04'; this.style.transform='translateY(-1px)'"
                onmouseout="this.style.background='#eab308'; this.style.transform='translateY(0)'">
                Registrarse →
            </button>
        </div>
    </form>
</x-guest-layout>