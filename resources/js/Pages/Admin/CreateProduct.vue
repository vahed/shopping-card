<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';

defineProps({
    'categories': Object,
    'brands': Object,
    'categoryItems': Object
})
</script>

<template>
    <Head title="Create product" />

    <AuthenticatedLayout>
        <template #header>
        </template>

        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!-- Create product form -->
<!--                        <div v-for="item in categoryItems">-->
<!--                            <div v-for="child in item.children">-->
<!--                                {{item.name}}-->
<!--                                <div v-if="item.children.length === 0">-->
<!--                                    {{child.name}}-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
{{ cat(categoryItems)}}
                        <div class="text-center text-2xl mb-10">Create Product</div>
                        <form class="w-full max-w-lg mx-auto">
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-productName">
                                        Product Name
                                    </label>
                                    <input name="productName" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="Product name">
                                    <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-productName">
                                        Product Code
                                    </label>
                                    <input name="prductCode" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="Product code">
                                    <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-productName">
                                        Brand Name
                                    </label>
                                    <select class="form-control" name="people">
                                        <option v-for="(brandObj, index) in brands" :value="brandObj['id']">{{ brandObj["brand_name"] }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-productName">
                                        Product Name
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="Product name">
                                    <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

  <script>
  import {isEmpty} from "lodash/lang";

  export default {
    data() {
      return {
        form: {
            first_name: null,
            last_name: null,
            email: null
        },
      }
    },
    methods: {
        cat(obj) {
            let result = []
            const newArr = recursiveFx(obj);

            function recursiveFx(obj) {
                for (let key in obj) {
                    if (typeof obj[key] === "object") {
                        recursiveFx(obj[key])
                    }
                    if (isEmpty(obj.children) && obj.name) {
                        let newObj = {}
                        newObj["id"] = obj.id
                        newObj["name"] = obj.name
                        console.log(newObj)
                        result.push(newObj)
                    }
                }
                //filter result based on category id
                return Object.values(
                    result.reduce( (c, e) => {
                        if (!c[e.id]) c[e.id] = e;
                        return c;
                    }, {})
                );

            }
            return newArr
        },

       //  cat(object, key) {
       //        let values = [];
       //        recursiveFx(object);
       //        function recursiveFx(object) {
       //
       //            if (key in object) values.push(object[key]);
       //
       //            for (let property in object) {
       //                if (object.hasOwnProperty(property)) {
       //                    if (typeof object[property] == "object") {
       //                        recursiveFx(object[property]);
       //                    }
       //                }
       //            }
       //        }
       //        return values;
       // },
        getChildren(children) {
            //console.log(children)
            let result = []
            console.log(children)
            for (let i = 0; i < children.length; i++) {
                console.log(`${i}: ${children[i]}`);
                //if(children[key] === "children")
                        this.getChildren(children[i])
            }
        },
        submit() {
            this.$inertia.post('/createProduct', this.form)
        },
        convertTreeToList(root) {
            let arr = []
            //console.log(root.length)
             for(let i=0; i < root.length; i++)
             {
                 if(root[i].children )
                 {
                     //console.log(Object(root[i].children))
                     for(let j=0; j < root[i].children; j++) {
                         console.log(root[i].children[j])
                         arr.push(root[j].children[j])
                         this.convertTreeToList(j)
                         //arr.push(root[i].children)

                     }
                     // for(let j=0; j < root[i].children; j++){
                     //     console.log(root[j].children)
                     //     arr.push(root[j].children)
                     //     this.convertTreeToList(root[j].children)
                     // }

                 }
                 //console.log(root[i])
                 //arr.push(root[i])
             }

            return arr;
        }

    }
  }
  </script>
