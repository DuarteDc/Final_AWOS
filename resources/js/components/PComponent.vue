<template>
<div>
  <div>
  <button data-toggle="modal" data-target="#guardarModal" type="button" class="justify-content-center boton_create"><i class="fas fa-plus-circle">Nueva Reservacion</i></button>
      </div>    
          <div class="row">
            <div class="col-sm"  v-for="producto in productos" :key="producto.id">
                <div  class="card text-center text-white  bg-dark mb-3" style="width: 18rem; margin-top: 40px" >
                    <div class="card-body text-white">
                        <h5 class="card-title text-white" v-text="producto.nombre"></h5>
                        <h6 class="card-subtitle mb-2 text-white">Precio</h6>
                        <h6 class="card-subtitle mb-2 text-white" v-text="producto.costo"></h6>
                        <h6 class="card-subtitle mb-2 text-white">Descuento %</h6>
                        <p class="card-text text-white" v-text="producto.descuento"></p>
                        <a data-toggle="modal" data-target="#exampleModal" type="button" class="boton_edit" v-on:click="updateid(producto)">Editar</a>
                        <a data-toggle="modal" data-target="#deleteProducto" type="button" class="boton_delete" v-on:click="deleteid(producto)" >Eliminar</a>
                    </div>  
                </div>
            </div>   
    </div>
          <!--  modal update -->
                    <div class="modal fade border-dark" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content border-dark">
                                <div class="modal-header border-dark">
                                    <h5 class="modal-title" id="exampleModalLabel">Modificar Detalles</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form @submit.prevent="editarProducto()" >
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Vuelo ID:</label>
                                        <input type="text"  v-model="productoedit.nombre" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Reservacion ID:</label>
                                        <input type="number"  v-model="productoedit.costo" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Vuelo ID:</label>
                                        <input type="number"  v-model="productoedit.descuento" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="modal-footer border-dark">
                                        <button type="button" class="boton_cancel" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" name="action" class="boton_edit">Actualizar</button>                           
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
          <!-- fin modal update -->
          <!-- modal delete -->
                          <div class="modal fade border-dark" id="deleteProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                        <div class="modal-content border-dark">
                                                            <div class="modal-header border-dark">
                                                                <h5 class="modal-title" id="exampleModalLabel">Eliminar Detalle Reservaciones</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                            <div class="modal-body">
                                                <h4>¿Esta seguro que quieres eliminar la reservacion del usuario con folio <span class="badge badge-pill badge-danger">{{productodelete.nombre}}</span>?</h4>                         
                                            </div>
                                            <div class="modal-footer border-dark">
                                                <button type="button" class="boton_cancel" data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="boton_delete" @click="deleteProducto(productodelete.id)">Eliminar</button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                <!-- fin modal delete -->
                <!-- modal create -->
                    <div class="modal fade border-dark" id="guardarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content border-dark">
                            <div class="modal-header border-dark">
                                <h5 class="modal-title" id="exampleModalLabel">Nuevo Detalle</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="createProducto()">
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">Vuelo ID:</label>
                                    <input type="text" v-model="newproducto.nombre" placeholder="Nombre" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">Vuelo ID:</label>
                                    <input type="number" v-model="newproducto.costo" placeholder="0" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">Reservacion ID:</label>
                                    <input type="number" v-model="newproducto.descuento" placeholder="0" class="form-control" id="recipient-name">
                                </div>
                                <div class="modal-footer border-dark">
                                    <button type="button" class="boton_cancel" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" name="action" class="boton_update">Guardar</button>
                                </div>
                                </form>
                            </div>
                            </div>
                        </div>
                </div>
                <!-- fin modal create -->
</div>
</template>
<script>
        export default {
          data() {
            return {
              //
              productos: [],
              productodelete:[],
              productoedit:[],
              newproducto:{
                  nombre:"",
                  costo:"",
                  descuento:"",
              }
            };
          },
          mounted() {
            this.getProductos();
            console.log("se carga la API");
          },
          methods: {
            //función para obtener vuelos
            getProductos: function () {
              axios.get("Productos").then((response) => {
                this.productos = response.data.productos;
                console.log(this.productos);
              });
            },
              updateid(id){
              this.productoedit = id;
            },
            editarProducto(){
                let urlUpdate='Productos/'+ this.productoedit.id;
                axios.put(urlUpdate,this.productoedit).then(response =>{
                if(response.data.error){
                    consolo.log("ocurrio un error");
                    } else {
                console.log("Se Actualizo de manera correctamente");
                    $('#exampleModal').modal('hide')
                }
                }).catch(error=>{
                });
            },
            
            deleteid(id) {
                this.productodelete = id;
            },
            deleteProducto(id) {
            let urldelete = "Productos/" + id;
            axios.delete(urldelete, this.productodelete) .then((response) => {
            if (response.data.error) {
                consolo.log("ocurrio un error");
            } else {
                console.log("se elimino de manera correctamente");
                $('#deleteProducto').modal('hide')
            }
            })
            .catch((error) => {});
        },
        createProducto(){
            let url="Productos";
            axios.post(url,this.newproducto).then(response=>{
                if(response.data.error ){
                    console.log("ocurrio un error al guarda");
                }else{
                    this.newproducto.nombre="",
                    this.newproducto.costo="",
                    this.newproducto.descuento=""
                    $('#guardarModal').modal('hide');
                }
            }).catch(error=>{
               console.log("ocurrio un error al guarda"); 
            });
        },
          },
        };
</script>

<style >
.boton_edit {
  text-decoration: none;
  padding: 3px;
  padding-left: 5px;
  padding-right: 5px;
  font-family: helvetica;
  font-weight: 300;
  font-size: 15px;
  font-style: italic;
  color: #006558;
  background-color: #82b085;
  border-radius: 15px;
  border: 3px double #dee9de;
}
.boton_edit:hover {
  opacity: 0.6;
  text-decoration: none;
}
.boton_delete {
  text-decoration: none;
  padding: 3px;
  padding-left: 5px;
  padding-right: 5px;
  font-family: helvetica;
  font-weight: 300;
  font-size: 15px;
  font-style: italic;
  color: #650000;
  background-color: #a00527;
  border-radius: 15px;
  border: 3px double #f7faf7;
}
.boton_delete:hover {
  opacity: 0.6;
  text-decoration: none;
}
.boton_create {
  text-decoration: none;
  padding: 3px;
  padding-left: 5px;
  padding-right: 5px;
  font-family: helvetica;
  font-weight: 300;
  font-size: 15px;
  font-style: italic;
  color: #f5f4fa;
  background-color: #66a9ec;
  border-radius: 15px;
  border: 3px double #f7faf7;
}
.boton_create:hover {
  opacity: 0.6;
  text-decoration: none;
}
.boton_cancel {
  text-decoration: none;
  padding: 3px;
  padding-left: 5px;
  padding-right: 5px;
  font-family: helvetica;
  font-weight: 300;
  font-size: 15px;
  font-style: italic;
  color: #202020;
  background-color: #eaec66;
  border-radius: 15px;
  border: 3px double #f7faf7;
}
.boton_cancel:hover {
  opacity: 0.6;
  text-decoration: none;
}
.boton_update {
  text-decoration: none;
  padding: 3px;
  padding-left: 5px;
  padding-right: 5px;
  font-family: helvetica;
  font-weight: 300;
  font-size: 15px;
  font-style: italic;
  color:  #3003cf;
  background-color: #f0f0ef;
  border-radius: 15px;
  border: 3px double #3003cf;
}
.boton_update:hover {
  opacity: 0.6;
  text-decoration: none;
}
</style>