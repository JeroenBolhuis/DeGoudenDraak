<template>
    <div class="container">
        <h1>Calculate Revenue</h1>
        <form @submit.prevent="calculateRevenue">
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" id="start_date" v-model="startDate" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" id="endDate" v-model="endDate" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Calculate</button>
        </form>
        <div v-if="revenue !== null" class="mt-4">
            <h2>Revenue from {{ startDate }} to {{ endDate }}</h2>
            <p>Total Revenue: ${{ revenue.toFixed(2) }}</p>
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
                    console.log('rev:', response);
                    this.revenue = data.revenue;
                } catch (error) {
                    console.error('There was a problem with the fetch operation:', error);
                    alert('An error occurred while calculating revenue.');
                }
            },
        }
    };
</script>

<style scoped>
/* Add any component-specific styles here */
</style>
  