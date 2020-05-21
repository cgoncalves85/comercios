@extends('layouts.app')

@section('content')
  <div class="row">
    <?php //echo "<pre>"; var_dump($ImgLocales[0]->images); echo "</pre>"; die(); ?>

    @for ($i=0; $i < $cantL ; $i++) 
      <div class="col-md-12">
        <div class="card" style="margin-bottom: 20px">
          <div class="card-body" style="padding: 15px">
            <div class="row">
              <div class="col-md-6 txt">
                <div class="texto-name">
                  <strong>{{ $ImgLocales[$i]->name }}</strong>
                </div>
                <br>
                <b>Dirección : </b>
                <div class="texto-adress">{{ $ImgLocales[$i]->adress }}</div>
                <div class="texto-phone"><b>Teléfono : </b>{{ $ImgLocales[$i]->phone }}</div>
                <div class="texto-email"><b>Email : </b>{{ $ImgLocales[$i]->email }}</div>
              </div>
              <div class="col-md-6" style="padding: 15px">
                <div class="row">
                  @for ($j=0; $j < 3 ; $j++)
                  <div class="col-md-4">
                    <img class="img-thumbnail" src="{{ asset('files/'.$ImgLocales[$i]->images[$j]->route) }}"> 
                  </div> 
                  @endfor
                </div>
              </div>      
            </div>
          </div>
        </div>
      </div>
    @endfor
  </div>  
@endsection
