<template>
    <div>
        <div class="bg-white border-b border-gray-300 py-4">
            <div class="w-1/2 mx-auto">
                <Link :href="router('sections.index')"></Link>
            </div>
        </div>
        <div class="w-1/2 mx-auto py-4">
            <slot />
        </div>
    </div>
</template>

<script>
import {Link, router} from '@inertiajs/vue3'
export default {
    name: "MainLayout",
    methods: {
        router() {
            return router
        }
    },
    components: {
        Link
    }
}
</script>

<style scoped>

</style>
