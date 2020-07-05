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
			<div v-if="simRes.data.length==0">
				Sorry, no data
			</div>
			<div v-else>
				<Pagination :data ="simRes" v-model="simRes"/>
				<div class="data">
					<div v-for="(book,index) in simRes.data" :key="index" class="book"><BookCard :bookData='book'/></div>
				</div>
				<Pagination :data ="simRes" v-model="simRes"/>
			</div>
		</div>
	</div>
</template>
<script type="text/javascript">
// simple search div
import SimpleSearch from './views/SimpleSearch'
// advanced search div
import AdvancedSearch from './views/AdvancedSearch'
// pagination
import Pagination from './components/Pagination'
// book card
import BookCard from './components/BookCard'

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
	border:2px solid #2e516c;
}
.tabs{
	display: flex;
}
.tabs > div{
	padding:10px 15px;
	cursor: pointer;
	margin-bottom: -2px;
	border:2px solid transparent;
	z-index: 1;
}
.active{
	border-color: #2e516c !important;
	background:#C4C4C4;
	position: relative;
}
.active::after{
	position: absolute;
	display: block;
	top:44px;
	left:0;
	content:'';
	width: 100%;
	height:2px;
	background-color: #C4C4C4;
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