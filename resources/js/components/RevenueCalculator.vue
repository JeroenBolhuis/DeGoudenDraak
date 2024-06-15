
<template>
    <div class="container">
        <h1 class="text-6xl mb-4">Bereken omzet</h1>
        <form @submit.prevent="calculateRevenue">
            <div class="form-group my-4">
                <label for="start_date">Start datum </label>
                <input type="date" id="start_date" v-model="startDate" class="form-control" required>
            </div>
            <div class="form-group my-4">
                <label for="end_date">Eind datum </label>
                <input type="date" id="endDate" v-model="endDate" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2">Bereken</button>
        </form>
        <div v-if="revenue !== null" class="mt-4">
            <p>Omzet: €{{ revenue }}</p>
            <p>btw: €{{ (revenue-(revenue/1.06)).toFixed(2) }}</p>
            <p>excl. BTW: €{{ (revenue/1.06).toFixed(2) }}</p>
        </div>
    </div>
</template>
  
<script>
    export default {
        data() {
            return {
                startDate: '',
                endDate: '',
                revenue: null,
            };
        },
        methods: {
            async calculateRevenue() {
                console.log('Start Date:', this.startDate);
                console.log('End Date:', this.endDate);
                try {
                    const response = await fetch('/api/revenue', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: JSON.stringify({
                            start_date: this.startDate,
                            end_date: this.endDate,
                        }),
                    });

                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    const data = await response.json();
                    this.revenue = data.revenue;
                } catch (error) {
                    console.error('There was a problem with the fetch operation:', error);
                    alert('An error occurred while calculating revenue.');
                }
            },
        }
    };
</script>
  