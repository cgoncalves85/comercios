@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Agregar Tienda') }}</div>

                <div class="card-body" style="padding: 40px 30px">
					<form action="{{ route('store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">         

						{{ csrf_field() }}   
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<strong>Nombre de Tienda</strong>
										<input type="text" name="name" maxlength="100" class="form-control" autocomplete="off" required autofocus>
										<span class="text-danger">{{ $errors->first('name') }}</span>
									</div>	
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<strong>Dirección de la Tienda</strong>
										<textarea name="adress" class="form-control" rows="2" required></textarea>
										<span class="text-danger">{{ $errors->first('adress') }}</span>
									</div>	
								</div>
							</div>
						</div>

						<div class="col-md-12" style="margin-top: 20px">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<strong>Teléfono de la Tienda</strong>
										<input type="text" name="phone" class="form-control" autocomplete="off" required>
										<span class="text-danger">{{ $errors->first('phone') }}</span>
									</div>	
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<strong>Email de la Tienda</strong>
										<input type="email" name="email" class="form-control" autocomplete="off">
										<span class="text-danger">{{ $errors->first('email') }}</span>
									</div>	
								</div>
							</div>
						</div>

						<div class="col-md-12" style="margin-top: 20px">
						    <input type="file" id="file" name="imagenes[]" multiple onchange="return fileValidation()">
						</div>

						<div class="col-md-12" style="margin: 25px 0">
							<div class="row">
							    <div class="col-md-3">
							    	<div id="imagePreview0"></div>
							    </div>
							    <div class="col-md-3">
							    	<div id="imagePreview1"></div>
							    </div>
							    <div class="col-md-3">
							    	<div id="imagePreview2"></div>							    	
							    </div>
							</div>
						</div>														

						<div class="col-md-12" style="margin-top: 15px">
							<hr><br>
							<div class="row">
								<div class="col-md-6">
									<a href="{{ route('index') }}" class="btn btn-primary">Cancelar</a>
								</div>
								<div class="col-md-6">
									<div align="right">
										<input type="submit" class="btn btn-success" value="Guardar">
									</div>
								</div>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('js')

<script>
	function fileValidation() {
	    fileInput = document.getElementById('file');
	    var filePath = fileInput.value;
	    var allowedExtensions = /(.jpg|.jpeg|.png|.gif)$/i;
	    if(!allowedExtensions.exec(filePath)) {
	    	Swal.fire('Importante !','Por Favor, Cargue Imágenes Unicamente con extensiones .jpeg / .jpg / .png / .gif','info');
	        fileInput.value = '';
	        return false;
	    }else{
	        //Image preview
	        var cantI = fileInput.files.length;
	        
	        if (cantI > 3) {
	    		Swal.fire('Importante !','La cantidad de Imágenes debe ser menor o igual a tres(3)','info');
	    		fileInput.value = '';	        	
	        }

        	if (cantI == 1) {

		        if (fileInput.files && fileInput.files[0]) {
		            var reader = new FileReader();
		            reader.onload = function(e) {
		                document.getElementById('imagePreview0').innerHTML = '<img class="img-fluid img-thumbnail" src="'+e.target.result+'"/>';
		            };
		            reader.readAsDataURL(fileInput.files[0]);
		        } 
		    }

		    if (cantI == 2) { 
		        if (fileInput.files && fileInput.files[0]) {
		            var reader = new FileReader();
		            reader.onload = function(e) {
		                document.getElementById('imagePreview0').innerHTML = '<img class="img-fluid img-thumbnail" src="'+e.target.result+'"/>';
		            };
		            reader.readAsDataURL(fileInput.files[0]);
		        } 
		        if (fileInput.files && fileInput.files[1]) {
		            var reader = new FileReader();
		            reader.onload = function(e) {
		                document.getElementById('imagePreview1').innerHTML = '<img class="img-fluid img-thumbnail" src="'+e.target.result+'"/>';
		            };
		            reader.readAsDataURL(fileInput.files[1]);
		        } 
		    }

		    if (cantI == 3) { 
		        if (fileInput.files && fileInput.files[0]) {
		            var reader = new FileReader();
		            reader.onload = function(e) {
		                document.getElementById('imagePreview0').innerHTML = '<img class="img-fluid img-thumbnail" src="'+e.target.result+'"/>';
		            };
		            reader.readAsDataURL(fileInput.files[0]);
		        } 
		        if (fileInput.files && fileInput.files[1]) {
		            var reader = new FileReader();
		            reader.onload = function(e) {
		                document.getElementById('imagePreview1').innerHTML = '<img class="img-fluid img-thumbnail" src="'+e.target.result+'"/>';
		            };
		            reader.readAsDataURL(fileInput.files[1]);
		        } 
		        if (fileInput.files && fileInput.files[2]) {
		            var reader = new FileReader();
		            reader.onload = function(e) {
		                document.getElementById('imagePreview2').innerHTML = '<img class="img-fluid img-thumbnail" src="'+e.target.result+'"/>';
		            };
		            reader.readAsDataURL(fileInput.files[2]);
		        } 		        
		    }

	    }
	}
</script>
@endsection
