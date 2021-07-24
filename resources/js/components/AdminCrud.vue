<template>
<div>
    <div class="heading">
      <h1 class="text-center">Lista operatori</h1>
    </div>
    <admincrud-component
      v-for="crud in cruds"
      v-bind="crud"
      :key="crud.id"
      @update="update"
      @delete="del"
    ></admincrud-component>
    </div>
</template>

<script>
  function Crud({id,name, email,img}) {
    this.id = id;
    this.name = name;
    this.email = email;
    this.img = img;
    // this.backimg = backimg;
  }

  import AdminCrudComponent from './AdminCrudComponent.vue';

  export default {
    data() {
      return {
        cruds: []
      }
    },
    methods: {
        async read() {
        // To do
         const {data} =await this.$http.get('/api/cruds');
    // console.log(data);
    data.forEach(crud => this.cruds.push(new Crud(crud)));

      },
  async update(id, name,email,img) {
    await this.$http.put(`/api/cruds/${id}`, { name,email,img});
    this.cruds.find(crud => crud.id === id).name = name;
    this.cruds.find(crud => crud.id === id).email = email;
    this.cruds.find(crud => crud.id === id).img = img;
    // this.cruds.find(crud => crud.id === id).backimg = backimg;

  },
//   async create() {
//     const { data } = await this.$http.get('/api/cruds/create');
//     this.cruds.push(new Crud(data));
//   },
  async del(id) {
    await this.$http.delete(`/api/cruds/${id}`);
    let index = this.cruds.findIndex(crud => crud.id === id);
    this.cruds.splice(index, 1);
  }
    },
 created() {
  this.read();
    },
    components: {
      AdminCrudComponent
    }
  }
</script>
