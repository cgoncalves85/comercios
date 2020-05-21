@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Listado de Tiendas') }}</div>

                <div class="card-body" style="padding-top: 40px">
                	<div class="col-md-12">
                		<div align="right">
                			<a href="{{ route('create') }}" class="btn btn-primary">Agregar Tienda</a>
                		</div>
                	</div>

                	<div class="col-md-12" style="margin-top: 30px">
                		<table class="table table-bordered">
                			<thead>
                				<tr align="center">
	                				<th>N°</th>
	                				<th>Nombre de la Tienda</th>
	                				<th>Dirección</th>
	                				<th>N° de Teléfono</th>                				
	                				<th>Email</th>
	                			</tr>
                			</thead>
                			<tbody>
                				@php $i = 1; @endphp
                				@foreach($locales as $local)
                				<tr>
	                				<td align="center">{{ $i }}</td>
	                				<td>{{ $local->name }}</td>
	                				<td>{{ $local->adress }}</td>
	                				<td>{{ $local->phone }}</td> 
	                				<td>{{ $local->email }}</td>
	                			</tr> 
	                			@php $i++; @endphp
	                			@endforeach              				
                			</tbody>                			
                		</table>
                	</div>

				</div>
			</div>
		</div>
	</div>
</div>

@endsection