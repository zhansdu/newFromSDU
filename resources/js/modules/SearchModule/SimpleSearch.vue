<template>
	<div class="main">
		<div class="search">
			<searchInput class="searchInput" v-model="$store.state.query"/>
			<div><button class="button middle-round" @click="getResults()">Search</button></div>
		</div>
		<a class="advancedSearch" @click="method(1)">Advanced Search</a>
	</div>
</template>
<script>
// @/components/common/SearchInputAutocomplete <- this is where it is from
import searchInput from '../../components/common/SearchInputAutocomplete'

export default{
	model: {
		prop: 'value',
		event: 'click'
	},
	components:{searchInput},
	props:{
		// this is to change tab
		method:Function,
		// this returns simple search results
		value:Object
	},
	data(){
		return{
			query:'initial'
		}
	},
	methods:{
		getResults(){
            const query = encodeURIComponent(this.$store.state.query);
            const type = encodeURIComponent('book');
            this.$http.get('api/book/search/simple?q=' + query + '&type=' + type).then((res) => {
                if (res.status === 200 && res.data) {
                    this.$emit('click',res.data);
                }
            });
		}
	}
}
</script>
<style scoped>
.main{
	padding: 10px 15px 20px 15px;
	display: flex;
	flex-direction: column;
	background:#C4C4C4;
}
.search{
	display: flex;
	justify-content: space-between;
	align-items: center;
	margin:15px 0;
}
.searchInput{
	width: 100%;
}
.button{
	background:#4CAF50;
}
.advancedSearch{
	color:#1F97FF;
}
</style>
