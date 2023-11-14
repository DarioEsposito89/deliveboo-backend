@extends('layouts.app')

@section("content")

<div class="container gold-text">
    <h1 class="py-3">Aggiungi un nuovo piatto al tuo menu!</h1>

    <form id="create-plate" action="{{ route('admin.plates.store') }}" method="POST" enctype="multipart/form-data" id="form">
        @csrf()

        <div class="alert alert-danger d-none" id="error">
            <p id="error-message"></p>
        </div>

        {{-- name --}}
        <div class="mb-3">
            <label class="form-label">Nome Piatto*</label>
            <input id="plate_name" type="text" class="form-control" name="plate_name" value="{{ old('plate_name') }}">
            @error('plate_name')
                <div class="alert mt-2 alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- image --}}
        <div class="mb-3">
            <label class="form-label">Immagine*</label>
            <input type="file" accept="image/*" class="form-control @error('plate_image') is-invalid @enderror" name="plate_image">
            @error('plate_image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- ingredients --}}
        <div class="mb-3">
            <label class="form-label">Ingredienti*</label>
            <input id="ingredients" type="text" class="form-control @error('ingredients') is-invalid @enderror" name="ingredients" value="{{ old('ingredients') }}">
            @error('ingredients')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- price --}}
        <div class="mb-3">
            <label class="form-label">Prezzo*</label>
            <input id="price" type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const priceInput = document.getElementById("price");

                priceInput.addEventListener("keydown", function (event) {
                    // Prevent entering negative values
                    if (event.key === "-" || event.key === "e") {
                        event.preventDefault();
                    }
                });

                priceInput.addEventListener("input", function () {
                    // Prevent negative values in the price field
                    if (parseFloat(this.value) < 0) {
                        this.value = 0;
                    }
                });
            });
        </script>

        {{-- description --}}
        <div class="mb-3">
            <label class="form-label @error('description') is-invalid @enderror">Descrizione*</label>
            <textarea id="description" class="form-control" name="description">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- visibility --}}
        <div class="mb-3">
            <label class="form-label">Visibilità:</label>
            <div class="form-check">
                <input class="form-check-input" value="1" type="radio" name="visibility" id="flexRadioDefault1">
                <label class="form-check-label" for="visibility1">Si</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" value="0" type="radio" name="visibility" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="visibility2">No</label>
            </div>
        </div>

        <div class="mb-3">
            <a class="btn my-button-secondary" href="{{ route("admin.plates.index") }}">Annulla</a>
            <button id="btn-submit-plate-create" class="btn my-button signin">Crea</button>
        </div>
    </form>
</div>

@endsection




