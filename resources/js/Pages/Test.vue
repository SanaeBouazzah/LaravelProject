<template>
  <div style="height: 100vh;">
  <h1>hello From Test</h1>


  <button @click="$event =>count++">+</button>{{ count }}
  <button @click="$event =>count--">-</button>
  <br/>
</div>
  <Footer/>
  <Link preserve-scroll href="/about">About</Link>
  <Link preserve-scroll href="/test">Test</Link>
</template>
<script setup>
import Footer from "./Footer.vue";
import {Link} from "@inertiajs/vue3";
import { ref } from "vue";

const  count = ref(0);

</script>