<template>
    <div>
        <div class="flex items-center mb-6">
            <h3 class="text-xl mr-4">Sections</h3>
            <Link
                :href="route('sections.create')"
                class="block mr-4 w-1/6 px-2 py-1 bg-white border border-gray-300 rounded-lg text-center"
            >+ Section</Link>
            <Link
                :href="route('branches.create')"
                class="block w-1/6 px-2 py-1 bg-white border border-gray-300 rounded-lg text-center"
            >+ Branch</Link>
        </div>
        <div
            v-if="sections"
        >
            <div
                v-for="section in sections"
                class="mb-4"
            >
                <div v-if="section.branches.length > 0">
                    <div class="mb-4">
                        <h3 class="text-lg">{{ section.title }}</h3>
                    </div>
                    <div
                        v-for="branch in section.branches"
                        class="bg-white p-4 border border-gray-300"
                    >
                        <Link
                            :href="route('branches.show', branch.id)"
                            class="block bg-white p-4 border border-gray-300"

                        >{{ branch.title }}</Link>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3"

export default {
    name: "Index",
    layout: MainLayout,
    components: {
        Link
    },
    props: [
        'sections'
    ]
}
</script>


<style scoped>

</style>
