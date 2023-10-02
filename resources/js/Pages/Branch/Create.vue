<template>
    <div>
        <div class="flex items-center mb-4">
            <h3 class="text-xl mr-4">Add branch</h3>
        </div>
        <div>
            <div class="mb-4" v-if="sections.length > 0">
                <select @change="getBranches" v-model="section_id" class="border-gray-300 p-2 w-1/4">
                    <option value="null" selected disabled>Select section</option>
                    <option v-for="section in sections" :value="section.id">{{ section.title }}</option>
                </select>
                <div class="text-red-600 text-sm">
                    {{ this.$page.props.errors.section_id }}
                </div>
            </div>
            <div class="mb-4" v-if="branches.length > 0">
                <select v-model="parent_id" class="border-gray-300 p-2 w-1/4">
                    <option value="null" selected disabled>Select branch</option>
                    <option v-for="branch in branches" :value="branch.id">{{ branch.title }}</option>
                </select>
            </div>
            <div class="mb-4">
                <input type="text" v-model="title" class="border-gray-300 p-2 w-1/4">
                <div class="text-red-600 text-sm">
                    {{ this.$page.props.errors.title }}
                </div>
            </div>
            <div>
                <a
                    class="block w-1/4 py-2 bg-sky-500 border border-sky-600 text-white text-center"
                    @click.prevent="store"
                    href="#"
                >Add</a>
            </div>
        </div>
    </div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3"

export default {
    name: "Create",
    layout: MainLayout,
    components: {
        Link
    },
    props: [
        'sections',
    ],
    data() {
        return {
            title: '',
            section_id: null,
            parent_id: null,
            branches: []
        }
    },

    methods: {
        store() {
            this.$inertia.post('/branches', {
                section_id: this.section_id,
                parent_id: this.parent_id,
                title: this.title
            })
        },
        getBranches() {
            this.parent_id = null;
            axios.get(`/sections/${this.section_id}/branches`)
                .then(res => {
                    this.branches = res.data
                })
        }
    }
}
</script>


<style scoped>

</style>
