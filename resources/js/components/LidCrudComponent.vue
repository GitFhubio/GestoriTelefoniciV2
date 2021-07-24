<template>
  <div class="crud">
    <div class="col-8">
      <h5>Offerta: {{ offer_id }}</h5>
       <h6>Nome: {{ nome | properCase }}</h6>
       <h6>Cognome: {{ cognome  }}</h6>
       <h6>Telefono: {{ telefono }}</h6>
      <h6>Email: {{ email }}</h6>
      <h6>Status: {{ status }}</h6>
      <select name="" id="" @change="update">
          <option v-for="thisstatus in ['ok','non ok','da gestire']" :value="thisstatus" :key="thisstatus" :selected="thisstatus === status">{{thisstatus | properCase}}</option>
      </select>
    </div>
  </div>
</template>
<script>
  export default {
    name:'LidCrudComponent',
    methods: {

   update(val) {
        this.$emit('update', this.id,val.target.selectedOptions[0].value);
      },
      del() {
        this.$emit('delete', this.id);
      },

    },
    props: ['id', 'offer_id','nome','cognome','telefono','email','status'],
    filters: {
      properCase(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
      }
    }
  }
</script>
<style>

</style>
