<template>
        <div :class="item.hasOwnProperty('img') ? 'operators' : 'offers'"
        :style="[item.hasOwnProperty('img') ? (item.img ? {'background-image':'url('+item.img+')'}:
         {'background-image':'url(https://www.hopkinsmedicine.org/sebin/n/j/noimageavailable.png)'}) : '']">
            <div v-if="item.hasOwnProperty('img')" >
            <a :href="'/operators/' +item.id"></a>
            <p v-if="!item.img" class="no-photo">{{item.name}}</p>
            </div>
            <div v-else>
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
          name:'ItemComponent',
          props:{
              item:Object,
              parameter:Array,
          },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
