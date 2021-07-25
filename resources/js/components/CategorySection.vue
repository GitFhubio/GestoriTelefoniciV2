<template>
        <div>
            <category-component v-for="(element,ind) in array"
            :element=element :key=ind ></category-component>
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
    // selectedCategory(category) {
    //     axios
    //         .get('api/categories/' + category.nome)
    //         .then((response) => {
    //             this.result = response.data;
    //         })
    //     this.$event.$emit('categoryselected', [this.result,true,category.nome])
    // }
    }
    }
</script>
