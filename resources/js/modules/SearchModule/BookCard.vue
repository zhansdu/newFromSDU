<template>
	<div class="very-round bookMain">
		<div class="image">IMAGE</div>
		<div class="inform">
			<div class="subInfo">
				<div>Title: {{bookData.title}}</div>
				<div>Publisher/Year: {{bookData.pub_city}}/{{bookData.pub_year}}</div>
			</div>
		</div>
	</div>
</template>
<script type="text/javascript">
// another comment to make indentication in sublime text better
export default{
	props:{
		bookData:Object
	}
}
</script>
<style scoped>
.bookMain{
	max-width: 650px;
	width: 100%;
	height:220px;
	background-color: #5B9CCD;
	padding:15px 5px 10px 5px;
	display: flex;
}
.image{
	height:150px;
	max-width: 125px;
	min-width: 125px;
	display:flex;
	justify-content: center;
	align-items: center;
	font-size: 28px;
	background-color: black;
	color:white;
}
.inform{
	margin-left:5px;
}
</style>