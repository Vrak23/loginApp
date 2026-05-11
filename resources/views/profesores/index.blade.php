<x-app-layout>
    <x-slot name="header">
        <h2 class="academic-title">Profesores</h2>
    </x-slot>

    <style>
        .academic-wrap { max-width: 980px; margin: 0 auto; padding: 32px 16px; }
        .academic-panel { background: #111; border: 1px solid #222; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.35); }
        .academic-heading { padding: 22px 24px; border-bottom: 1px solid #222; display: flex; justify-content: space-between; gap: 16px; align-items: center; }
        .academic-title { font-size: 1.15rem; font-weight: 800; color: #eab308; margin: 0; }
        .academic-subtitle { color: #777; font-size: 0.74rem; margin: 6px 0 0; }
        .academic-count { border: 1px solid #333; color: #eab308; border-radius: 6px; padding: 8px 12px; font-size: 0.72rem; white-space: nowrap; }
        .table-scroll { overflow-x: auto; }
        .academic-table { width: 100%; border-collapse: collapse; min-width: 640px; }
        .academic-table th { background: #0a0a0a; color: #eab308; text-align: left; font-size: 0.68rem; text-transform: uppercase; letter-spacing: 0.06em; padding: 14px 16px; border-bottom: 1px solid #242424; }
        .academic-table td { color: #e5e5e5; font-size: 0.78rem; padding: 14px 16px; border-bottom: 1px solid #1f1f1f; vertical-align: top; }
        .academic-table tr:hover td { background: #151515; }
        .specialty { display: inline-block; border: 1px solid rgba(234,179,8,0.35); color: #eab308; border-radius: 6px; padding: 5px 10px; font-size: 0.7rem; }
        .empty-row { text-align: center; color: #777 !important; padding: 32px 16px !important; }
    </style>

    <div class="academic-wrap">
        <section class="academic-panel">
            <div class="academic-heading">
                <div>
                    <h3 class="academic-title">Plana docente</h3>
                    <p class="academic-subtitle">Listado de profesores y especialidades registradas.</p>
                </div>
                <span class="academic-count">{{ $profesores->count() }} registros</span>
            </div>

            <div class="table-scroll">
                <table class="academic-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Apellidos</th>
                            <th>Nombres</th>
                            <th>Especialidad</th>
                            <th>Registro</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($profesores as $profesor)
                            <tr>
                                <td>{{ $profesor->id_profesor }}</td>
                                <td>{{ $profesor->apellidos }}</td>
                                <td>{{ $profesor->nombre }}</td>
                                <td><span class="specialty">{{ $profesor->especialidad }}</span></td>
                                <td>{{ $profesor->created_at ? $profesor->created_at->format('d/m/Y') : 'Sin fecha' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty-row">No hay profesores registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</x-app-layout>
