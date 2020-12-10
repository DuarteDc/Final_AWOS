<template>
<div>
  <div>
  <button data-toggle="modal" data-target="#guardarModal" type="button" class="justify-content-center boton_create"><i class="fas fa-plus-circle">Nueva Reservacion</i></button>
      </div>    
          <div class="row">
            <div class="col-sm">
              <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Cantidad</th>
                        <th>Producto ID</th>
                        <th>Users ID</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="venta in ventas" :key="venta.id">
                        <td v-text="venta.id"></td>
                        <td v-text="venta.cantidad"></td>
                        <td v-text="venta.producto_id"></td>
                        <td v-text="venta.users_id"></td>
                        <td>
               <a data-toggle="modal" data-target="#exampleModal" type="button" class="boton_edit" v-on:click="updateid(venta)">Editar</a>
          </td>
           <td>
               <a data-toggle="modal" data-target="#deleteVenta" type="button" class="boton_delete" v-on:click="deleteid(venta)">Eliminar</a>
          </td>
                    </tr>
                </tbody>
                </table>
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
                                    <form @submit.prevent="editarVenta()" >
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Vuelo ID:</label>
                                        <input type="number"  v-model="ventaedit.cantidad" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Reservacion ID:</label>
                                        <input type="number"  v-model="ventaedit.users_id" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label align="left"  for="recipient-name" class="col-form-label">Vuelo ID:</label>
                                        <input type="number"  v-model="ventaedit.producto_id" class="form-control" id="recipient-name">
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
                          <div class="modal fade border-dark" id="deleteVenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                        <div class="modal-content border-dark">
                                                            <div class="modal-header border-dark">
                                                                <h5 class="modal-title" id="exampleModalLabel">Eliminar Detalle Reservaciones</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                            <div class="modal-body">
                                                <h4>¿Esta seguro que quieres eliminar la reservacion del usuario con folio <span class="badge badge-pill badge-danger">{{ventadelete.id}}</span>?</h4>                         
                                            </div>
                                            <div class="modal-footer border-dark">
                                                <button type="button" class="boton_cancel" data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="boton_delete" @click="deleteVenta(ventadelete.id)">Eliminar</button>
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
                                <form @submit.prevent="createVenta()">
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">Vuelo ID:</label>
                                    <input type="number" v-model="newventa.cantidad" placeholder="0" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">Vuelo ID:</label>
                                    <input type="number" v-model="newventa.users_id" placeholder="0" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label align="left" for="recipient-name" class="col-form-label">Reservacion ID:</label>
                                    <input type="number" v-model="newventa.producto_id" placeholder="0" class="form-control" id="recipient-name">
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
              ventas: [],
              ventadelete:[],
              ventaedit:[],
              newventa:{
                  cantidad:"",
                  users_id:"",
                  producto_id:"",
              }
            };
          },
          mounted() {
            this.getVentas();
            console.log("se carga la API");
          },
          methods: {
            //función para obtener vuelos
            getVentas: function () {
              axios.get("Ventas").then((response) => {
                this.ventas = response.data.ventas;
                console.log(this.ventas);
              });
            },
              updateid(id){
              this.ventaedit = id;
            },
            editarVenta(){
                let urlUpdate='Ventas/'+ this.ventaedit.id;
                axios.put(urlUpdate,this.ventaedit).then(response =>{
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
                this.ventadelete = id;
            },
            deleteVenta(id) {
            let urldelete = "Ventas/" + id;
            axios.delete(urldelete, this.ventadelete) .then((response) => {
            if (response.data.error) {
                consolo.log("ocurrio un error");
            } else {
                console.log("se elimino de manera correctamente");
                $('#deleteVenta').modal('hide')
            }
            })
            .catch((error) => {});
        },
        createVenta(){
            let url="Ventas";
            axios.post(url,this.newventa).then(response=>{
                if(response.data.error ){
                    console.log("ocurrio un error al guarda");
                }else{
                    this.newventa.cantidad="",
                    this.newventa.users_id="",
                    this.newventa.producto_id=""
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