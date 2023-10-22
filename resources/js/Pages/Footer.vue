<template>
<h2>Footer</h2>
  <Link  href="/about" name="About" component="About">About</Link>
  <Link  href="/test" name="Test" component="Test">Test</Link>
</template>

<script setup>
import {Link} from "./Link.vue";
</script>

<style>
.active{
  text-decoration: none;
  color:red;
}
</style>