<template>
	<div class="pagination">
		<div>Results {{meta.from}} - {{meta.to}} of {{meta.total}}</div>
		<div class="links">
			<div class="arrow left"></div>
			<div v-for="index in range(meta.from,meta.last_page)" :key="index" class="link" :class="{current:meta.current_page==index}">{{index}}</div>
			<div class="arrow right"></div>
		</div>
	</div>
</template>
<script>
// let it go ( a comment to make indentication in sublime text better)
export default{
	model: {
		prop: 'value',
		event: 'click'
	},
	props:{
		links:Object,
		meta:Object,
		value:Object
	},
	methods:{
		range : function (start, end) {
			if(end-start>=10){
				end=start+9;
			}
			return Array(end - start + 1).fill().map((_, idx) => start + idx)
		},
		onClick(page){
			this.$http.post('http://localhost:8000/api/book/search?page='+page,{q:this.$store.state.query})
		}
	}
}
</script>
<style scoped>
.pagination{
	display:flex;
	justify-content: space-between;
}
.links{
	display: flex;
	align-items: center;
}
.arrow{
	width: 8px;
	height: 8px;
	border-left: 2px solid black;
	border-bottom: 2px solid black;
}
.left{
	transform: rotate(45deg);
}
.right{
	transform: rotate(225deg);
}
.link{
	margin-left:2px;
	margin-right:2px;
}
.links>div{
	cursor: pointer;
}
.current{
	background-color: #79AA2A;
	border-radius: 3px;
}
</style>