import './bootstrap';

import jQuery from 'jquery';
window.$ = jQuery;

import { createApp } from 'vue';
const app = createApp({});

import Example from './components/Example.vue';

app.component('Example',Example);
app.mount('#app');