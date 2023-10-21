<template>
  <div style="height: 100vh;">
  <h1>hello from About</h1>
</div>
  <br/>
  <Footer />
  <Link preserve-scroll href="/test">Test</Link>
  <Link preserve-scroll href="/about">About</Link>
</template>
<script setup>
import {Link} from "@inertiajs/vue3";
import Footer from "./Footer.vue";
</script>