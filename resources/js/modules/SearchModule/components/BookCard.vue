<template>
	<div class="very-round bookMain">
		<div class="imageDiv">
			<div class="image middle-round">IMAGE</div>
			<button class="button middle-round">Reserve</button>
		</div>
		<div class="inform">
			<div class="subInfo">
				<div class="bold">Title :</div>
				<div>{{bookData.title}}</div>
				<div class="bold">Author :</div>
				<div>{{bookData.author}}</div>
				<div class="bold">Publisher/Year :</div>
				<div>{{bookData.publisher || "UNKNOWN"}} / {{bookData.year}}</div>
			</div>
			<div class="subInfo right">
				<div class="bold">Call number :</div>
				<div>{{bookData.call_number ||"UNKNOWN"}}</div>	
				<div class="bold">Type :</div>
				<div>NULL</div>
				<div class="bold">Availability :</div>
				<div>NULL</div>
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
	width: 100%;
	height:220px;
	background-color: #5B9CCD;
	padding:15px 5px 10px 5px;
	display: flex;
}
.imageDiv{
	display: flex;
	flex-direction: column;
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
.button{
	background: #4CAF50;
	margin-top: 8px;
	color: white;
}
.inform{
	display: flex;
	width: 100%;
}
.subInfo{
	margin-left:15px;
	width:100%;
}
.right{
	width:30% !important;
}
.bold{
	font-weight: 600;
}
</style>