<template>
  <PublicPagesLayout>
    <section class="bg-gray-50 dark:bg-gray-900 min-h-screen px-2 bg-cover"
      :style="`background-image: url(${$route.meta.siteUrl + '/assets/restaurant-bg2.jpg'})`">
      <div class="mx-auto max-w-3xl min-h-screen grid content-center">
        <div class="">
          <div class="p-4 backdrop-blur-md bg-gray-900/80 md:p-10 rounded-xl" :class="{ 'mt-10': showResults }">
            <h3 class="text-gray-900 dark:text-white md:text-3xl mb-10 font-review font-bold text-2xl text-center">
              Restaurant
              review
              generator
              🤤👌</h3>
            <form>
              <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                  <label for="restaurant_name"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Restaurant name:</label>
                  <input type="text" id="restaurant_name" v-model="restaurant.name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required />
                </div>
                <div>
                  <label for="restaurant_type"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Restaurant type:</label>
                  <input type="text" id="restaurant_type" v-model="restaurant.type"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Cafe/Bar/Restaurant" required />
                </div>
                <div>
                  <label for="restaurant_theme"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Restaurant theme:</label>
                  <input type="text" id="restaurant_theme" v-model="restaurant.theme"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Italian/Chinese/Tibetan" required />
                </div>
                <div>
                  <label for="restaurant_main_dishes"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Main dishes:</label>
                  <input type="text" id="restaurant_main_dishes" v-model="restaurant.main_dishes"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Pasta,Noodles,Cappuccino" required />
                </div>
                <div>
                  <label for="restaurant_highlights"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Main highlights:</label>
                  <input type="text" id="restaurant_highlights" v-model="restaurant.highlights"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Good ambients,Fast service,Take away" required />
                </div>
              </div>
              <button type="submit" @click.prevent="generateReviewsButton()"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Generate reviews
              </button>
            </form>
          </div>
          <div v-if="loading === true">
            <div role="status">
              <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                  fill="currentColor" />
                <path
                  d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                  fill="currentFill" />
              </svg>
              <span class="sr-only">Loading...</span>
            </div>
          </div>
          <div v-if="(loading === false) && showResults"
            class="my-10 backdrop-blur-md bg-gray-900/80 md:p-10 rounded-xl py-6 md:py-10 px-2">
            <h3
              class="text-gray-900 dark:text-white font-medium text-2xl text-center md:text-3xl mb-8 md:mb-10 font-review">
              Reviews
            </h3>

            <div class="grid gap-4 md:gap-10">
              <div v-for="index in 3" :key="index"
                class="flex items-start gap-6 md:gap-8  p-4 md:p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 text-white">
                <div class="flex items-center flex-col md:flex-row md:space-x-4 w-36">
                  <img class="w-10 h-10 rounded-full mb-2" :src="$route.meta.siteUrl + `/assets/avatar-${index}.jpg`"
                    alt="" />
                  <div class="font-medium dark:text-white text-xs md:text-sm">
                    <div>{{ authors[index - 1].name }}</div>
                    <div class="text-xs md:text-sm text-gray-500 dark:text-gray-400">
                      {{ authors[index - 1].designation }}
                    </div>
                  </div>
                </div>
                <div class="max-w-lg text-sm md:text-base font-review2" v-html="reviews[index - 1]">
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>
    </section>
  </PublicPagesLayout>
</template>
<script setup>
import { RouterLink } from "vue-router";
import PublicPagesLayout from "../components/PublicPagesLayout/PublicPagesLayout.vue";
import { onMounted } from "vue";
import { initFlowbite } from "flowbite";

// initialize components based on data attribute selectors
onMounted(() => {
  initFlowbite();
});
</script>
<script>
import { generateReviews } from "../services/generateReviews";
import { emojify } from '@twuni/emojify';

export default {
  data() {
    return {
      restaurant: {},
      reviews: [],
      authors: [{ name: 'Jese Leos', designation: 'Tourism' }, { name: 'Annie John', designation: 'Doctor' }, { name: 'Paul Alex', designation: 'HR' }],
      showResults: false,
      loading: null
    };
  },
  methods: {
    generateReviewsButton() {
      this.loading = true
      this.reviews = []
      this.showResults = false
      for (let index = 0; index < 3; index++) {
        generateReviews(this.restaurant).then((response) => {
          this.reviews[index] = emojify(response);
          if (index === 2) {
            this.loading = false
            this.showResults = true
          }
        });
      }
    },
  },
};
</script>
