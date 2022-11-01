<template>
    <div id="app">
        <div class="relative slide">
            <div class="carousel-indicators absolute bottom-0 flex bg-yellow-100 h-24 w-full justify-center items-center">
                <ol class="z-50 flex w-4/12 justify-center">
                    <i class="fa-solid fa-chevron-left font-extrabold text-white hover:text-gray-300" @click="prev"></i>
                    <li v-for="(img, i) in images" :key="i" class="md:w-4 md:h-4 bg-gray-300 rounded-full cursor-pointer mx-2"></li>
                    <i class="fa-solid fa-chevron-right font-extrabold text-white hover:text-gray-300" @click="next"></i>
                </ol>
            </div>
            <div class="carousel-inner relative overflow-hidden w-full">
                <div v-for="(img, i) in images" :id="`slide-${i}`" :key="i" :class="`${active === i ? 'active' : 'left-full'}`" class="carousel-item inset-0 relative w-full transform transition-all duration-500 ease-in-out">
                    <img class="carousel-height block w-full" :src="img" alt="First slide" />
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: "Crousel.vue",
    data: () => ({
        images: [
            "https://picsum.photos/id/237/1024/800",
            "https://picsum.photos/id/238/1024/800",
            "https://picsum.photos/id/239/1024/800"
        ],
        active: 0
    }),
    methods:{
        prev() {
            console.log('pre')
            this.active = this.images.length - 1
        },
        next() {
            console.log('next')
            this.active = this.images.length + 1
        }
    },
    mounted() {
        let i = 0;
        setInterval(() => {
            if (i > this.images.length - 1) {
                i = 0;
            }
            this.active = i;
            i++;
        }, 3000);
    }
}
</script>

<style scoped>
.left-full {
    left: -100%;
}
.carousel-height {
    height: 30rem;
}
.carousel-item {
    float: left;
    position: relative;
    display: block;
    width: 100%;
    margin-right: -100%;
    backface-visibility: hidden;
}

.carousel-item.active {
    left: 0;
}
</style>
