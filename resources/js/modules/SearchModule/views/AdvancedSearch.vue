<template>
	<div class="main">
		<div>
			<div class="rowed">
				<input type="text" placeholder="Title" v-model="book.title">
				<input type="text" placeholder="ISBN" v-model="book.isbn">
			</div>
			<div class="rowed">
				<input type="text" placeholder="Author" v-model="book.author">
				<input type="text" placeholder="Publisher" v-model="book.publisher">
			</div>
			<div class="rowed">
				<input type="text" placeholder="Subject terms" v-model="book.s_terms">
				<input type="text" placeholder="Year" v-model="book.year">
			</div>
		</div>
		<div class="rowed">
			<button class="button middle-round" @click="clear()">Reset</button>
			<button class="button middle-round">Search</button>
		</div>
	</div>
</template>
<script type="text/javascript">
export default{
	data(){
		return{
			book:{}
		}
	},
	methods:{
		clear(){
			this.book={};
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
	width:58%;
	min-width: 500px;
	border:2px solid #2e516c;
}
.rowed{
	display:flex;
	width: 100%;
	justify-content: space-between;
}
input{
	background-color: white;
	border:1px solid #D2691E;
	width:48%;
	margin-top: 15px;
	border-radius: 10px;
	padding: 5px;
}
.button{
	margin-top: 15px;
}
</style>