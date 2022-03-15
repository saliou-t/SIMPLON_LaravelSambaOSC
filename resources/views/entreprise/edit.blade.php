

<!DOCTYPE html>
 <html>
    <head>
        <title>Edition</title>
        <meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
             body{
                background-color: #1A202C;
                color: white
            }
        </style>
     </head>
     <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="background-color:#1A202C">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">OSC</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                        <a class="nav-link active" href="#">Entreprises
                            <span class="visually-hidden">(current)</span>
                        </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/entreprise/create">Ajouter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Ajouter Ete</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <h2>Formulaire d'edition d'entreprise</h2>
                <form action="{{ route('entreprise.update', ['id' => $entreprise->id])}}" method="POST">
                @csrf
                <div class="form-row mt-3">
                    <div class="col">
                        <input type="text" name="nom" class="form-control" value="{{$entreprise->nom}}" placeholder="Nom de l'enterprise">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="form-group">
                            <input type="text" name="siege" class="form-control" value="{{$entreprise->siege}}" placeholder="Siège">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <input type="text" name="registre" class="form-control" value="{{$entreprise->registre}}" placeholder="Registre">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <select id="selection" class="form-control" name="quartier_id">
                                <option value={{$entreprise->quartier_id}}>{{$entreprise->quartier->nom}}</option>
                                    @foreach ($quartiers as $quartier)
                                        @if ($quartier->id == $entreprise->quartier_id)
                                            @continue
                                        @endif
                                        <option value= {{ $quartier->id}}> {{ $quartier->nom }} </option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="form-group">
                            <input type="text" name="ninea" class="form-control" value="{{$entreprise->ninea}}" placeholder="Ninea">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <input type="tel" name="telephone" class="form-control" value="{{$entreprise->telephone}}" placeholder="Téléphone">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <input type="date" name="dateCreation" value="{{$entreprise->dateCreation}}" class="form-control" placeholder="Date de création">
                    </div>
                    <div class="col">
                        <input type="text" name="siteWeb" class="form-control" value="{{$entreprise->siteWeb }}" placeholder="Page Web">
                    </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox"  value="{{$entreprise->site }}" name="dispositifFormation" id="radio1" value="dispositif">
                                        <label class="form-check-label" for="radio1">Dispositif</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="cotisationSociale" id="radio2" value="option2">
                                        <label class="form-check-label" for="radio2">Cotisation</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="contrat" id="radio3" value="option2">
                                        <label class="form-check-label" for="radio3">Contrat formel</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="organigramme" id="radio4" value="option2">
                                        <label class="form-check-label" for="radio4">Organigramme</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="contrat" id="radio5" value="option2">
                                        <label class="form-check-label" for="radio5">Contrat</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <button class="btn btn-info " type="submit">Appliquer les modifications</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
