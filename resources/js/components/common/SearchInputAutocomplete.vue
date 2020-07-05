<template>
    <div id="search__input">
        <v-autocomplete
            v-model="select"
            :loading="loading"
            :items="items"
            :search-input.sync="search"
            cache-items
            class="mx-4"
            flat
            hide-no-data
            hide-details
            label="Search books..."
            solo-inverted
            :item-text="text"
            item-value="book_id"
        />
    </div>
</template>

<script>
    export default {
        model: {
            prop: 'value',
            event: 'input'
        },
        props:{
            value:String
        },
        name: "Search",
        data: () => {
            return {
                loading: false,
                items: [],
                search: null,
                select: null
            };
        },
        watch: {
            search(val) {
                val && val !== this.select && this.querySelections(val);
                this.$emit('input',this.search);
            }
        },
        methods: {
            text: item => item.title + ', ' + item.pub_year,
            querySelections(v) {
                this.loading = true
                // Simulated ajax query
                setTimeout(() => {
                    this.$http.post('api/book/autocomplete', {
                        q: v.toString().toLowerCase(),
                    }).then((res) => {
                        if (res.status === 200 && res.data.data) {
                            const data = res.data.data;
                            this.items = data.filter(e => {
                                return (e.title || '').toLowerCase().indexOf((v || '').toLowerCase()) > -1
                            });
                            this.loading = false;
                        }
                    });
                }, 500);
            },
        },
    }
</script>

<style scoped>

</style>
