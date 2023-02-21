
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>XML SIMPLE</title>
  </head>
  <body>
    
    <div class="container">
        

       
        <h1>Total de Nota de Credito : {{ $SetDTE->DTE->COUNT() }}</h1>  <hr>

        @foreach ($SetDTE as $dte)
        <div class="border border-secondary mb-3 p-3">
        <strong>Id : {{$dte->Documento['ID']}}</strong> <br>
        <strong>Fecha :  {{$dte->Documento->Encabezado->IdDoc->FchEmis}}</strong> <br>
        <h4 class="mt-2">Ciente</h4>
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <th scope="col">Rut</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Giro</th>
                    <th scope="col">Direccion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dte->Documento->Encabezado as $enc)
                    <tr>
                        <td scope="row">{{$enc->Receptor->RUTRecep}}</td>
                        <td>{{$enc->Receptor->RznSocRecep}}</td>
                        <td>{{$enc->Receptor->GiroRecep}}</td>
                        <td>{{$enc->Receptor->DirRecep}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <h4>Documento </h4>
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <th scope="col">TipoDTE</th>
                    <th scope="col">Folio</th>
                    <th scope="col">MntNeto</th>
                    <th scope="col">TasaIVA</th>
                    <th scope="col">IVA</th>
                    <th scope="col">MntTotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dte->Documento->Encabezado as $enc)
                    <tr>
                        <td scope="row">{{$enc->IdDoc->TipoDTE}}</td>
                        <td class="table-warning">{{$enc->IdDoc->Folio}}</td>
                        <td>{{$enc->Totales->MntNeto}}</td>
                        <td>{{$enc->Totales->TasaIVA}}</td>
                        <td>{{$enc->Totales->IVA}}</td>
                        <td>{{$enc->Totales->MntTotal}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        

        <h4>Detalle</h4>
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Monto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dte->Documento->Detalle as $doc)
                    <tr>
                        <td scope="row">{{$doc->NroLinDet}}</td>
                        <td>{{str_replace('-', '', $doc->CdgItem->TpoCodigo) . '-' .  $doc->CdgItem->VlrCodigo}}</td>
                        <td>{{$doc->NmbItem}}</td>
                        <td>{{$doc->QtyItem}}</td>
                        <td>{{$doc->PrcItem}}</td>
                        <td>{{$doc->MontoItem}}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <h4>Referencia</h4>
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Folio</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Razon</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dte->Documento->Referencia as $doc)
                    <tr>
                        <td scope="row">{{$doc->NroLinRef}}</td>
                        <td>{{$doc->TpoDocRef}}</td>
                        <td>{{$doc->FolioRef}}</td>
                        <td>{{$doc->FchRef}}</td>
                        <td>{{$doc->RazonRef}}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        </div>
        @endforeach

    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>