<template>
    <div id="search__input">
        <v-autocomplete
            v-model="select"
            :loading="loading"
            :items="media"
            :search-input.sync="search"
            cache-items
            class="mx-4"
            flat
            hide-no-data
            hide-details
            label="Search books..."
            solo-inverted
            :item-text="text"
            item-value="id"
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
                select: null,
                searchType: 'book',
            };
        },
        computed: {
            media() {
                return this.items.map(item => {
                    const title = item.title.length > 50 ? item.title.slice(0, 50) + '...' : item.title;
                    return Object.assign({}, item, {title});
                });
            },
        },
        watch: {
            search(val) {
                val && val !== this.select && this.querySelections(val);
                this.$emit('input',this.search);
            }
        },
        methods: {
            text: item => {
                let text = item.title;
                text += item.year ? `, ${item.year}` : '';
                return text;
            },
            querySelections(v) {
                this.loading = true
                // Simulated ajax query
                setTimeout(() => {
                    const query = encodeURIComponent(v.toString().toLowerCase());
                    const type = encodeURIComponent(this.searchType);
                    this.$http.get('api/book/search/autocomplete?q=' + query + '&type=' + type).then((res) => {
                        if (res.status === 200 && res.data) {
                            const data = res.data;
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
