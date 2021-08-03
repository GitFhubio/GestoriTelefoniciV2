<template>
  <div class="card" v-if="offer_id==myselectedoffer || !myselectedoffer || myselectedoffer=='All'">
    <div class="card-body">
      <h5>Offerta: {{ offer_id }}</h5>
       <h6>Nome: {{ nome | properCase }}</h6>
       <h6>Cognome: {{ cognome  }}</h6>
       <h6>Telefono: {{ telefono }}</h6>
      <h6>Email: {{ email }}</h6>
      <h6>Status: {{ status }}</h6>
      <h6 class="notes" v-if="notes[0] != undefined">Messaggio : {{notes[0]['messaggio']}}</h6>
      <select name="" id="" @change="update">
          <option v-for="thisstatus in ['ok','non ok','da gestire']" :value="thisstatus" :key="thisstatus" :selected="thisstatus === status">{{thisstatus | properCase}}</option>
      </select>
    </div>
  </div>
</template>
<script>
  export default {
    name:'LidCrudComponent',
    data() {
        return{
        }
    },
    methods: {
   update(val) {
        this.$emit('update', this.id,val.target.selectedOptions[0].value);
      }
    },
    mounted(){

    },
    props: ['id', 'offer_id','nome','cognome','telefono','email','status','notes','myselectedoffer'],
    filters: {
      properCase(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
      }
    }
  }
</script>

<style lang="scss" scoped>

.card{
width:400px;
margin:20px;
background-image:url('https://cutewallpaper.org/21/black-orange-background/Orange-yellow-and-black-abstract-business-background-Vector-.jpg');
background-size: 120%;
background-position:left center;
.notes{
    padding-right:30%;
}
}

</style>
