<template>
    <div id="search__input">
        <v-autocomplete
            v-model="select"
            :loading="loading"
            :items="items"
            :search-input.sync="search"
            cache-items
            class="mx-4 autocomplete very-round"
            flat
            hide-no-data
            hide-details
            label="Search books..."
            solo-inverted
            :item-text="text"
            item-value="book_id"
        ></v-autocomplete>
    </div>
</template>

<script>
    export default {
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
                val && val !== this.select && this.querySelections(val)
            }
        },
        methods: {
            text: item => item.title + ', ' + item.pub_year,
            querySelections(v) {
                this.loading = true
                // Simulated ajax query
                setTimeout(() => {
                    this.$http.get('api/book/autocomplete/' + v.toString().toLowerCase()).then((res) => {
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
.autocomplete{
    background: white;
    border: 1px solid #D2691E;
}
</style>
