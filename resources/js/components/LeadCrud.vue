<template>
<div>
    <div class="heading">
      <h1 class="text-center">Lista leads</h1>
    </div>
    <div class="d-flex flex-wrap justify-content-center">
    <leadcrud-component
      v-for="crud in cruds"
      v-bind="crud"
      :key="crud.id"
      @update="update"
    ></leadcrud-component>
    </div>
    </div>
</template>

<script>
  function Crud({id,offer_id, nome,cognome,telefono,email,status}) {
    this.id = id;
    this.offer_id = offer_id;
    this.nome=nome;
    this.telefono = telefono;
    this.email=email;
    this.cognome = cognome;
    this.status=status;
  }

  import LidCrudComponent from './LidCrudComponent.vue';

  export default {
    data() {
      return {
        cruds: []
      }
    },
    methods: {
        async read() {
        // To do
         const {data} =await this.$http.get('/user/myleads');
    // console.log(data);
    data.forEach(crud => this.cruds.push(new Crud(crud)));
      },
  async update(id, status) {
    await this.$http.put(`/user/myleads/${id}`, { status});
    this.cruds.find(crud => crud.id === id).status = status;

  },
//   async create() {
//     const { data } = await this.$http.get('/api/cruds/create');
//     this.cruds.push(new Crud(data));
//   },
    },
 created() {
  this.read();
    },
    components: {
        LidCrudComponent
    }
  }
</script>
