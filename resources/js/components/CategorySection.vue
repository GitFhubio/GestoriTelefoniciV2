<template>
        <div>
            <category-component v-for="(element,ind) in array"
            :element=element :key=ind v-on:selCat="selectedCategory(element)"></category-component>
        </div>
                    <!-- v-on:selCat="selectedCategory(element)" -->
</template>
<script>
import CategoryComponent from './CategoryComponent.vue'
    export default {
        components:{CategoryComponent},
          name:'CategorySection',
          props:{
              array:Array,
          },
          data:function(){
              return {
                  result:[]
              }
          },
          methods: {
    selectedCategory(category) {
        this.$emit('categoryselected', category)
    }
    }
    }
</script>
