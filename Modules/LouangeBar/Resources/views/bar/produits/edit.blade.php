@extends('louangebar::layouts.applouange')

@section('titre')
    Bar
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Editer un serice</h3>
                </div>

                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('produits.update', $produit) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <div class="form-group">
                            <label for="type_service">Nom produit</label>
                            <input type="text" class="form-control" name="nom"
                                value="{{ old('nom', $produit->nom) }}">
                            @error('nom')
                                <div class="text-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="prix">Prix</label>
                            <input type="number" class="form-control" name="prix"
                                value="{{ old('prix', $produit->prix) }}">
                            @error('prix')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="type_service">Image produit</label>
                            <input type="file" class="form-control" name="image" value="{{ old('image') }}">
                            @error('image')
                                <div class="text-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="type">Type produit</label>
                            <select class="form-control" name="type">
                                <option value="boisson" {{ old('type', $produit->type) === 'boisson' ? 'selected' : '' }}>
                                    Boisson</option>
                                <option value="nourriture"
                                    {{ old('type', $produit->type) === 'nourriture' ? 'selected' : '' }}>Nourriture</option>
                            </select>
                            @error('type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="card-footer">
                        <a class="btn btn-danger " href="#">Annuler</a>
                        <button type="submit" class="btn btn-info float-right">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
