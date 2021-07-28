<template>
<div>
    <div class="heading">
      <h1 class="text-center">Lista operatori</h1>
    </div>
 <div class="d-flex flex-wrap justify-content-center">
    <admincrud-component
      v-for="crud in cruds"
      v-bind="crud"
      :key="crud.id"
      @update="update"
      @delete="del"
    ></admincrud-component>
    </div>
    <div class="goback text-center">
        <router-link to="/user/dashboard"  class="goldbtn">Torna alla dashboard</router-link>
    </div>
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
         const {data} =await this.$http.get('/api/myoperators');
    // console.log(data);
    data.forEach(crud => this.cruds.push(new Crud(crud)));

      },
  async update(id, name,email,datas

  ) {

    await this.$http.put(`/api/myoperators/${id}`,{ name,email
    },

    );
    this.cruds.find(crud => crud.id === id).name =name;
    this.cruds.find(crud => crud.id === id).email = email;
        // this.cruds.find(crud => crud.id === id).img =datas.get('my_file');
    // this.cruds.find(crud => crud.id === id).backimg = backimg;

  },
//   async create() {
//     const { data } = await this.$http.get('/api/cruds/create');
//     this.cruds.push(new Crud(data));
//   },
  async del(id) {
    await this.$http.delete(`/api/myoperators/${id}`);
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

<style lang="scss" scoped>
.goback{
    height:80px;
    margin-top:30px;
.goldbtn{
    padding:10px;
}
}
</style>
