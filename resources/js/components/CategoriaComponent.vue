<template>
    <div>

        <div class="card">
                <div class="card-header">Categoria</div>
        </div>
        <div class="card-body">
            <label>Nueva Categoria</label>

            <div class="form-group">
                <label class="control-label col-md-3">Nombre Categoria</label>
                <div class="input-icon right">
                        <input type="text" class="form-control" v-model="nombre_categoria" name="nombre_categoria">
                </div>
            </div>

            <br>
            <button type="button" class="btn btn-success" @click="insertarCategorias()">Guardar</button>
            <br>
            <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item,index) in listar_categorias" :key="index">
                <th scope="row">{{item.id}}</th>
                <td>{{item.nombre_categoria}}</td>
                <td>
                    <button type="button" class="btn btn-info"
                            data-toggle="modal" data-target="#CategoriaModal"
                            @click="datosMod(item.id, item.nombre_categoria)">
                        Editar
                    </button>
                    <button type="button" class="btn btn-danger" @click="eliminarCategorias(item.id)">
                        Eliminar
                    </button>
                </td>
                </tr>
            </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="CategoriaModal" tabindex="-1" role="dialog" aria-labelledby="CategoriaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CategoriaModalLabel">Editar Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <label class="control-label col-md-3">Nombre</label>
                <div class="input-icon right">
                    <i class="fa"></i>
                        <input type="text" class="form-control" v-model="mod_nombre_categoria" name="mod_nombre_categoria">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" @click="modificarCategorias()">Guardar</button>
            </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name : 'categoria-component',
    data() {
        return {
            listar_categorias : [],
            nombre_categoria : null,
            mod_id : null,
            mod_nombre_categoria : null
        }
    },
    created(){
        this.listaCategorias();
    },
    updated(){
        this.listaCategorias();
    },
    methods: {
        listaCategorias(){
            axios.get(`categoriaver`).then((response) => {
                this.listar_categorias = response.data;
            })
        },
        insertarCategorias(){
            let formData = new FormData();
            formData.append("nombre_categoria", this.nombre_categoria);
            axios.post(`categoriacrear`, formData);
            this.nombre_categoria = null;
        },
        datosMod(id_cat, nombreCategoria){
            this.mod_nombre_categoria = nombreCategoria;
            this.mod_id = id_cat;
        },
        modificarCategorias(){
            const modificar = {
                nombre_categoria : this.mod_nombre_categoria
            };
            axios.put(`categoriamodificar/${this.mod_id}`, modificar).then(respuesta=>{location.reload()});
        },
        eliminarCategorias(id){
            axios.delete(`categoriaeliminar/${id}`);
        }
    }
}
</script>
