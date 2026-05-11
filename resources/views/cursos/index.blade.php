<x-app-layout>
    <x-slot name="header">
        <h2 class="academic-title">Cursos</h2>
    </x-slot>

    <style>
        .academic-wrap { max-width: 1080px; margin: 0 auto; padding: 32px 16px; }
        .academic-panel { background: #111; border: 1px solid #222; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.35); }
        .academic-heading { padding: 22px 24px; border-bottom: 1px solid #222; display: flex; justify-content: space-between; gap: 16px; align-items: center; }
        .academic-title { font-size: 1.15rem; font-weight: 800; color: #eab308; margin: 0; }
        .academic-subtitle { color: #777; font-size: 0.74rem; margin: 6px 0 0; }
        .academic-count { border: 1px solid #333; color: #eab308; border-radius: 6px; padding: 8px 12px; font-size: 0.72rem; white-space: nowrap; }
        .table-scroll { overflow-x: auto; }
        .academic-table { width: 100%; border-collapse: collapse; min-width: 760px; }
        .academic-table th { background: #0a0a0a; color: #eab308; text-align: left; font-size: 0.68rem; text-transform: uppercase; letter-spacing: 0.06em; padding: 14px 16px; border-bottom: 1px solid #242424; }
        .academic-table td { color: #e5e5e5; font-size: 0.78rem; padding: 14px 16px; border-bottom: 1px solid #1f1f1f; vertical-align: top; }
        .academic-table tr:hover td { background: #151515; }
        .code-badge { display: inline-block; color: #0a0a0a; background: #eab308; border-radius: 6px; padding: 4px 8px; font-size: 0.68rem; font-weight: 800; }
        .credits { color: #f5f5f5; font-weight: 800; }
        .muted { color: #888; line-height: 1.55; }
        .empty-row { text-align: center; color: #777 !important; padding: 32px 16px !important; }
    </style>

    <div class="academic-wrap">
        <section class="academic-panel">
            <div class="academic-heading">
                <div>
                    <h3 class="academic-title">Catalogo de cursos</h3>
                    <p class="academic-subtitle">Cursos disponibles para la gestion academica del ciclo.</p>
                </div>
                <span class="academic-count">{{ $cursos->count() }} registros</span>
            </div>

            <div class="table-scroll">
                <table class="academic-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Codigo</th>
                            <th>Curso</th>
                            <th>Creditos</th>
                            <th>Descripcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cursos as $curso)
                            <tr>
                                <td>{{ $curso->id_curso }}</td>
                                <td><span class="code-badge">{{ $curso->codigo_curso }}</span></td>
                                <td>{{ $curso->nombre_curso }}</td>
                                <td><span class="credits">{{ $curso->creditos }}</span></td>
                                <td class="muted">{{ $curso->descripcion ?? 'Sin descripcion registrada.' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty-row">No hay cursos registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</x-app-layout>
