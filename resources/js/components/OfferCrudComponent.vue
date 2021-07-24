<template>
  <div class="crud">
    <div class="col-8">
      <h5>Nome: {{ name | properCase }}</h5>
       <h6>Costo mensile : {{ costo_mensile }}</h6>
        <h6>Descrizione: {{ descrizione }}</h6>
       <h6>Data inizio : {{ data_inizio  }}</h6>
        <h6>Data inizio : {{ data_fine  }}</h6>
      <input type="text" placeholder="Inserisci nuovo nome" v-model="newName">
      <input type="number" placeholder="Inserisci nuovo costo mensile" v-model="newCostoMensile">
      <textarea type="text" placeholder="Inserisci nuova descrizione" v-model="newDescription"></textarea>
      <input type="date" placeholder="Inserisci nuova data inizio" v-model="newDataInizio">
     <input type="date" placeholder="Inserisci nuova data fine" v-model="newDataFine">
    </div>
    <div class="buttons">
     <button @click="update">Update</button>
      <button @click="del">Delete</button>
    </div>
    </div>
</template>
<script>
  export default {
    name:'OfferCrudComponent',
    data:function(){
        return {
           newName:'',
           newCostoMensile:0,
           newDescription:'',
           newDataInizio:'',
           newDataFine:''
        }
    },
    methods: {
   update() {
        this.$emit('update', this.id,this.newName,this.newCostoMensile,this.newDescription,this.newDataInizio,this.newDataFine);
      },
      del() {
        this.$emit('delete', this.id);
      },

    },
    props: ['id','name','costo_mensile','descrizione','data_inizio','data_fine'],
    filters: {
      properCase(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
      }
    }
  }
</script>
<style>

</style>
