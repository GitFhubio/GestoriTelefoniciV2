@php
if (isset($edit) && !empty($edit)) {
    //edit
    $method = 'PUT';
    $url = route('offers.update', compact('offer'));
    $title = 'Modifica la tua offerta';
} else {
    //create
    $method = 'POST';
    $url = route('offers.store');
    $title = 'Crea la tua offerta';
}
@endphp
@section('content')
    <div class="crud-title">
        <h1 class="section-title text-center">{{ $title }}</h1>
    </div>
    <div class="container crud-form" style="padding-top: 25px; padding-bottom: 25px;">
        <form id="validateForm" action="{{ $url }}" method="post">
            @csrf
            @method($method)
            <div class="form-group">
                <label for="name">Nome</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                    value="{{ isset($offer) ? $offer->name : '' }}">
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
            </div>
            <div class="form-group">
                <label for="brand">Costo mensile (€)</label>
                <input class="form-control {{ $errors->has('costo_mensile') ? 'is-invalid' : '' }}" type="number"
                    name="costo_mensile" value="{{ isset($offer) ? $offer->costo_mensile : '' }}">
                <div class="invalid-feedback">
                    {{ $errors->first('costo_mensile') }}
                </div>
            </div>
            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea class="form-control {{ $errors->has('descrizione') ? 'is-invalid' : '' }}" type="text"
                    name="descrizione"> {{ isset($offer) ? $offer->descrizione : '' }}</textarea>
                <div class="invalid-feedback">
                    {{ $errors->first('descrizione') }}
                </div>
            </div>
            <div class="form-group">
                <label for="data_inizio">Data inizio
                    {{ isset($offer) ? 'attuale: ' : '' }}{{ isset($offer) ? $offer->data_inizio : '' }} </label>
                <input class="form-control {{ $errors->has('data_inizio') ? 'is-invalid' : '' }}" type="date"
                    name="data_inizio">
                <div class="invalid-feedback">
                    {{ $errors->first('data_inizio') }}
                </div>
            </div>
            <div class="form-group">
                <label for="data_fine">Data fine
                    {{ isset($offer) ? 'attuale: ' : '' }}{{ isset($offer) ? $offer->data_fine : '' }}</label>
                <input class="form-control {{ $errors->has('data_fine') ? 'is-invalid' : '' }}" type="date"
                    name="data_fine">
                <div class="invalid-feedback">
                    {{ $errors->first('data_fine') }}
                </div>
            </div>
            <div class="form-group d-flex flex-column">
                <label for="categories[]">Categorie</label>
                <select name="categories[]" multiple>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ isset($offer) && count($offer->categories->where('id', $category->id)) > 0 ? 'selected' : '' }}>
                            {{ $category->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-between form-buttons">
                <a href="{{ route('offers.index') }}" class="btn btn-dark btn-bg-black" role="button"
                    aria-pressed="true">Torna alla lista offerte</a>
                <input class="btn my-btn-bg" type="submit" name="" value="Invia">
            </div>
        </form>
    </div>
