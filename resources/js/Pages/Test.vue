<template>
  <Link href="/about">About</Link>
  <h1>hello From Test</h1>

  <button @click="$event =>count++">+</button>{{ count }}
  <button @click="$event =>count--">-</button>
</template>
<script setup>
import {Link} from "@inertiajs/vue3"
import { ref } from "vue";
const  count = ref(0);

</script>