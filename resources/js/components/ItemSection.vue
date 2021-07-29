<template>
        <div>
            <!-- component:is="item-component2" -->
            <item-component  :is="mycomponent" v-for="(item,index) in items" :parameter=parameter :item=item :key=index></item-component>
        </div>
</template>

<script>
// import ItemComponent from './ItemComponent.vue'
import OfferComponent from './OfferComponent.vue'
import OperatorComponent from './OperatorComponent.vue'
    export default {
        components:{
            // ItemComponent,
            OfferComponent,
            OperatorComponent

        },
          name:'ItemSection',
          props:{
              mycomponent:String,
              items:Array,
              parameter:Array
          }
    }
</script>
