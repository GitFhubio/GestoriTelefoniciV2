<template>
        <div class='offers'
        style=
         "{'background-image':'url(https://www.hopkinsmedicine.org/sebin/n/j/noimageavailable.png)'}">
            <div>
            <a :href="'/offers/'+item.id"></a>
            <h4 class="text-center">{{item.name}}</h4>
            <div v-for="(operator,ind) in parameter" :key=ind>
         <p v-if="item.user_id == operator.id">{{operator.name}} </p>
         </div>
            </div>
        </div>
</template>

<script>
    export default {
          name:'OfferComponent',
          props:{
              item:Object,
              parameter:Array,
          },
        // mounted() {
        //     console.log('Component mounted.')
        // }
    }
</script>
