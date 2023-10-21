<template>
  <Link href="/about">About</Link>
  <h1>hello From Test</h1>

  <button @click="$event =>count++">+</button>{{ count }}
  <button @click="$event =>count--">-</button>
  <br/>
  <Footer/>
</template>
<script setup>
import Footer from "./Footer.vue";
import {Link} from "@inertiajs/vue3";
import { ref } from "vue";

const  count = ref(0);

</script>