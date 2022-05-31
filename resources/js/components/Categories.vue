<template>
  <div class="aside-block">
              <h3 class="aside-title">Categories</h3>
              <ul class="aside-links list-unstyled">
              <li v-for="(category, index) in categories"
              :key="index"
              ><router-link :to="`/postsByCategory/${category.slug}`">
              <i class="bi bi-chevron-right"></i> 
              {{ category.name }} </router-link></li>
              
            </ul>
          </div>

</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            categories : []
        }
    },
    created() {
        axios.get('/api/categories')
        .then(response => this.categories = response.data.categories)
        .catch(err => console.log(err));
    }
}
</script>