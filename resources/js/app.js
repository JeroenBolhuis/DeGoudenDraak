import './bootstrap';
import { createApp } from 'vue'
import Counter from './components/Counter.vue'
import RevenueCalculator from './components/RevenueCalculator.vue';
import RegisterComponent from './components/RegisterComponent.vue';

const app = createApp({
    methods: {
        addItemToRegister(item) {
            this.$refs.register.addItem(item);
        }
    }
});

app.component('counter', Counter)
app.component('revenuecalculator', RevenueCalculator)
app.component('register-component', RegisterComponent);

app.mount('#app')