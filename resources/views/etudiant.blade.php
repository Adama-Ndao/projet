<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
    <div style="background:lime; border-radius:10px;padding:5px">
        <h1 style="font-size:50px; color:black">Liste des etudiants</h1>
    </div>
    <br>
        <a style="border:1px solid; background:lime; border-radius:10px; padding:10px;
            font-size:20px;marging-bottom:10px; color:black" href="{{ route('ajout') }}">
            Ajouter un etudiant
        </a>
        <br>
        <br>
        <table>
            <tr style="background-color:lime; color:black; font-size:20px;padding:5px">
                <td>ID</td>
                <td>Prenom</td>
                <td>Nom</td>
                <td>Matiere</td>
                <td>Note</td>
                <td>Examen</td>
                <td>Semestre</td>
                

            @if ($etudiants->count() > 0)
                        @foreach ($etudiants as $etudiant) 
                            <tr>
                            <td>{{ $etudiant->id }}</td>
                                <td>{{ $etudiant->prenom }}</td>
                                <td> {{$etudiant->nom }} </td>
                            
                             @foreach ($etudiant->matieres as $m)
                                <td> {{$m->nom }} </td>
                                <td> {{$m->pivot->note }} </td>
                                <td> {{$m->pivot->examen }} </td>
                             @endforeach 
                             @foreach ($etudiant->semestres as $c)
                                 <td> {{$c->nom }} </td>
                             @endforeach
                            </tr>
                         @endforeach
                @else 
                        <span>Aucun etudiant  dans la base</span>
            @endif 
            <br>
           
        </table>
        <br>
        <span hidden>{{$moy = 0}}</span>
        @foreach ($etudiants as $m)
            @foreach($m->matieres as $mat)
            <span hidden>{{$moy += $mat->pivot->note + $mat->pivot->examen }}</span>   
            @endforeach
        @endforeach
        <h1>La moyenne General de la classe est : {{$moy /  $etudiant->count()}}</h1>
        </h1>
    </center>
</body>
</html>