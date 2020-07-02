<template>
	<div class="main">
		<div class="tabs">
			<div :class="(index==tabActive)?'active':'inactive'" v-for="(tab,index) in tabs" @click="changeTab(index)" :key="index">{{tab.name}}</div>
		</div>
		<!-- this renders component -->
		<component :is="tabs[tabActive].component" :method="changeTab" />
	</div>
</template>
<script type="text/javascript">
	// simple search div
	import SimpleSearch from './SimpleSearch'
	// advanced search div
	import AdvancedSearch from './AdvancedSearch'

	export default{
		components:{
			SimpleSearch
		},
		data(){
			return{
				tabActive:0,
				tabs:[
				{
					name:"Simple Search",
					component:SimpleSearch
				},
				{
					name:"Advanced Search",
					component:AdvancedSearch
				}
				]
			}
		},
		methods:{
			changeTab(number){
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
</style>