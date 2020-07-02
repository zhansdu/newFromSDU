<template>
	<div class="homeParent">
		<div><searchDiv/></div>
	</div>
</template>
<script>
	import searchDiv from './searchDiv'
	export default{
		components:{searchDiv}
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
	width:48%;
	min-width:600px;
}
</style>
