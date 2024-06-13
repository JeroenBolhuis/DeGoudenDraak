import './bootstrap';
import { createApp } from 'vue'
import Counter from './components/Counter.vue'
import RevenueCalculator from './components/RevenueCalculator.vue';


const app = createApp()

app.component('counter', Counter)
app.component('revenuecalculator', RevenueCalculator)

app.mount('#app')