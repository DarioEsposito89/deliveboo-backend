@extends("layouts.app")

@section("content")
    <div class="container">
        <h1 class="mt-5 mb-3 gold-text">Piatti</h1>
        <p class="text-white">In questa sezione puoi vedere tutto il tuo menu. Se vuoi aggiungere nuovi piatti clicca sul pulsante AGGIUNGI.</p>

        <button type="button" class="btn my-button btn-aggiungi mb-3"><a href="{{ route('admin.plates.create') }}">Aggiungi</a></button>

        <div class="row">
            @foreach ($plates as $plate)
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card login-body p-3">
                        <div class="card-head login-head gold-text text-center p-2">
                            <h3>{{ $plate->plate_name }}</h3>
                        </div>
                        <img class="img-fluid" src="{{ asset('storage/' . $plate->plate_image) }}" alt="">
                        <div class="text-white mt-2 ms-3">
                            <p>{{ $plate->price }} € </p>
                            <p>{{ $plate->ingredients }}</p>
                            <p>{{ $plate->description }}</p>
                        </div>
                        <div class="d-flex gap-3 justify-content-center">
                            <div>
                                <button type="button" class="btn my-button-small btn-aggiungi mb-3"><a href="{{ route('admin.plates.edit', $plate->id) }}">Modifica</a></button>
                            </div>
                            <form action="{{ route('admin.plates.destroy', $plate->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn my-button-secondary-small">Elimina</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

