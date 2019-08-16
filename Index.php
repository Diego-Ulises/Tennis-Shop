 <!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Adidas Shop</title>
        <link rel="stylesheet" type="text/css" href="css/shop.css">
		<link rel="icon" type="image/png" href="icono.png" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    -->
    </head>
    <body>
		<?php
			/*$data=file_get_contents("ProductsJSON.json");
			$vari=json_decode($data);*/
			
			require_once 'loader.php';
			$vari= Loader::getProduct();

		?>
    	<div class="Div_Body">
			<div class="Navegacion_Superior">

					<div class="container">
				<div class="Menu_Superior">
					<img id="Logo_Superior" src='IMG/adidas-logo.jpg'>
					<ul class="Menu">
					<li><a class="Menu" href="#">Home</a></li> 
					<li><a class="Menu" href="#">Shop</a></li>
					<li><a class="Menu" href="#">Buy now</a></li>
					</ul>
						<div class="dropdown" style="margin-left: 10px;">
						    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><img src="IMG/shopping-cart.png"></button>

						    <ul class="dropdown-menu dropdown-menu-left" style="text-align: center;">
						      <li><a href="#"><img src="IMG/Imagen1.jpg" style="width: 50px; height: 50px;"></a></li>
						      <li><a href="#">Accesories</a></li>
						      <li><a href="#">&#8364;45.00</a></li>
						      <li class="divider"></li>
						      <li><a href="#">1 Item</a></li>
						      <li><a href="#"><img src="IMG/Imagen3.jpg" style="width: 50px; height: 50px;"></a></li>
						      <li><a href="#">Accesories 2</a></li>
						      <li><a href="#">&#8364;67.00</a></li>
						      <li class="divider"></li>
						      <li><a href="#">2 Item</a></li>
						    </ul>
						    <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#ModalRegistro">Insertar Productos</button>
						</div>
					</div>	
				</div>		
			</div>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		    <li data-target="#myCarousel" data-slide-to="1"></li>
		    <li data-target="#myCarousel" data-slide-to="2"></li>
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
		    <div class="item active">
		      <img src="IMG/banner.jpg" alt="Tenis" width="1200" height="700">
		      <div class="carousel-caption">
		        <h3>CALZADO</h3>
		        <p>Colecciones - Tiendas - Páginas Especiales </p>
		      </div> 
		    </div>

		    <div class="item">
		      <img src="IMG/banner2.jpg" alt="Ropa" width="1200" height="700">
		      <div class="carousel-caption">
		        <h3>Ropa</h3>
		        <p>Playeras - Mejores Marcas</p>
		      </div> 
		    </div>

		    <div class="item">
		      <img src="IMG/banner3.jpg" alt="Deportes" width="1200" height="700">
		      <div class="carousel-caption">
		        <h3>Deportes</h3>
		        <p>Futbool - Running - Tennis</p>
		      </div> 
		    </div>
		  </div>

		  <!-- Left and right controls -->
		  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>

		<div class="Encabezado">
			<p class="Titulo">
				trending </br>
				<span class="Subtitulo">most trendy clothes 
				<hr class="Linea"> 
				</span>
			</p> 
		</div>

		<div class="Producto">

			<script>
				function addToCart() {
					$(document).ready(function(){
						$("button").click(function() {
							//alert($(this).attr("id"))

				    		document.getElementById($(this).attr("id")).innerHTML = "Añadido";
						});
					});
				}
			</script>
			<!--
			<?php 
				$cont=0;
			?>
			<?php foreach ($vari->array as $clave => $value): ?>				
				<div  class="Tarjeta" style="background-image: url(<?= $value->IMG ?>)">
					<p class="Texto">
						</br></br></br></br></br></br></br></br>
						<b><?= $value->NCamisa ?></b></br>
						<span class="Categoria"><?= $value->Categoria?></span>
						</br>
						<span class="Precio"><?= $value->Precio ?></span>

					</p>
					<button class="buttonB buttonAdd" id="<?= $value->IDCamisa ?>+JSON" onclick="addToCart()">Add to cart</button>
				</div>
				<?php 
					$cont+=1;	
					if ($cont==4) {
						echo "<br><br><br><br><br>";
						$cont=0;
					}	
				?>
			<?php endforeach ?>
			<br><br><br>
			<h2>Acceso con Base de Datos</h2>
			
			-->
			<!-- Acceso a datos (Base de Datos) -->
			<?php
				require_once 'HandlerDB.php';
				HandlerDataBase::connect();
				$Result = HandlerDataBase::getProduct();

				/*echo "<br>";
				var_dump($Result);
				echo "<br>";*/

				$cont=0;
				$idUpdate=1;
			?>
			<br>

			<?php foreach ($Result as $columna): ?>
				<div class="Tarjeta" style="background-image: url(<?= $columna['Img'] ?>)">
					<p class="Texto">
						</br></br></br></br></br></br></br></br>
						<b><?= $columna['Nombre_Producto'] ?></br></br>
						<span class="Categoria"><?= $columna['Categoria'] ?></span>
						</br>
						<span class="Precio" style="text-decoration: underline wavy red; ">&#8364;<?= $columna['Precio'] ?></span><br>
						<span class="PrecioOferta" style="font-size: 10px;">Precio Oferta: &#8364; <?=$columna['Precio_Oferta']?></span>
						</br>
						<span class="Slug"><?= $columna['Slug'] ?></span>
					
					<button class="btn btn-success" id="<?= $columna['ID'] ?>" onclick="addToCart()">Add to cart</button>
					</br>
					<button class="glyphicon glyphicon-remove" style="color: #581845; background-color: white; border-radius: 10px 10px 10px 10px;" id="<?= $columna['ID'] ?>" onclick="deleteProduct(<?= $columna['ID'] ?>)"></button>
					<button class="glyphicon glyphicon-edit" onclick="modalUpdate(<?= $columna['ID'] ?>)" style="color: #F7DC6F; background-color: white; border-radius: 10px 10px 10px 10px;" id="btnUp" data-toggle="modal" data-target="#ModalUpdate"></button>
					
				</div>
				<?php 
					$cont+=1;	
					if ($cont==4) {
						echo "<br><br><br><br><br>";
						$cont=0;
					}	
				?>
			<?php endforeach ?>
			<br><br><br>
			
	<!--modal Registro nuevo producto-->
    <div class="modal fade" id="ModalRegistro" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel" style="color:#0B4C5F;">Insertar nuevo producto</h4>
                </div>
                <div class="modal-body">
                    <fieldset style="border: 2px groove; padding: 1em; color: #0489B1">
                        <form  action="conexion.php" method="POST" accept-charset="utf-8">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-control-static" style="color:#0B4C5F;">Nombre Producto
                                        <span style="color:#DF013A">(*)</span>
                                    </label>
                                    <input type="text" class="form-control" name="name1" id="name1" />
                                    <br>

                                    <label class="form-control-static" style="color:#0B4C5F;">Precio
                                        <span style="color:#DF013A">(*)</span>
                                    </label>
                                    <input type="text" class="form-control" name="name2" id="name2" />
                                    <label id="label2" class="alerta"></label>
                                    <br>
                                    <label class="form-control-static" style="color:#0B4C5F;">Oferta
                                        <span style="color:#DF013A">(*)</span>
                                    </label>
                                    <input type="text" class="form-control" name="name3" id="name3" />
                                    <label id="label3" class="alerta"></label>
                                    <br>
                                    
                                </div>
                                <div class="col-md-3">
                                    <label class="form-control-static" id="categoria" style="color:#0B4C5F;">Categoria
                                        <span style="color:#DF013A">(*)</span>
                                    </label>
                                    <br>
                                    <select class="form-control" id="name4" name="name4">
                                        <option value='Accesorios'>Accesorios</option>
                                        <option value='Tenis'>Tenis</option>
                                        <option value='Ropa'>Ropa</option>
                                    </select>
                                    <br>
                                    <label id="labelcategoria" class="alerta"></label>
                                   

                                    <label class="form-control-static" style="color:#0B4C5F;">Fecha
                                        <span style="color:#DF013A">(*)</span>
                                    </label>
                                    <br>
                                    <input type="date" id="name5" name="name5" min="2010-01-25" max="2018-12-25" step="2">
                                    <label id="labelfecha" class="alerta"></label>
                                    <br> <br>
                                	<!--Ver la imagen-->
                                    <label style="color:#0B4C5F;">Imagen
                                    <span style="color:#DF013A">(*)</span>
                                    </label>
                                    <output id="list">
                                    </output>
                                    <br>
                                    <span class="btn btn-file">
                                        <b style="color: white;">Seleccionar</b>
                                        <input type="file" id="files" name="files" accept=".jpg, .jpeg, .png" onchange="img2()"> </span>
                                    <label hidden id="label4" name="label4" class="alerta">Error, no ha seleccionado nada</label>
                                    <br>
                                </div>
								<div class="col-md-3">
									<div class="container">         
  										<img src="" id="imgProduct"class="img-rounded" alt="Imagen Producto" width="200" height="200"> 
									</div>
									<button type="button" class="btn btn-primary btn-lg" id="insertProducts" onclick="InsertProduct()">Insertar Nuevo Producto</button>
                                </div>
                            </div>
                        </form>
                    </fieldset>
                </div>

            </div>
        </div>
    </div>
     <!--Final modal Registro nuevo producto-->
     <!--modal Actualizar nuevo producto-->
    <div class="modal fade" id="ModalUpdate" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel" style="color:#23A41C;">Actualizar producto</h4>						
                </div>
                <div class="modal-body">
                    <fieldset style="border: 2px groove; padding: 1px; color: #0489B1">
                        <form  action="HandlerDB.php" method="POST" accept-charset="utf-8">
                            <div class="row">
                                <div class="col-md-3">

                                    <label class="form-control-static" style="color:#0B4C5F;">Nombre Producto
                                        <span style="color:#DF013A">(*)</span>
                                    </label>
                                    <input type="text" class="form-control" name="name1" id="name1Up" />
                                    <br>

                                    <label class="form-control-static" style="color:#0B4C5F;">Precio
                                        <span style="color:#DF013A">(*)</span>
                                    </label>
                                    <input type="text" class="form-control" name="name2" id="name2Up" />
                                    <label id="label2" class="alerta"></label>
                                    <br>
                                    <label class="form-control-static" style="color:#0B4C5F;">Oferta
                                        <span style="color:#DF013A">(*)</span>
                                    </label>
                                    <input type="text" class="form-control" name="name3" id="name3Up" />
                                    <label id="label3" class="alerta"></label>
                                    <br>
                                    
                                </div>
                                <div class="col-md-3">
                                    <label class="form-control-static" id="categoria" style="color:#0B4C5F;">Categoria
                                        <span style="color:#DF013A">(*)</span>
                                    </label>
                                    <br>
                                    <select class="form-control" id="name4Up" name="name4">
                                        <option value='Accesorios'>Accesorios</option>
                                        <option value='Tenis'>Tenis</option>
                                        <option value='Ropa'>Ropa</option>
                                    </select>
                                    <br>
                                    <label id="labelcategoria" class="alerta"></label>
                                   

                                    <label class="form-control-static" style="color:#0B4C5F;">Fecha
                                        <span style="color:#DF013A">(*)</span>
                                    </label>
                                    <br>
                                    <input type="date" id="name5Up" name="name5" min="2010-01-25" max="2018-12-25" step="2">
                                    <label id="labelfecha" class="alerta"></label>
                                    <br> <br>
                                	<!--Ver la imagen-->
                                    <label style="color:#0B4C5F;">Imagen
                                    <span style="color:#DF013A">(*)</span>
                                    </label>
                                    <output id="list">
                                    </output>
                                    <br>
                                    <span class="btn btn-file">
                                        <b style="color: white;">Seleccionar</b>
                                        <input type="file" id="filesUp" name="files" accept=".jpg, .jpeg, .png" onchange="imgUp()"> </span>
                                    <label hidden id="label4Up" name="label4" class="alerta">Error, no ha seleccionado nada</label>
                                    <br>
                                </div>
								<div class="col-md-3">
									<label class="form-control-static" style="color:#0B4C5F;">ID Producto
                                        <span style="color:#DF013A">(*)</span>
                                    </label>
                                    <input type="text" class="form-control" name="name0" id="name0" />
                                    <br>

									<div class="container">         
  										<img src="" id="imgProductUp"class="img-rounded" alt="Imagen Producto" width="200" height="200"> 
									</div>
									<button type="button" class="btn btn-primary btn-lg" style="background-color: #23A41C;" id="updateProducts" onclick="updateProduct()">Actualizar Producto</button>
                                </div>
                            </div>
                        </form>
                    </fieldset>
                </div>

            </div>
        </div>
    </div>
     <!--Final modal Actualizar producto-->
    <script>
    	function img2() {
					var x = document.getElementById("files").value;
					var img = x.replace("C:\u005Cfakepath\u005C", "IMG/");
					document.getElementById('imgProduct').src = img;
					return img;
		}
		function imgUp() {
					var x = document.getElementById("filesUp").value;
					var img = x.replace("C:\u005Cfakepath\u005C", "IMG/");
					document.getElementById('imgProductUp').src = img;
					return img;
		}
    </script>
   			<script type="text/javascript">
   				function img() {
					var x = document.getElementById("files").value;
					var img = x.replace("C:\u005Cfakepath\u005C", "IMG/");
					document.getElementById('imgProduct').src = img;
					return img;
				}
				function Nombre_Producto() {
					var x = document.getElementById("name1").value;
					//alert(x);
					return x;
				}
				function slug() {
					var x = Nombre_Producto().toLowerCase();
					var x = x.replace(" ", "_");
					return x;
				}
				function Precio() {
					var x = document.getElementById("name2").value;
					//alert(x);
					return x;
				}
				function Precio_Oferta() {
					var x = document.getElementById("name3").value;
					//alert(x);
					return x;
				}
				function Categoria() {
					var x = document.getElementById("name4").value;
					//alert(x);
					return x;
				}
				function Fecha() {
					var x = document.getElementById("name5").value;
					//alert(x);
					return x;
				}

				function InsertProduct() {
				var dataS = new FormData();
				
				if(Nombre_Producto()==""){
					$("#name1").css('border-color', 'red');
					alert("Inserte un nombre de producto");
				}else if(Precio()==""){
					$("#name2").css('border-color', 'red');
					alert("Inserte un precio correcto");
				}else if(Precio_Oferta()==""){
					$("#name3").css('border-color', 'red');
					alert("Inserte un precio de oferta correcto");
				}else if(Categoria()==""){
					$("#name4").css('border-color', 'red');
					alert("Seleccione una categoria correcta");
				}else if(Fecha()==""){
					$("#name5").css('border-color', 'red');
					alert("Seleccione una fecha correcta");
				}else if(img()==""){
					//$("#name").css('border-color', 'red');
					alert("Seleccione una imagen correcta");
				}else if(Precio_Oferta()>Precio()){
					$("#name2").css('border-color', 'red');
					$("#name3").css('border-color', 'red');
					alert("Verifique que el precio de la la oferta sea menor que el precio real y que sean datos numéricos");
				}else{
					$("#name1").css('border-color', 'blue');
					$("#name2").css('border-color', 'blue');
					$("#name3").css('border-color', 'blue');
					$("#name4").css('border-color', 'blue');
					$("#name5").css('border-color', 'blue');

					dataS.append('tipo', 'Insertar');
					dataS.append('nom_prod', Nombre_Producto());
					dataS.append('precio', Precio());
					dataS.append('precio_oferta', Precio_Oferta());
					dataS.append('categoria', Categoria());
					dataS.append('img', img());
					dataS.append('fecha', Fecha());
					$.ajax({
						url: 'HandlerDB.php',
						dataType: 'json',
						async: true,
						method: 'POST',
						data: dataS,
						processData: false,
	    				contentType: false,
						success: function(response){
							console.log(response);
						},
						error: function(response){
							console.log(response);
						}
					});
				location.reload(true);
				location.reload(true);
				}
			}
			function modalUpdate(ID){
				document.getElementById("name0").value=ID;
				alert(document.getElementById("name0").value);
			}
			function Nombre_ProductoUp() {
					var x = document.getElementById("name1Up").value;
					//alert(x);
					return x;
				}
				function slugUp() {
					var x = Nombre_ProductoUp().toLowerCase();
					var x = x.replace(" ", "_");
					return x;
				}
				function PrecioUp() {
					var x = document.getElementById("name2Up").value;
					//alert(x);
					return x;
				}
				function Precio_OfertaUp() {
					var x = document.getElementById("name3Up").value;
					//alert(x);
					return x;
				}
				function CategoriaUp() {
					var x = document.getElementById("name4Up").value;
					//alert(x);
					return x;
				}
				function FechaUp() {
					var x = document.getElementById("name5Up").value;
					//alert(x);
					return x;
				}
			function updateProduct(){
				var dataS = new FormData();
				alert('Update en proceso');
				if(Nombre_ProductoUp()==""){
					$("#name1Up").css('border-color', 'red');
					alert("Inserte un nombre de producto");
				}else if(PrecioUp()==""){
					$("#name2Up").css('border-color', 'red');
					alert("Inserte un precio correcto");
				}else if(Precio_OfertaUp()==""){
					$("#name3Up").css('border-color', 'red');
					alert("Inserte un precio de oferta correcto");
				}else if(CategoriaUp()==""){
					$("#name4Up").css('border-color', 'red');
					alert("Seleccione una categoria correcta");
				}else if(FechaUp()==""){
					$("#name5Up").css('border-color', 'red');
					alert("Seleccione una fecha correcta");
				}else if(imgUp()==""){
					//$("#name").css('border-color', 'red');
					alert("Seleccione una imagen correcta");
				}else if(Precio_Oferta()>Precio()){
					$("#name2Up").css('border-color', 'red');
					$("#name3Up").css('border-color', 'red');
					alert("Verifique que el precio de la la oferta sea menor que el precio real y que sean datos numéricos");
				}else{
					$("#name1Up").css('border-color', 'blue');
					$("#name2Up").css('border-color', 'blue');
					$("#name3Up").css('border-color', 'blue');
					$("#name4Up").css('border-color', 'blue');
					$("#name5Up").css('border-color', 'blue');

					dataS.append('tipo', 'Actualizar');
					dataS.append('id_product',document.getElementById("name0").value)
					dataS.append('nom_prod', Nombre_ProductoUp());
					dataS.append('precio', PrecioUp());
					dataS.append('precio_oferta', Precio_OfertaUp());
					dataS.append('categoria', CategoriaUp());
					dataS.append('img', imgUp());
					dataS.append('fecha', FechaUp());
					$.ajax({
						url: 'HandlerDB.php',
						dataType: 'json',
						async: true,
						method: 'POST',
						data: dataS,
						processData: false,
	    				contentType: false,
						success: function(response){
							console.log(response);
						},
						error: function(response){
							console.log(response);
						}
					});
				location.reload(true);
				location.reload(true);
				}
			}
			function deleteProduct(ID){
				//alert(ID);
				var dataS = new FormData();
				dataS.append('tipo', 'Eliminar');
				dataS.append('id_product', ID);
				$.ajax({
					url: 'HandlerDB.php',
					dataType: 'json',
					async: true,
					method: 'POST',
					data: dataS,
					processData: false,
    				contentType: false,
					success: function(response){
						console.log(response);
					},
					error: function(response){
						console.log(response);
					}
				});
				location.reload(true);
			}
			</script>
		</div>
		
	</div>
	 
    </body>
</html>