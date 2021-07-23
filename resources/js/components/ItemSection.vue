<template>
        <div>
            <item-component v-for="(item,ind) in items" :parameter=parameter :item=item :key=ind></item-component>
        </div>
</template>

<script>
import ItemComponent from './ItemComponent.vue'
    export default {
        components:{ItemComponent},
          name:'ItemSection',
          props:{
              items:Array,
              parameter:Array
          }
    }
</script>
