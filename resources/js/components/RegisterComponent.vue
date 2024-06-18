<template>
    <div class="w-1/2 bg-white border-2 border-black flex flex-col px-4 py-4">
        <p class="text-center text-2xl font-bold pb-4">Toegevoegd aan de kassa</p>
        <div class="overflow-y-auto flex-grow px-4">
            <div v-for="(item, index) in items" :key="index" class="flex justify-between items-center py-2 border-b border-gray-200">
                <span class="flex-1">{{ item.name }}</span>
                <span class="w-20 text-right">€{{ item.price.toFixed(2) }}</span>
                <input v-model="item.comment" placeholder="Comment" class="ml-4 py-1 px-2 border rounded" />
                <button @click="removeItem(index)" class="ml-4 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                    Verwijder
                </button>
            </div>
        </div>
        <div class="flex justify-between items-center mt-4 px-4">
            <span class="text-xl font-bold">Totaal:</span>
            <span class="text-xl font-bold">€{{ totalPrice.toFixed(2) }}</span>
        </div>
        <button @click="checkout" class="w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4">
            Afrekenen
        </button>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            items: [],
        };
    },
    computed: {
        totalPrice() {
            return this.items.reduce((total, item) => total + item.price, 0);
        },
    },
    methods: {
        addItem(item) {
            this.items.push({ ...item, comment: '' });
        },
        removeItem(index) {
            this.items.splice(index, 1);
        },
        async checkout() {
            try {
                const response = await axios.post('/backend/kassa/checkout', { items: this.items });
                console.log(response.data); // Log the response data for debugging
                this.items = [];
            } catch (error) {
                console.error('Checkout error:', error);
                console.log('Checkout error response:', error.response.data); // Log the error response
                alert('Er is iets misgegaan bij het afrekenen.');
            }
        },
    },
};
</script>

<style scoped>
/* Add any scoped styles here */
</style>
2