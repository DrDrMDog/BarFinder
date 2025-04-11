<script setup lang="ts">
import {ref, onMounted, onBeforeUnmount} from "vue";
import {Link, router} from '@inertiajs/vue3'

const props = defineProps<{
    icon?: string,
    title: string
}>()

const drawer = ref(false);
const isMobile = ref(true);
onMounted(() => {
    onResize();

    window.addEventListener('resize', onResize, {passive: true});
});

onBeforeUnmount(() => {
    if (typeof window === 'undefined') return

    window.removeEventListener('resize', onResize, {passive: true})
})

function onResize() {
    isMobile.value = window.innerWidth < 960;
}

drawer.value = !isMobile;

const menuItems = [
    {
        name: 'Übersicht',
        icon: 'mdi-view-dashboard',
        value: 'home',
        route: 'dashboard'
    },
    {
        name: 'Watched',
        icon: 'mdi-movie-check',
        value: 'watched',
        route: 'dashboard'
    },
    {
        name: 'Historie',
        icon: 'mdi-calendar-check',
        value: 'watched_calender',
        route: 'dashboard'
    },
    {
        name: 'Watchlist',
        icon: 'mdi-star',
        value: 'watch',
        route: 'dashboard'
    },
]
</script>

<template>
    <v-layout class="rounded rounded-md">
        <v-app-bar>
            <v-app-bar-title>
                {{ title }}
            </v-app-bar-title>
            <template v-slot:prepend v-if="isMobile">
                <v-app-bar-nav-icon variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
            </template>

            <template v-slot:append>
                <Link :href="route('movie.search')" style="all: unset;">
                    <v-btn
                        icon="mdi-plus-circle-outline"
                        color="success"
                    />
                </Link>
            </template>
        </v-app-bar>

        <v-navigation-drawer
            v-model="drawer"
            :permanent="!isMobile"
        >
            <v-list nav>
                <Link v-for="menuItem in menuItems" :href="route(menuItem.route)" style="all: unset;">
                    <v-list-item :prepend-icon="menuItem.icon" :title="menuItem.name" :value="menuItem.value"/>
                </Link>

                <!--
                <v-list-item prepend-icon="mdi-view-dashboard" title="Übersicht" value="home"/>
                <v-list-item prepend-icon="mdi-movie-check" title="Geschaute Filme" value="watched"/>
                <v-list-item prepend-icon="mdi-calendar-check" title="Historie" value="watched_calender"/>
                <v-list-item prepend-icon="mdi-star" title="Gemerkte" value="watch"/>

           -->
            </v-list>
        </v-navigation-drawer>

        <v-main class="d-flex align-center justify-center" style="min-height: 300px;">
            <slot/>
        </v-main>
    </v-layout>
</template>

<style scoped>

</style>
