<template>
        <div>
            <category-component v-for="(element,ind) in array" :element=element :key=ind v-on:selCat="selectedCategory(element)"></category-component>
        </div>
</template>
<script>
import CategoryComponent from './CategoryComponent.vue'
    export default {
        components:{CategoryComponent},
          name:'CategorySection',
          props:{
              array:Array,
          },
          methods: {
    selectedCategory(category) {
        this.selected = category.nome;
        axios
            .get('api/categories/' + category.nome)
            .then((response) => {
                this.offers = response.data;
            })
        this.$event.$emit('categoryselected', [this.offers,true,category.nome])
    }
    }
    }
</script>
