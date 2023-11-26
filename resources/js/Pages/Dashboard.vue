<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps<{
    allTransactions?: any;

}>();
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template
                              #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                  <table class="user-table">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>User Id</th>
                      <th>Amount</th>
                      <th>States</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for=" trans in allTransactions"  >
                      <td>{{ trans.id }}</td>
                      <td>{{ trans.user_id }}</td>
                      <td>{{ trans.amount }}</td>
                      <td>{{ trans.states }}</td>
                    </tr>
                    </tbody>
                  </table>
                 </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
/* Scoped styles to limit to this component */

.user-table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

.user-table th, .user-table td {
  padding: 12px;
  border: 1px solid #ddd;
  text-align: left;
}

.user-table th {
  background-color: #f2f2f2;
}
</style>
