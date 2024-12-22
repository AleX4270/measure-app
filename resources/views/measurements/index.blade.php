@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="title-section col-12 mt-4">
                <h1>Pomiary</h1>
            </div>

            <div class="data-section col-12 mt-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Data dodania</th>
                            <th>Wartość</th>
                            <th>Jednostka</th>
                            <th>Kategoria pomiaru</th>
                            <th>Uwagi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($measurements as $measurement)
                            <tr>
                                <td>{{ $measurement->created_at->format('d.m.Y H:i:s') }}</td>
                                <td class="fw-bold">{{ $measurement->value }}</td>
                                <td>{{ $measurement->unit }}</td>
                                <td>{{ $measurement->category }}</td>
                                <td class="fst-italic"->{{ $measurement->remarks ?? '-'}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Brak danych do wczytania.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection