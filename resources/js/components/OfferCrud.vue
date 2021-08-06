<template>
<div>
    <div class="heading">
      <h1 class="text-center font-italic">{{cruds.length>0 ? 'Le tue offerte' : 'Non hai offerte'}}</h1>
    </div>
    <div class="d-flex flex-wrap justify-content-center">
    <offercrud-component
      v-for="crud in cruds"
      v-bind="crud"
      :key="crud.id"
      @update="update"
      @delete="del"
    ></offercrud-component>
    </div>
    <div class="d-flex justify-content-center">
      <button  class="goldbtn"  @click="create">Aggiungi nuova offerta</button>
    </div>
        <select name=""  v-model="selectedOption"   @change="changeOffer()" >
    <option value="All" selected>Tutte le offerte</option>
    <option v-for="crud in cruds" :key="crud.id" :value="crud.id">{{crud.name}}</option>
    </select>
    </div>
</template>

<script>
  function Crud({id,name,costo_mensile, descrizione,data_inizio,data_fine,categories}) {
    this.id = id;
    this.name = name;
    this.costo_mensile=costo_mensile;
    this.descrizione=descrizione;
    this.data_inizio= data_inizio;
    this.data_fine=data_fine;
    this.categories=categories;
  }

  import OfferCrudComponent from './OfferCrudComponent.vue';

  export default {
    data() {
      return {
            selectedOption: 'All',
        cruds: [],
      }
    },
    mounted(){
    },
    methods: {
        changeOffer: function () {
                console.log("child changed: " + this.selectedOption);
                this.$emit('input', this.selectedOption);
            },
        async read() {
         const {data} =await this.$http.get('/user/myoffers');
    // console.log(data);
    data.forEach(crud => this.cruds.push(new Crud(crud)));

      },
  async update(id, name,costo_mensile,descrizione,data_inizio,data_fine,categories) {
    await this.$http.put(`/user/myoffers/${id}`, { name,costo_mensile,descrizione,data_inizio,data_fine,categories});
    this.cruds.find(crud => crud.id === id).name = name;
    this.cruds.find(crud => crud.id === id).costo_mensile = descrizione;
    this.cruds.find(crud => crud.id === id).descrizione = descrizione;
    this.cruds.find(crud => crud.id === id).data_inizio = data_inizio;
    this.cruds.find(crud => crud.id === id).data_fine = data_fine;
    this.cruds.find(crud => crud.id === id).categories = categories;
    // this.cruds.find(crud => crud.id === id).backimg = backimg;

  },
  async create() {
    const { data } = await this.$http.get('/user/myoffers/create');
    this.cruds.push(new Crud(data));
  },
  async del(id) {
    await this.$http.delete(`/user/myoffers/${id}`);
    let index = this.cruds.findIndex(crud => crud.id === id);
    this.cruds.splice(index, 1);
  }
    },
 created() {
  this.read();
    },
    components: {
      OfferCrudComponent
    }
  }
</script>
