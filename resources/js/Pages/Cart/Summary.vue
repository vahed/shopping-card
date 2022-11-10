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
            {{orderTotalQuantity}}
            <p>{{orderTotalPrice}}</p>
            <h1 class="text-gray-900 text-3xl title-font font-medium mb-4">Thank you for your purchase</h1>
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
                    <td class="p-4" v-text="cartLineTotal(item)"></td>
                </tr>
                <tr>
                    <td class="p-4 font-bold">Total Amount</td>
                    <td class="p-4 font-bold" v-text="orderTotalQuantity"></td>
                    <td class="p-4 font-bold" v-text="orderTotalPrice"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: "Summary.vue",
    props: {
        cartItems: Object,
        errors: Object,
        message: Object
    },
    methods: {
        cartLineTotal(item) {
            let amount = item.price * item.qty;
            amount = (amount / 100);
            return amount.toLocaleString('en-GB', { style: 'currency', currency: 'GBP' });
        }
        
    },
    computed: {
        getSummay() {
            this.$inertia.get(this.route('cart.index'))
        },
        // order() {
        //     return this.$store.state.order;
        // },
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
                console.log(quantity)
                totalAmount += amount * quantity;    
            }
            
            totalAmount = (totalAmount / 100);

            return totalAmount.toLocaleString('en-GB', { style: 'currency', currency: 'GBP' });

        },
    },
    created() {
        return this.cartItems
    }
}
</script>

<style scoped>

</style>
