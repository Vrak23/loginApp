<x-app-layout>
    <x-slot name="header">
        <h2 class="academic-title">Alumnos</h2>
    </x-slot>

    <style>
        .academic-wrap { max-width: 1180px; margin: 0 auto; padding: 32px 16px; }
        .academic-panel { background: #111; border: 1px solid #222; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.35); }
        .academic-heading { padding: 22px 24px; border-bottom: 1px solid #222; display: flex; justify-content: space-between; gap: 16px; align-items: center; }
        .academic-title { font-size: 1.15rem; font-weight: 800; color: #eab308; margin: 0; }
        .academic-subtitle { color: #777; font-size: 0.74rem; margin: 6px 0 0; }
        .academic-count { border: 1px solid #333; color: #eab308; border-radius: 6px; padding: 8px 12px; font-size: 0.72rem; white-space: nowrap; }
        .table-scroll { overflow-x: auto; }
        .academic-table { width: 100%; border-collapse: collapse; min-width: 920px; }
        .academic-table th { background: #0a0a0a; color: #eab308; text-align: left; font-size: 0.68rem; text-transform: uppercase; letter-spacing: 0.06em; padding: 14px 16px; border-bottom: 1px solid #242424; }
        .academic-table td { color: #e5e5e5; font-size: 0.78rem; padding: 14px 16px; border-bottom: 1px solid #1f1f1f; vertical-align: top; }
        .academic-table tr:hover td { background: #151515; }
        .status-pill { display: inline-block; border-radius: 999px; padding: 4px 10px; font-size: 0.68rem; font-weight: 700; }
        .status-active { background: rgba(34,197,94,0.14); color: #4ade80; border: 1px solid rgba(34,197,94,0.35); }
        .status-muted { background: rgba(148,163,184,0.12); color: #94a3b8; border: 1px solid rgba(148,163,184,0.25); }
        .empty-row { text-align: center; color: #777 !important; padding: 32px 16px !important; }
    </style>

    <div class="academic-wrap">
        <section class="academic-panel">
            <div class="academic-heading">
                <div>
                    <h3 class="academic-title">Registro de alumnos</h3>
                    <p class="academic-subtitle">Listado general de estudiantes registrados en el sistema academico.</p>
                </div>
                <span class="academic-count">{{ $alumnos->count() }} registros</span>
            </div>

            <div class="table-scroll">
                <table class="academic-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Apellidos y nombres</th>
                            <th>DNI</th>
                            <th>Fecha nac.</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Direccion</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($alumnos as $alumno)
                            <tr>
                                <td>{{ $alumno->id_alumno }}</td>
                                <td>{{ $alumno->apellidos }}, {{ $alumno->nombre }}</td>
                                <td>{{ $alumno->dni }}</td>
                                <td>{{ \Illuminate\Support\Carbon::parse($alumno->fecha_nacimiento)->format('d/m/Y') }}</td>
                                <td>{{ $alumno->telefono }}</td>
                                <td>{{ $alumno->email }}</td>
                                <td>{{ $alumno->direccion }}</td>
                                <td>
                                    <span class="status-pill {{ $alumno->estado_matricula === 'matriculado' ? 'status-active' : 'status-muted' }}">
                                        {{ ucfirst($alumno->estado_matricula) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="empty-row">No hay alumnos registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</x-app-layout>
