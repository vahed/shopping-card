<template>
    <!-- <div class="w-full">
        <div class="lg:w-2/3 w-full mx-auto mt-8">
            <div class="flex flex-wrap -mx-2 mt-8">
                <div class="p-2 w-1/3">
                    <div class="relative">
                        <label for="first_name" class="leading-7 text-sm text-gray-600">First Name</label>
                        <input
                            type="text"
                            id="first_name"
                            name="first_name"
                            class="w-full bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            v-model="customer.first_name"
                            :disabled="paymentProcessing"
                        >
                    </div>
                </div>
                <div class="p-2 w-1/3">
                    <div class="relative">
                        <label for="last_name" class="leading-7 text-sm text-gray-600">Last Name</label>
                        <input
                            type="text"
                            id="last_name"
                            name="last_name"
                            class="w-full bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            v-model="customer.last_name"
                            :disabled="paymentProcessing"
                        >
                    </div>
                </div>
                <div class="p-2 w-1/3">
                    <div class="relative">
                        <label for="email" class="leading-7 text-sm text-gray-600">Email Address</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="w-full bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            v-model="customer.email"
                            :disabled="paymentProcessing"
                        >
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap -mx-2 mt-4">
                <div class="p-2 w-1/3">
                    <div class="relative">
                        <label for="address" class="leading-7 text-sm text-gray-600">Street Address</label>
                        <input
                            type="text"
                            id="address"
                            name="address"
                            class="w-full bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            v-model="customer.address"
                            :disabled="paymentProcessing"
                        >
                    </div>
                </div>
                <div class="p-2 w-1/3">
                    <div class="relative">
                        <label for="city" class="leading-7 text-sm text-gray-600">City</label>
                        <input
                            type="text"
                            id="city"
                            name="city"
                            class="w-full bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            v-model="customer.city"
                            :disabled="paymentProcessing"
                        >
                    </div>
                </div>
                <div class="p-2 w-1/6">
                    <div class="relative">
                        <label for="state" class="leading-7 text-sm text-gray-600">State</label>
                        <input
                            type="email"
                            id="state"
                            name="state"
                            class="w-full bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            v-model="customer.state"
                            :disabled="paymentProcessing"
                        >
                    </div>
                </div>
                <div class="p-2 w-1/6">
                    <div class="relative">
                        <label for="zip_code" class="leading-7 text-sm text-gray-600">Zip Code</label>
                        <input
                            type="email"
                            id="zip_code"
                            name="zip_code"
                            class="w-full bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            v-model="customer.zip_code"
                            :disabled="paymentProcessing"
                        >
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap -mx-2 mt-4">
                <div class="p-2 w-full">
                    <div class="relative">
                        <label for="card-element" class="leading-7 text-sm text-gray-600">Credit Card Info</label>
                        <div id="card-element"></div>
                    </div>
                </div>
            </div>
            <div class="p-2 w-full">
                <button
                    class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                    @click="processPayment"
                    :disabled="paymentProcessing"
                    v-text="paymentProcessing ? 'Processing' : 'Pay Now'"
                ></button>
            </div>
        </div>
    </div> -->
    <div class="container mx-auto mt-8">
        <form class="w-full max-w-lg mx-auto">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    First Name
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane">
                <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                </div>
                <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Last Name
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                    Password
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" placeholder="******************">
                <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                    City
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" placeholder="Albuquerque">
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
                    State
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" type="text" placeholder="State">
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
                    Zip
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="text" placeholder="90210">
                </div>
            </div>
            <div class="mt-5 w-full">
                <button
                    class="flex float-right text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                    @click="processPayment"
                    :disabled="paymentProcessing"
                    v-text="paymentProcessing ? 'Processing' : 'Pay Now'"
                ></button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "Checkout.vue",
    data() {
        return {
            stripe: {},
            cardElement: {},
            customer: {
                first_name: '',
                last_name: '',
                email: '',
                address: '',
                city: '',
                state: '',
                zip_code: ''
            },
            paymentProcessing: false
        }
    },
}
</script>

<style scoped>

</style>
