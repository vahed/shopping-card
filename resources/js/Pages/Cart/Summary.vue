<script setup>
defineProps({
    cartItems: Object
})
</script>

<template>
    <div class="w-full">
        <div class="lg:w-2/3 w-full mx-auto mt-8 overflow-auto">
            <!-- <h2
                class="text-sm title-font text-gray-500 tracking-widest"
                v-text="'Transaction ID: ' + order.transaction_id"
            ></h2> -->

            <h1 class="text-gray-900 text-3xl title-font font-medium mb-4">Thank you for your purchase</h1>
            <form name="form">
                <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                    <tr>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200 rounded-tl rounded-bl">Item</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">Quantity</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in cartItems" :key="item.id">
                        <td class="p-4" v-text="item.name"></td>
                        <td class="p-4" v-text="item.qty"></td>
                        <!-- <td class="p-4" :v-text="cartLineTotal(item)"></td> -->
                        <td class="p-1"><Link @click="$emit('incrementByOne', item)" preserve-state>Inc</Link></td>
                        <td class="p-1"><Link @click="$emit('decrementByOne', item)" preserve-state>Dec</Link></td>
                        <td class="p-1"><Link @click="$emit('deleteItem', item)" preserve-state>Del</Link></td>
                    </tr>
                    <tr>
                        <td class="p-4 font-bold">Total Amount</td>
                        <td class="p-4 font-bold" v-text="orderTotalQuantity"></td>
                        <td class="p-4 font-bold" v-text="orderTotalPrice"></td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'

export default {
    
    name: "Summary.vue",
    components: {
        Link
    },
    props: {
        errors: Object,
        message: Object
    },
    computed: {
        orderTotalQuantity() {

            let itemsToArray = this.convertCartItemToArray 
            let quantity = 0

            for(let i in itemsToArray){
                quantity += Number(itemsToArray[i]['qty'])
            }

            return quantity

        },
        convertCartItemToArray() {

            let convertItemsToArray = [];
            
            for(let items in this.cartItems){
                convertItemsToArray.push(this.cartItems[items])
            }

            return convertItemsToArray
        },
        orderTotalPrice() {

            let itemsToArray = this.convertCartItemToArray 
            let amount = 0
            let quantity = 0
            let totalAmount = 0

            for(let i in itemsToArray){
                amount = Number(itemsToArray[i]['price'])
                quantity = Number(itemsToArray[i]['qty'])
                //console.log(quantity)
                totalAmount += amount * quantity;    
            }
            
            totalAmount = (totalAmount / 100);

            return totalAmount.toLocaleString('en-GB', { style: 'currency', currency: 'GBP' });

        }
    },
    created() {
        this.cartItems
    },
}
</script>

<style scoped>

</style>
 