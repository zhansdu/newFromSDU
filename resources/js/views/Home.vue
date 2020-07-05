<template>
	<div class="homeParent">
		<div><SearchModule/></div>
	</div>
</template>
<script>
	import SearchModule from '../modules/SearchModule/SearchParent.vue'
	export default{
		components:{SearchModule}
	}
</script>
<style scoped>
.homeParent{
	display: flex;
	flex-direction: column;
	align-items: center;
	padding:25px;
}
.homeParent>div{
	min-width:600px;
	width: 100%;
}
</style>
