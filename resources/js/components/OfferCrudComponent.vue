<template>
  <div class="crud">
    <div class="col-2">
      <h5>Nome: {{ name | properCase }}</h5>
       <h6>Email: {{ email }}</h6>
      <input type="text" placeholder="Inserisci nuovo nome" v-model="newName">
      <input type="text" placeholder="Inserisci nuova email" v-model="newEmail">
      <label for="img">Carica avatar</label><input type="file"  name= "img" multiple @change="onFileChange">
      <!-- <label for="backimg">Carica banner</label><input id="backimg" type="file" name="backimg" @change="onFileChange"> -->
          <div class="col-1">
        <p>Avatar:</p>
      <img style="height:40px;width:auto;" :src="img"/>
    </div>
        <!-- <div class="col-1">
             <p>Banner:</p>
      <img  style="height:40px;width:auto;" :src="backimg"/>
    </div> -->
    <div class="buttons">
     <button @click="update">Update</button>
      <button @click="del">Delete</button>
    </div>
    </div>
  </div>
</template>
<script>
  export default {
    name:'OfferCrudComponent',
    data:function(){
        return {
        }
    },
    methods: {
   update() {
        this.$emit('update', this.id);
      },
      del() {
        this.$emit('delete', this.id);
      },

    },
    props: ['id'],
    filters: {
      properCase(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
      }
    }
  }
</script>
<style>

</style>
