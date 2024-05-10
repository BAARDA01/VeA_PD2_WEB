@extends('layout')

@section('content')

    <h1>{{ $title }}</h1>

    @if (count($items) > 0)

        <table class="table table-sm table-hover table-striped">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Nosaukums</th>
                    <th>Autors</th>
                    <th>Gads</th>
                    <th>Cena</th>
                    <th>Attēlot</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>

            @foreach($items as $filma)
                <tr>
                    <td>{{ $filma->id }}</td>
                    <td>{{ $filma->name }}</td>
                    <td>{{ $filma->author->name }}</td>
                    <td>{{ $filma->year }}</td>
                    <td>&euro; {{ number_format($filma->price, 2, '.') }}</td>
                    <td>{!! $filma->display ? '&#x2714;' : '&#x274C;' !!}</td>
                    <td>
                        <a
                            href="/films/update/{{ $filma->id }}"
                            class="btn btn-outline-primary btn-sm"
                        >Labot</a> /
                        <form
                            method="post"
                            action="/films/delete/{{ $filma->id }}"
                            class="d-inline deletion-form"
                        >
                            @csrf
                            <button
                                type="submit"
                                class="btn btn-outline-danger btn-sm"
                            >Dzēst</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

    @else
        <p>Nav atrasts neviens ieraksts</p>
    @endif

    <a href="/films/create" class="btn btn-primary">Pievienot jaunu</a>

@endsection