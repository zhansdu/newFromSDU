<template>
	<div>
		<!-- this is for search -->
		<div class="main">
			<div class="tabs">
				<div :class="(index==tabActive)?'active':'inactive'" v-for="(tab,index) in tabs" @click="changeTab(index)" :key="index">{{tab.name}}</div>
			</div>
			<!-- this renders component -->
			<SimpleSearch :method="changeTab" v-model="simRes" v-if="tabActive==0"/> 
			<AdvancedSearch v-if="tabActive==1"/> 
		</div>

		<!-- this is for results -->
		<div class="main results" v-if="Object.keys(simRes).length!=0">
			<Pagination :links="simRes.links" :meta="simRes.meta" v-model="simRes"/>
			<div class="data">
				<div v-for="(book,index) in simRes.data" :key="index" class="book"><BookCard :bookData='book'/></div>
			</div>
			<Pagination :links="simRes.links" :meta="simRes.meta" v-model="simRes"/>

		</div>
	</div>
</template>
<script type="text/javascript">
// simple search div
import SimpleSearch from './SimpleSearch'
// advanced search div
import AdvancedSearch from './AdvancedSearch'
// pagination
import Pagination from './Pagination'
// book card
import BookCard from './BookCard'

export default{
	components:{SimpleSearch,AdvancedSearch,Pagination,BookCard},
	data(){
		return {
			tabActive:0,
			// simple search results
			simRes:{},
			// advanced search results
			advRes:{},
			tabs:[{name:"Simple Search",},{name:"Advanced Search",}]
		}
	},
	methods:{
		changeTab(number){
			this.simRes={};
			this.advRes={};
			this.tabActive=number;
		}
	}
}
</script>
<style scoped>
.main{
	display: flex;
	flex-direction: column;
}
.results{
	margin-top: 20px;
	padding: 10px 15px 20px 15px;
	background:#C4C4C4;
}
.tabs{
	display: flex;
}
.tabs > div{
	padding:10px 15px;
	cursor: pointer;
}
.active{
	background:#C4C4C4;
}
.inactive{
	color:#1F97FF;
}
.data{
	margin:10px 0; 
}
.book{
	margin: 10px 0;
}
</style>