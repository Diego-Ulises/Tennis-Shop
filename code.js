/*function img() {
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

$(document).ready(function(){
	InsertProduct();
});

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
				//HandlerDataBase::InsertNewProduct($_POST["name1"], $_POST["name1"], $_POST["name2"], $_POST["name3"], $_POST["name4"], Img(), $_POST["name1"]);
				var dataS = new FormData();
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
					success: function(response){
						console.log(response);
					},
					error: function(response){
						console.log(response);
					}
				});
}*/